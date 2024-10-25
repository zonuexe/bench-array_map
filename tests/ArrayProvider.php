<?php

declare(strict_types=1);

namespace zonuexe;

trait ArrayProvider
{
    public function provideArray()
    {
        yield 'range(0, 99)' => [range(0, 99)];
        yield 'range(1, 10000)' => [range(1, 10000)];
    }
}
