<?php

class Foo {
    // タイプヒントは必須。(Reflection class で クラスを特定するため)
    public function __construct(Bar $bar)
    {
       $this->bar = $bar; 
    }
}

$ref = new ReflectionClass('Foo');

$constructor = $ref->getConstructor();

foreach ($constructor->getParameters() as $parameter) {
    $type = $parameter->getType();
    var_dump($type);
    $name = $type->getName();
    var_dump($name);
    var_dump(strtolower($name));
}