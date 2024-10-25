<?php

declare(strict_types=1);

namespace zonuexe;

use PhpBench\Attributes as Bench;
use function array_reduce;
use function count;

#[Bench\Revs(100)]
class ArrayReduceBench
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
        array_reduce($subject, static function ($acc, $v) {
            return $v === 1;
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
        $result = array_reduce($subject, static function ($acc, $v) {
            $acc[] = $v === 1;
            return $acc;
        }, []);
        assert(count($subject) === count($result));
    }
}
