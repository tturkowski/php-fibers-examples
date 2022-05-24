<?php

$fruits = ["apple", "pear", "melon", "berry", "banana", "kiwi", "orange", "kumquat"];

$fiber = new Fiber(function($fruits) : void {
  $index = 0;
  foreach ($fruits as $fruit) {
    printf("$index | Fruit %s has %s letters".PHP_EOL, $fruit, strlen($fruit));
    Fiber::suspend($index++);
  }
});

$fiber->start($fruits);

while(!$fiber->isTerminated()) {
  $fiber->resume();
}

echo PHP_EOL;
echo 'Is running?'.PHP_EOL;
var_dump($fiber->isRunning());
echo 'Is suspended?'.PHP_EOL;
var_dump($fiber->isSuspended());
echo 'Is terminated?'.PHP_EOL;
var_dump($fiber->isTerminated());