<?php

declare(strict_types=1);

namespace Symetrland\Tututorial\Iterator\Tests;


use PHPUnit\Framework\TestCase;
use Symetrland\Tututorial\Iterator\TrendingRepositoryIterator;

class TrendingRepositoryIteratorTest extends TestCase
{
    public function testIterable()
    {
        $iterator = new TrendingRepositoryIterator();
        $this->assertCount(20, $iterator);
        foreach ($iterator as $key => $value) {
            $this->assertInternalType('int', $key);
            $this->assertInternalType('string', $value);
        }
    }
}