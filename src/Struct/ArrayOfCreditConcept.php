<?php

namespace PlacetoPay\PSE\Struct;

class ArrayOfCreditConcept extends ArrayStruct
{
    /**
     * @param array $items
     */
    public function setItems(array $items = array())
    {
        foreach ($items as $item) {
            if (!$item instanceof CreditConcept) {
                throw new \InvalidArgumentException(sprintf(
                    'The item property can only contain items of \PlacetoPay\PSE\Struct\CreditConcept, "%s" given',
                    is_object($item) ? get_class($item) : gettype($item)
                ));
            }
        }

        $this->item = $items;
    }

    /**
     * @param CreditConcept $item
     */
    public function addItem(CreditConcept $item)
    {
        $this->item[] = $item;
    }
}
