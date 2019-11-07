<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/8/18 10:12
 */

/*
 * 工厂模式方法
 *
 * 定义一个用于创建对象的接口，让子类决定将哪一个类实例化，使用一个类的实例化延迟到其子类
 * */

class DBFactory
{
    public static function create($type)
    {
        $class = $type . 'DB';

        return new $class;
    }
}

interface DB
{
    public function connect();

    public function exec();
}

class MysqlDB implements DB
{
    public function __construct()
    {
        echo 'mysql db<br/>';
    }

    public function connect()
    {
    }

    public function exec()
    {
    }
}

class PostgreDB implements DB
{
    public function __construct()
    {
        echo 'Postgre db<br/>';
    }

    public function connect()
    {
    }

    public function exec()
    {
    }
}

class MssqlDB implements DB
{
    public function __construct()
    {
        echo 'Mssql db';
    }

    public function connect()
    {
    }

    public function exec()
    {
    }
}

$oMysql   = DBFactory::create('Mysql');
$oPostgre = DBFactory::create('Postgre');
$oMssql   = DBFactory::create('Mssql');
