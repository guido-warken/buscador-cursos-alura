#!/bin/bash/env php

<?php

require __DIR__ . '/vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client(['base_uri' => 'https://www.alura.com.br', 'verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($cliente, $crawler);

$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;

}