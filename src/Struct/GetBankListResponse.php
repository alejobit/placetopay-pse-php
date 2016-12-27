<?php

namespace PlacetoPay\PSE\Struct;

class GetBankListResponse
{
    /**
     * @var ArrayOfBank
     */
    private $getBankListResult;

    /**
     * @return ArrayOfBank
     */
    public function getGetBankListResult()
    {
        return $this->getBankListResult;
    }
}
