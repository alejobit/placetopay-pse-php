<?php

namespace PlacetoPay\PSE\Struct;

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
        $this->entityCode = $entityCode;
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
        $this->serviceCode = $serviceCode;
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
        $this->amountValue = $amountValue;
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
        $this->taxValue = $taxValue;
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
        $this->description = $description;
    }
}
