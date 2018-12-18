<?php

interface ComputerBuilder {
  public function buildMonitor();
  public function buildMouse();
  public function buildKeyboard();
  public function buildCase();
  public function getComputer();
}

class Company1 implements ComputerBuilder {
  public function buildMonitor() {
    return "monitor";
  }

  public function buildMouse() {
    return "mouse";
  }

  public function buildKeyboard() {
    return "keyboard";
  }

  public function buildCase() {
    return "case";
  }

  public function getComputer() {
    return " -> computer";
  }
}

class App {
  private $builder;

  public function __construct(ComputerBuilder $builder) {
    $this->builder = $builder;
  }

  public function sellComputer() {
    $computer = "";

    $computer .= $this->builder->buildMonitor();
    $computer .= $this->builder->buildMouse();
    $computer .= $this->builder->buildKeyboard();
    $computer .= $this->builder->buildCase();
    $computer .= $this->builder->getComputer();
    
    echo $computer;
  }
}

$app = new App(new Company1());
$app->sellComputer();