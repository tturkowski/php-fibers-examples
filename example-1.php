<?php

$fruits = ["apple", "pear", "melon", "berry", "banana", "kiwi", "orange", "kumquat"];

$fiber = new Fiber(function($fruits) : void {
  $index = 0;
  foreach ($fruits as $fruit) {
    printf("Fruit %s has %s letters".PHP_EOL, $fruit, strlen($fruit));
    Fiber::suspend($index++);
  }
});

$value = $fiber->start($fruits);
printf("Loop index: %s".PHP_EOL, $value);
echo PHP_EOL;

echo 'Is running?'.PHP_EOL;
var_dump($fiber->isRunning());
echo 'Is suspended?'.PHP_EOL;
var_dump($fiber->isSuspended());
echo PHP_EOL;

$value2 = $fiber->resume();
printf("Loop index: %s".PHP_EOL, $value2);
