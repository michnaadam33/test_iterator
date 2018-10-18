<?php

declare(strict_types=1);

namespace Symetrland\Tututorial\Iterator;

use function array_column;
use function array_slice;
use Safe\json_decode;
use GuzzleHttp\Client;
use Iterator;

class TrendingRepositoryIterator implements Iterator
{
    /** @var int */
    private $pointer;
    /** @var array */
    private $repos;

    public function __construct()
    {
        $this->pointer = 0;
        $this->repos = $this->populate();
    }

    public function current()
    {
        return $this->repos[$this->pointer];
    }

    public function next()
    {
        $this->pointer++;
    }

    public function key()
    {
        return $this->pointer;
    }

    public function valid()
    {
        return isset($this->repos[$this->pointer]);
    }

    public function rewind()
    {
     $this->pointer = 0;
    }

    private function populate(): array
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com/search/repositories', [ 'query' => ['q' => 'language:php', 'sort' => 'stars', 'order' => 'desc']]);
        $resInArray = json_decode($res->getBody()->getContents(), true);
        $trendingRepository = array_slice($resInArray['items'], 0,20);
        return array_column($trendingRepository, 'name');
    }

}