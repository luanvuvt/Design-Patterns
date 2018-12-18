<?php

abstract class NoodleMaker {
  abstract public function prepare();
  abstract public function boilWater();
  abstract public function cook();

  final public function make() {
    $this->prepare();
    $this->boilWater();
    $this->cook();
  }
}

class LobsterNoodle extends NoodleMaker {
  public function prepare() {
    echo "Prepare lobste\n";
  }

  public function boilWater() {
    echo "Boil water\n";
  }

  public function cook() {
    echo "Cook\n";
  }
}

$noodle = new LobsterNoodle();
$noodle->make();
