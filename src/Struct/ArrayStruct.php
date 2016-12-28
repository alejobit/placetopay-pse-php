<?php

namespace PlacetoPay\PSE\Struct;

class ArrayStruct implements \Iterator, \Countable
{
    /**
     * @var array
     */
    protected $item;

    /**
     * @param array $items
     */
    public function __construct(array $items = array())
    {
        $this->setItems($items);
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->item;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items = array())
    {
        $this->item = $items;
    }

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
