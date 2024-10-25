# bench-array_map

## 実行方法

```
composer install
php -n ./vendor/bin/phpbench run --report=my
```

## ベンチマークについて

* `benchOnlyIteration`
  * 配列を走査するだけのベンチマーク
  * 条件を近付けるため、`ForEachBench` と `ArrayMapBench` のどちらでも `$v === 1` という比較式が毎回実行されます
* `benchConstructNew` 
  * 配列を走査して新しい配列を再構築するベンチマーク
  * `array_map()` では配列を構築しないということはできないので、`array_map()`の結果を変数に代入するかしないかだけの違いです
