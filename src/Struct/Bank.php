<?php

namespace PlacetoPay\PSE\Struct;

class Bank
{
    /**
     * @var string
     */
    private $bankCode;

    /**
     * @var string
     */
    private $bankName;

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }
}
