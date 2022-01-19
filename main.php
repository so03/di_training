<?php
require_once('./container.php');

$container = new Container();

class Hoge {
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }
}

class Foo {}

$container->define('hoge', 'Hoge');
$container->define('foo', 'Foo');

$instance = $container->get('hoge');
var_dump($instance);
