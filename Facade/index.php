<?php

class ComputerCase {
  public function init() {
    echo "init case\n";
  }
}

class Monitor {
  public function init() {
    echo "init monitor\n";
  }
}

class ComputerFacade {
  public function run() {
    (new ComputerCase())->init();
    (new Monitor())->init();
  }
}

(new ComputerFacade())->run();
