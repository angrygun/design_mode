<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/8/20 15:12
 */
/*
 * 单例模式
 *
 * 保证一个类仅有一个实例，并提供一个访问它的全局访问点
 * */

class Singleton
{
	static private $_instance = null;

	private function __construct()
	{
	}

	static public function getInstance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new Singleton();
		}
		return self::$_instance;
	}

	public function display()
	{
		echo 'It is a singleton class function';
	}
}

//$obj=new Singleton();//实例化不能成功
$obj = Singleton::getInstance();
var_dump($obj);
echo '<br/>';
$obj->display();

$obj1 = Singleton::getInstance();
echo '<br/>';
var_dump($obj1);
echo '<br/>';
var_dump($obj === $obj1);