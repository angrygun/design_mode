<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/8/19 17:47
 */

/*
 * 命令模式
 *
 * 将一个请求封装为一个对象从而使你可用不同的请求对客户进行参数化，对请求排除或记录请求日志，以及支持可取消的操作
 * */

interface Command
{
    public function execute();
}

class Invoker
{
    private $_command = array();

    public function setCommand($command)
    {
        $this->_command[] = $command;
    }

    public function executeCommand()
    {
        foreach ($this->_command as $command) {
            $command->execute();
        }
    }

    public function removeCommand($command)
    {
        $key = array_search($command, $this->_command);
        if ($key !== false) {
            unset($this->_command[$key]);
        }
    }
}

class Receiver
{
    private $_name = null;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function action()
    {
        echo $this->_name . 'action<br/>';
    }

    public function action1()
    {
        echo $this->_name . 'action1<br/>';
    }
}

class ConcreteCommand implements Command
{
    private $_receiver;

    public function __construct($receiver)
    {
        $this->_receiver = $receiver;
    }

    public function execute()
    {
        $this->_receiver->action();
    }
}

class ConcreteCommand1 implements Command
{
    private $_receiver;

    public function __construct($receiver)
    {
        $this->_receiver = $receiver;
    }

    public function execute()
    {
        $this->_receiver->action1();
    }
}

class ConcreteCommand2 implements Command
{
    private $_receiver;

    public function __construct($receiver)
    {
        $this->_receiver = $receiver;
    }

    public function execute()
    {
        $this->_receiver->action();
        $this->_receiver->action1();
    }
}


$objReceiver  = new Receiver('NO.1');
$objReceiver1 = new Receiver('NO.2');
$objReceiver2 = new Receiver('NO.3');

$objCommand  = new ConcreteCommand($objReceiver);
$objCommand1 = new ConcreteCommand1($objReceiver);
$objCommand2 = new ConcreteCommand($objReceiver1);
$objCommand3 = new ConcreteCommand1($objReceiver1);
$objCommand4 = new Concretecommand2($objReceiver2);

//$objCommand->execute();
//$objCommand1->execute();
//$objCommand2->execute();
//$objCommand3->execute();
//$objCommand4->execute();

$objInvoker = new Invoker();
$objInvoker->setCommand($objCommand);
$objInvoker->setCommand($objCommand1);
$objInvoker->setCommand($objCommand2);
$objInvoker->setCommand($objCommand3);
$objInvoker->setCommand($objCommand4);
$objInvoker->executeCommand();
$objInvoker->removeCommand($objCommand4);
$objInvoker->executeCommand();