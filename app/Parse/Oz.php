<?php
namespace App\Parse;
use App\Parse\ParseTrait;
use Symfony\Component\DomCrawler\Crawler;
class Oz implements ParseContract{
    protected $links = [];
    protected $html = [];
    use ParseTrait;
    public function getParse($data)
    {
        $divo = explode('/', $data->url);
        $end = end($divo);
        $http = 'https://oz.by/'.$end;
        $file = file_get_contents($http);
        $crawler = new Crawler($file);
        $crawler->filter('.viewer-type-card__li')->each(function(Crawler $node, $i){
            echo $this->html[] = $node->html();
        });
        return $this->html;
    }
    public function catalog(){
        $file = file_get_contents('http://www.oz.by');
        $crawler = new Crawler($file);
        $crawler->filter('.main-nav__list li')->each(function(Crawler $node, $i){
            $this->links[] = $node->html();
            $node->filter('ul')->each(function(Crawler $node2, $ii){
                echo $node2->text().'<br />';
            });
            $this->html($node, 'ul');
        });
        return $this->links;
    }
}
