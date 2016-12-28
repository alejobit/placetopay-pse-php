<?php

namespace PlacetoPay\PSE\Struct;

class ArrayOfAttribute extends ArrayStruct
{
    /**
     * @param array $items
     */
    public function setItems(array $items = array())
    {
        foreach ($items as $item) {
            if (!$item instanceof Attribute) {
                throw new \InvalidArgumentException(sprintf(
                    'The item property can only contain items of \PlacetoPay\PSE\Struct\Attribute, "%s" given',
                    is_object($item) ? get_class($item) : gettype($item)
                ));
            }
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
