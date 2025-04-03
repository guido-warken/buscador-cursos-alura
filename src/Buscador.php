<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{


    /**
     * @var Client
     */
    private Client $cliente;
    /**
     * @var Crawler
     */
    private Crawler $crawler;

    public function __construct(Client $cliente, Crawler $crawler)
    {
        $this->cliente = $cliente;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $resposta = $this->cliente->request('GET', $url);

        $html = $resposta->getBody()->getContents();
        $this->crawler->addHtmlContent($html);

        $cursos = $this->crawler->filter('span.card-curso__nome');

        $nomesCursos = [];

        foreach ($cursos as $curso) {
            $nomesCursos[] = $curso->textContent;
        }

        return $nomesCursos;
    }
}