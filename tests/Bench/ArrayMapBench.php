<?php

declare(strict_types=1);

namespace zonuexe;

use PhpBench\Attributes as Bench;
use function array_map;

#[Bench\Revs(100)]
class ArrayMapBench
{
    use ArrayProvider;

    /**
     * @param array{list<mixed>} $param
     */
    #[Bench\Warmup(2)]
    #[Bench\ParamProviders(['provideArray'])]
    public function benchOnlyIteration($param): void
    {
        $subject = $param[0];
        array_map(static fn ($v) => $v === 1, $subject);
    }

    /**
     * @param array{list<mixed>} $param
     */
    #[Bench\Warmup(2)]
    #[Bench\ParamProviders(['provideArray'])]
    public function benchConstructNew($param): void
    {
        $subject = $param[0];
        $result = array_map(static fn ($v) => $v === 1, $subject);
    }
}
