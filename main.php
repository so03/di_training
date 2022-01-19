<?php
require_once('./container.php');

$container = new Container();

class Hoge {}

$container->define('hoge', 'Hoge');

$instance = $container->get('hoge');
var_dump($instance);
