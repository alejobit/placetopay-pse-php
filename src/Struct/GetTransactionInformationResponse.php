<?php

namespace PlacetoPay\PSE\Struct;

class GetTransactionInformationResponse
{
    /**
     * @var TransactionInformation
     */
    private $getTransactionInformationResult;

    /**
     * @return TransactionInformation
     */
    public function getGetTransactionInformationResult()
    {
        return $this->getTransactionInformationResult;
    }
}
