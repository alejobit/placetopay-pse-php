<?php

namespace PlacetoPay\PSE\Struct;

use PlacetoPay\PSE\Helper\Validator;

class CreditConcept
{
    /**
     * @var string
     */
    private $entityCode;

    /**
     * @var string
     */
    private $serviceCode;

    /**
     * @var double
     */
    private $amountValue;

    /**
     * @var double
     */
    private $taxValue;

    /**
     * @var string
     */
    private $description;

    /**
     * @return string
     */
    public function getEntityCode()
    {
        return $this->entityCode;
    }

    /**
     * @param string $entityCode
     */
    public function setEntityCode($entityCode)
    {
        $this->entityCode = Validator::validString($entityCode, 12);
    }

    /**
     * @return string
     */
    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    /**
     * @param string $serviceCode
     */
    public function setServiceCode($serviceCode)
    {
        $this->serviceCode = Validator::validString($serviceCode, 12);
    }

    /**
     * @return double
     */
    public function getAmountValue()
    {
        return $this->amountValue;
    }

    /**
     * @param double $amountValue
     */
    public function setAmountValue($amountValue)
    {
        $this->amountValue = Validator::validDouble($amountValue);
    }

    /**
     * @return double
     */
    public function getTaxValue()
    {
        return $this->taxValue;
    }

    /**
     * @param double $taxValue
     */
    public function setTaxValue($taxValue)
    {
        $this->taxValue = Validator::validDouble($taxValue);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = Validator::validString($description, 60);
    }
}
