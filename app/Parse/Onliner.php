<?php
namespace App\Parse;

use Symfony\Component\DomCrawler\Crawler;
use App\Parse\ParseContract;
use App\Product;
use Auth;
class Onliner implements ParseContract{
    public $crawler;
    public $arr = [];
    public function __construct()
    {
        $file = file_get_contents('http://catalog.onliner.by/');
        $this->crawler = new Crawler($file);
    }
    public function getParse($data)
    {
        $divo = explode('/', $data->url);
        $end = end($divo);
        $pos = str_ireplace('http://catalog.onliner.by/', '', $data->url);
        $ask = strpos($pos, '?');
        if ($ask === false) {
            $vopros = '?';
        } else {
            $vopros = '&';
        }
        $http = 'https://catalog.api.onliner.by/search/' . $end . $vopros . 'page=1';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $http);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $data_arr = (array)json_decode($result);
        $ke = '<p><b>'.$http.'</b></p>';
        foreach ($data_arr as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $val_key => $data_value) {
                    $val_value = (array)$data_value;
                    $price_value = (array)$val_value['prices'];
                    $pic_value = (array)$val_value['images'];
                    //$price_min = (isset($price_value['min'])) ? $price_value['min'] : '';
                    $full_name = (isset($val_value['full_name'])) ? $val_value['full_name'] : '';
                    $body = (isset($val_value['description'])) ? $val_value['description'] : '';
                    $header_picture = (isset($pic_value['header'])) ? $pic_value['header'] : '';
                    //$price_min = (isset($price_value['amount'])) ? $price_value['amount'] : '';
                    $ke .= $full_name  . ' - ';
                    $ke .= $header_picture . ' - ';
                    $ke .= $body . '<br />';

                    Product::create([
                        'name'=> $full_name,
                        'body' => $body,
                        'picture' => $header_picture,
                        'full_url' => $http,
                        'status' => 'onliner',
                        'user_id' => Auth::user()->id
                    ]);
                }
            }
        }
return $ke;
    }
    public function catalog()
    {
        $this->crawler->filter(".catalog-navigation-classifier__item")->each(function (Crawler $node, $i) {

            $this->arr[] = $node->filter('.catalog-navigation-classifier__item-title-wrapper')->text();
        });
        return $this->arr;
    }
}
