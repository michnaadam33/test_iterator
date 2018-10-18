#!/usr/bin/env php
<?php

use Symetrland\Tututorial\Iterator\TrendingRepositoryIterator;
require __DIR__ . '/vendor/autoload.php';

$repos = new TrendingRepositoryIterator();
foreach ($repos as $repo){
    echo $repo.PHP_EOL;
}