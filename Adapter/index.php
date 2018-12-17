<?php

interface Adapter {
  public function read();
}

class MemoryCard {
  public function getContents() {
    return ["memory", "card", "contents"];
  }
}

class MemoryCardAdapter implements Adapter {
  private $mc;

  public function __construct(MemoryCard $mc) {
    $this->mc = $mc;
  }

  public function read() {
    return implode(" ", $this->mc->getContents());
  }
}

class Computer {
  public $adapter;

  public function __construct(Adapter $adapter) {
    $this->adapter = $adapter;
  }

  public function run() {
    echo $this->adapter->read();
  }
}

$computer = new Computer(new MemoryCardAdapter(new MemoryCard()));
$computer->run();