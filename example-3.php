<?php

$fruits = ["apple", "pear", "melon", "berry", "banana", "kiwi", "orange", "kumquat"];

$fiber = new Fiber(function($fruits) : void {
  $index = 0;
  foreach ($fruits as $fruit) {
    printf("$index | Fruit %s has %s letters".PHP_EOL, $fruit, strlen($fruit));
    
    Fiber::suspend($index++);
  }
});

$fiber2 = new Fiber(function($fruits, $fiber) {
  $fiber->start($fruits);

  while(!$fiber->isTerminated()) {
    $fiber->resume();
  }  
});

$fiber2->start($fruits, $fiber);