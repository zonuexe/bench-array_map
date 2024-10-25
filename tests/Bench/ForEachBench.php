<?php

declare(strict_types=1);

namespace zonuexe;

use PhpBench\Attributes as Bench;
use function count;

#[Bench\Revs(100)]
class ForEachBench
{
    use ArrayProvider;

    /**
     * @param array{list<mixed>} $param
     */
    #[Bench\Warmup(2)]
    #[Bench\ParamProviders(['provideArray'])]
    public function benchOnlyIteration($param): void
    {
        $result = null;
        $subject = $param[0];
        foreach ($subject as $v) {
            $result = $v === 1;
        }
    }

    /**
     * @param array{list<mixed>} $param
     */
    #[Bench\Warmup(2)]
    #[Bench\ParamProviders(['provideArray'])]
    public function benchConstructNew($param): void
    {
        $result = [];
        $subject = $param[0];
        foreach ($subject as $v) {
            $result[] = $v === 1;
        }
        assert(count($subject) === count($result));
    }
}
