<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/9/6 11:47
 */

/*
 * 代理模式
 *
 * 为其他对象提供一个代理以控制这个对象的访问
 * */

interface Proxy
{
    public function request();

    public function display();
}

class RealSubject
{
    public function request()
    {
        echo 'RealSubject request<br/>';
    }

    public function display()
    {
        echo 'RealSubject display<br/>';
    }
}

class ProxySubject
{
    private $_subject = null;

    public function __construct()
    {
        $this->_subject = new RealSubject();
    }

    public function request()
    {
        $this->_subject->request();
    }

    public function display()
    {
        $this->_subject->display();
    }
}

$objProxy = new ProxySubject();
$objProxy->request();
$objProxy->display();