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
            return new $class_name();
        }

        return null;
    }
}