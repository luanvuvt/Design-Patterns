<?php

class Earth {
  private static $instance;

  private function __construct() {}

  public static function getInstance() {
    if (null == self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function hello() {
    echo 'Hello';
  }
}

$bob = Earth::getInstance();

$bob->hello();