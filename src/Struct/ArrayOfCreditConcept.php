<?php

namespace PlacetoPay\PSE\Struct;

use PlacetoPay\PSE\Helper\Validator;

class ArrayOfCreditConcept extends ArrayStruct
{
    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            Validator::validObject($item, CreditConcept::class);
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

    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function (CreditConcept $creditConcept) {
            return array(
                'entityCode' => $creditConcept->getEntityCode(),
                'serviceCode' => $creditConcept->getServiceCode(),
                'amountValue' => $creditConcept->getAmountValue(),
                'taxValue' => $creditConcept->getTaxValue(),
                'description' => $creditConcept->getDescription(),
            );
        }, $this->item);
    }
}
