<?php

declare(strict_types=1);

namespace zonuexe;

use PhpBench\Attributes as Bench;
use function array_walk;
use function count;

#[Bench\Revs(100)]
class ArrayWalkBench
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
        array_walk($subject, static function ($v) {
            $result = $v === 1;
        });
    }

    /**
     * @param array{list<mixed>} $param
     */
    #[Bench\Warmup(2)]
    #[Bench\ParamProviders(['provideArray'])]
    public function benchConstructNew($param): void
    {
        $subject = $param[0];
        $result = [];
        array_walk($subject, static function ($v) use (&$result) {
            $result[] = $v === 1;
        });
        assert(count($subject) === count($result));
    }
}
