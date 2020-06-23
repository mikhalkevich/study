<?php
namespace App\Parse;
use Symfony\Component\DomCrawler\Crawler;
class Amd implements ParseContract{
    protected $links = [];
    protected $html = [];
    public function getParse($data)
    {

        $divo = explode('/', $data->url);
        $end = end($divo);
        $http = 'https://www.amd.by/catalog/'.$end;
        $file = file_get_contents($http);
        $crawler = new Crawler($file);

        $crawler->filter('#mainMenuCenter li')->each(function(Crawler $node, $i){
            $this->html[] = $node->html();
        });
        return $this->html;
    }
    public function getAll(){
        $file = file_get_contents('http://www.amd.by/');
        $crawler = new Crawler($file);
        $menu = $crawler->filter('.submenuList a')->each(function(Crawler $node, $i){
            $this->links[] = $node->attr('href');
            //$this->links[] = $node->text();
        });
        return $this->links;
    }
}
