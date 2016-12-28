<?php

namespace PlacetoPay\PSE\Struct;

class Bank
{
    const PERSONAL_INTERFACE = 0;
    const BUSINESS_INTERFACE = 1;

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
    public function getCode()
    {
        return $this->bankCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->bankName;
    }
}
