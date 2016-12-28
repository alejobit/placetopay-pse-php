<?php

namespace PlacetoPay\PSE\Struct;

class CreateTransactionMultiCreditResponse
{
    /**
     * @var PSETransactionResponse
     */
    private $createTransactionMultiCreditResult;

    /**
     * @return PSETransactionResponse
     */
    public function getCreateTransactionMultiCreditResult()
    {
        return $this->createTransactionMultiCreditResult;
    }
}
