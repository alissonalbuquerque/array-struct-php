<?php

namespace Alisson\Arraystruct;

class ArrayStruct {

    public const _SORT_REGULAR       = SORT_REGULAR;
    public const _SORT_NUMERIC       = SORT_NUMERIC;
    public const _SORT_STRING        = SORT_STRING;
    public const _SORT_LOCALE_STRING = SORT_LOCALE_STRING;

    public const _FILTER_NOT_USE  = 0;
    public const _FILTER_USE_KEY  = ARRAY_FILTER_USE_KEY;
    public const _FILTER_USE_BOTH = ARRAY_FILTER_USE_BOTH;

    private array $array = [];

    public function __construct(array $array = [])
    {
        $this->set_array($array);
    }

    public function get_array() : array {
        return $this->array;
    }

    public function set_array(array $array) : void {
        $this->array = $array;
    }

    public function len() : int {
        return count($this->array);
    }

    public function in(mixed $value, bool $comparate_type = false) : bool {
        return in_array($value, $this->array, $comparate_type);
    }

    public function push(mixed ...$values) : int {
        return array_push($this->array, ...$values);
    }

    public function pop() : mixed {
        return array_pop($this->array);
    }

    public function unique(int $compare = self::_SORT_STRING) : ArrayStruct {
        return new self(array_unique($this->array, $compare));
    }

    public function map(?callable $callback) : ArrayStruct {
        return new self(array_map($callback, $this->array));
    }

    public function filter(?callable $callback, int $mode = self::_FILTER_NOT_USE) : ArrayStruct {
        return new self(array_filter($this->array, $callback, $mode));
    }

    public function reduce(callable $callback, mixed $initial = null) : ArrayStruct {
        return new self(array_reduce($this->array, $callback, $initial));
    }
}