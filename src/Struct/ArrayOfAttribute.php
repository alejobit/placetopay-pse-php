<?php

namespace PlacetoPay\PSE\Struct;

use PlacetoPay\PSE\Helper\Validator;

class ArrayOfAttribute extends ArrayStruct
{
    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            Validator::validObject($item, Attribute::class);
        }

        $this->item = $items;
    }

    /**
     * @param Attribute $item
     */
    public function addItem(Attribute $item)
    {
        $this->item[] = $item;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function (Attribute $attribute) {
            return array(
                'name' => $attribute->getName(),
                'value' => $attribute->getValue(),
            );
        }, $this->item);
    }
}
