<?php

class Container {
    private $definitions = [];

    public function define(string $id, string $class_name): void
    {
        $this->definitions[$id] = $class_name;
    }

    public function get(string $id)
    {
        if (isset($this->definitions[$id])) {
            $class_name = $this->definitions[$id];

            $ref = new ReflectionClass($class_name);
            $constructor = $ref->getConstructor();

            if (is_null($constructor)) {
                return new $class_name();
            }

            $args = [];
            foreach ($constructor->getParameters() as $parameter) {
                $type = $parameter->getType();
                $name = strtolower($type->getName());
                $args[] = $this->get($name);
            }
            return new $class_name(...$args);
        }

        return null;
    }
}