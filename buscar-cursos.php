<?php

require 'vendor/autoload.php';


// importando o Guzzle 
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client( ['verify' => false]);

$resposta = $client -> request ('GET',  'https://www.alura.com.br/cursos-online-programacao/php');


$html = $resposta ->getBody();

$crawler = new Crawler($html);
// $crawler -> addHtmlContent($html); as duas formas estão corretas para instarciar o crawler e indicar o seu conteudo

$cursos = $crawler -> filter(selector: 'span.card-curso__nome');

foreach ($cursos as $curso){
    echo $curso -> textContent."\n";
}

var_dump(PHP_EOL);
//PHP_EOL DEFINE O FIM DE UMA LINHA DA FORMA ADEQUADA DE ACORDO COM O SISTEMA OPERACIONAL EM QUESTÃO
