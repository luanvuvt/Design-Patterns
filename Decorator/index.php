<?php

class Usecase {
  public function doAction() {
    echo 'Do action';
  }
}

class UsecaseWithLog {
  private $uc;

  public function __construct(Usecase $uc) {
    $this->uc = $uc;
  }

  public function doAction() {
    echo "Start action\n";

    $this->uc->doAction();

    echo "\nEnd action";
  }
}

$uc = new Usecase();

$logUc = new UsecaseWithLog($uc);

$logUc->doAction();