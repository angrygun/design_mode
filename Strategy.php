<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/8/20 16:54
 */
/*
 * 策略模式
 *
 * 定义一系列算法，把它们一个个封装起来，并且使他们可互相替换，使得算法的变化可独立于使用它的客户
 * */

//以下是一系列算法的封闭
interface CacheTable
{
    public function get($key);

    public function set($key, $value);

    public function del($key);
}

//不使用缓存
class NoCache implements CacheTable
{
    public function __construct()
    {
        echo 'Use NoCache<br/>';
    }

    public function get($key)
    {
        return false;
    }

    public function set($key, $value)
    {
        return true;
    }

    public function del($key)
    {
        return false;
    }
}

//文件缓存
class FileCache implements Cachetable
{
    public function __construct()
    {
        echo 'Use FileCache<br/>';//文件缓存构造函数
    }

    public function get($key)
    {
        //文件缓存的get方法实现
    }

    public function set($key, $value)
    {
        //文件缓存的set方法实现
    }

    public function del($key)
    {
        //文件缓存的del方法实现
    }
}

//TTServer
class TTCache implements CacheTable
{
    public function __construct()
    {
        echo 'Use TTCache<br/>';//TTServer缓存构造函数
    }

    public function get($key)
    {
        //TTCache缓存的get方法实现
    }

    public function set($key, $value)
    {
        //TTCache缓存的set方法实现
    }

    public function del($key)
    {
        //TTCache换粗的del方法实现
    }
}

//以下是使用不用缓存的策略

class Model
{
    private $_cache;

    public function __construct()
    {
        $this->_cache = new NoCache();
    }

    public function setCache($cache)
    {
        $this->_cache = $cache;
    }
}

class UserModel extends Model
{

}

class ProductModel extends Model
{
    public function __construct()
    {
        $this->_cache = new TTCache();
    }
}

//实例以下
$mdlUser    = new UserModel();
$mdlProduct = new ProductModel();
$mdlProduct->setCache(new FileCache());//改变策略