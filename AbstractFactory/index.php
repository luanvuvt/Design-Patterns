<?php

interface ComponentFactory {
  public function createButton();
  public function createInput();
}

class MaterialComponentFactory implements ComponentFactory {
  public function createButton() {
    return 'Material Design Button';
  }

  public function createInput() {
    return 'Material Design Input';
  }
}

class App {
  private $factory;

  public function __construct(ComponentFactory $factory) {
    $this->factory = $factory;
  }

  public function init() {
    echo $this->factory->createButton();
    echo $this->factory->createInput();
  }
}

$app = new App(new MaterialComponentFactory());
$app->init();
