<?php
/**
 * Created by coder meng.
 * User: coder meng
 * Date: 2016/8/18 14:49
 */

/*
 * 建造者模式
 *
 * 将一个复杂对象的构建与它的表示分离，使用同样的构建过程可以创建不同的表示
 * */

class Product
{
    public $_type = null;
    public $_size = null;
    public $_color = null;

    public function setType($type)
    {
        echo 'set product type<br/>';
        $this->_type = $type;
    }

    public function setSize($size)
    {
        echo 'set product size<br/>';
        $this->_size = $size;
    }

    public function setColor($color)
    {
        echo 'set product color<br/>';
        $this->_color = $color;
    }
}

$config = array(
    'type'  => 'shirt',
    'size'  => 'xl',
    'color' => 'red',
);

//没有使用builder以前的处理

$oProduct = new Product();
$oProduct->setType($config['type']);
$oProduct->setSize($config['size']);
$oProduct->setColor($config['color']);


//创建一个builder类

class ProductBuilder
{
    public $_config = null;
    public $_object = null;

    public function ProductBuilder($config)
    {
        $this->_object = new Product();
        $this->_config = $config;
    }

    public function build()
    {
        echo '--- in builder ---<br/>';
        $this->_object->setType($this->_config['type']);
        $this->_object->setSize($this->_config['size']);
        $this->_object->setColor($this->_config['color']);
    }

    public function getProduct()
    {
        return $this->_object;
    }
}

$objBuilder = new ProductBuilder($config);
$objBuilder->build();
$objBuilder->getProduct();