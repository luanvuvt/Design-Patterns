<?php

interface Widget {
  public function draw();
}

class WidgetSlideshow implements Widget {
  public function draw() {
    echo 'Slideshow';
  }
}

class WidgetMasonry implements Widget {
  public function draw() {
    echo 'Masonry';
  }
}

class Factory {
  public function createWidget($type) {
    switch ($type) {
      case 'slideshow':
        return new WidgetSlideshow();
      case 'masonry':
        return new WidgetMasonry();
      default:
        throw new Exception('Wrong type');
    }
  }
}

$factory = new Factory();

$factory->createWidget('slideshow')
  ->draw();
