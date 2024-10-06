<?php

require 'vendor/autoload.php';  // O autoload do Composer já carrega todas as classes
require 'BuscadorDeCursos/src/Buscador.php';
// Importando o Guzzle e o DomCrawler
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Aluracomposer\BuscadorDeCursos\Buscador; 

$client = new Client([
    'base_uri' => 'https://www.alura.com.br',
    'verify' => false
],);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$cursos = $buscador->buscar('/cursos-online-programacao/php'); 

foreach ($cursos as $curso) {
    echo $curso . "\n";
}

//var_dump(PHP_EOL);  PHP_EOL define o fim de linha corretamente
