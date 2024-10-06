<?php

namespace Aluracomposer\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

Class Buscador{

private $httpClient;
private $crawler;


    public function __construct(ClientInterface $httpClient,Crawler $crawler){
        $this -> httpClient = $httpClient;
        $this -> crawler = $crawler;
    }


    public function buscar(string $url) : array{
        $resposta = $this-> httpClient -> request ('GET', $url);

        $html = $resposta ->getBody();

        // $this -> crawler = new Crawler($html);
        $this-> crawler -> addHtmlContent($html); 
        //  as duas formas estão corretas para instarciar o crawler e indicar o seu conteudo passado por parametro

        $elementosCursos = $this->crawler -> filter('span.card-curso__nome'); 
        // no curso da alura o instrutor coloca o "selector"no filter mas ele não se faz mais necessario;
        $cursos = [];
        foreach($elementosCursos as $elemento){
            $cursos[] = $elemento -> textContent;
        }
        return $cursos;
    }

}




