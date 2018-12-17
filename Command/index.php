<?php

interface Command {
  public function execute();
}

class Command1 implements Command {
  public function execute() {
    echo 'Command 1';
  }
}

class Command2 implements Command {
  public function execute() {
    echo 'Command 2';
  }
}

class Button {
  private $cmd;

  public function setCommand(Command $cmd) {
    $this->cmd = $cmd;
  }

  public function onClick() {
    $this->cmd->execute();
  }
}

$btn1 = new Button();
$btn2 = new Button();

$btn1->setCommand(new Command1());
$btn2->setCommand(new Command2());

$remoteControl = array($btn1, $btn2);

$remoteControl[0]->onClick();
$remoteControl[1]->onClick();


