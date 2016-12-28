<?php

namespace PlacetoPay\PSE\Struct;

class ArrayOfBank extends ArrayStruct
{
    /**
     * @return array
     */
    public function toArray()
    {
        return array_map(function (Bank $bank) {
            return array(
                'code' => $bank->getCode(),
                'name' => $bank->getName(),
            );
        }, $this->item);
    }
}
