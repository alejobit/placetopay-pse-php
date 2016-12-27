<?php

namespace PlacetoPay\PSE\Struct;

class ArrayStruct implements \Iterator, \Countable
{
    /**
     * @var array
     */
    protected $item;

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->item);
    }

    public function next()
    {
        next($this->item);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->item);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    public function rewind()
    {
        reset($this->item);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->item);
    }
}