<?php

interface Vehicle {
  public function run();
}

class Car implements Vehicle {
  public function run() {
    echo 'by car';
  }
}

class Bicycle implements Vehicle {
  public function run() {
    echo 'by bicycle';
  } 
}

class Worker {
  private $vehicle;

  public function __construct($vehicle) {
    $this->vehicle = $vehicle;
  }

  public function goHome() {
    $this->vehicle->run();
  }
}

$worker = new Worker(new Bicycle());
// $worker = new Worker(new Car());

$worker->goHome();
