<?php

abstract class State {
  abstract public function start(DockerContainer $container);
  abstract public function stop(DockerContainer $container);
  abstract public function remove(DockerContainer $container);

  public function changeState(DockerContainer $container, State $state) {
    $container->setState($state);
  }
}

class StartedState extends State {
  public function start(DockerContainer $container) {
    throw new Exception('Container has been started.');
  }

  public function stop(DockerContainer $container) {
    echo "stop container\n";

    $this->changeState($container, new StoppedState());
  }

  public function remove(DockerContainer $container) {
    throw new Exception("Can not remove started container.");
  }
}

class StoppedState extends State {
  public function start(DockerContainer $container) {
    echo "start container\n";

    $this->changeState($container, new StartedState());
  }

  public function stop(DockerContainer $container) {
    throw new Exception('Container has been stopped.');
  }

  public function remove(DockerContainer $container) {
    echo "remove container\n";

    $this->changeState($container, new RemovedState());
  }
}

class RemovedState extends State {
  public function start(DockerContainer $container) {
    throw new Exception('Container has been removed.');
  }

  public function stop(DockerContainer $container) {
    throw new Exception('Container has been removed.');
  }

  public function remove(DockerContainer $container) {
    throw new Exception('Container has been removed.');
  }
}

class DockerContainer {
  private $state;

  public function __construct() {
    $this->setState(new StartedState());
  }

  public function setState(State $state) {
    $this->state = $state;
  }

  public function start() {
    $this->state->start($this);
  }
  
  public function stop() {
    $this->state->stop($this);
  }

  public function remove() {
    $this->state->remove($this);
  }
}

$container = new DockerContainer();

$container->stop();
$container->start();
$container->stop();
$container->remove();
