<?php

namespace PlacetoPay\PSE\Struct;

class CreateTransactionResponse
{
    /**
     * @var PSETransactionResponse
     */
    private $createTransactionResult;

    /**
     * @return PSETransactionResponse
     */
    public function getCreateTransactionResult()
    {
        return $this->createTransactionResult;
    }
}
