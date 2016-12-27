<?php

namespace PlacetoPay\PSE\Struct;

class PSETransactionRequest
{
    /**
     * @var string
     */
    private $bankCode;

    /**
     * @var string
     */
    private $bankInterface;

    /**
     * @var string
     */
    private $returnURL;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var double
     */
    private $totalAmount;

    /**
     * @var double
     */
    private $taxAmount;

    /**
     * @var double
     */
    private $devolutionBase;

    /**
     * @var double
     */
    private $tipAmount;

    /**
     * @var Person
     */
    private $payer;

    /**
     * @var Person
     */
    private $buyer;

    /**
     * @var Person
     */
    private $shipping;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var ArrayOfAttribute
     */
    private $additionalData;

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    /**
     * @return string
     */
    public function getBankInterface()
    {
        return $this->bankInterface;
    }

    /**
     * @param string $bankInterface
     */
    public function setBankInterface($bankInterface)
    {
        $this->bankInterface = $bankInterface;
    }

    /**
     * @return string
     */
    public function getReturnURL()
    {
        return $this->returnURL;
    }

    /**
     * @param string $returnURL
     */
    public function setReturnURL($returnURL)
    {
        $this->returnURL = $returnURL;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return double
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param double $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return double
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @param double $taxAmount
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }

    /**
     * @return double
     */
    public function getDevolutionBase()
    {
        return $this->devolutionBase;
    }

    /**
     * @param double $devolutionBase
     */
    public function setDevolutionBase($devolutionBase)
    {
        $this->devolutionBase = $devolutionBase;
    }

    /**
     * @return double
     */
    public function getTipAmount()
    {
        return $this->tipAmount;
    }

    /**
     * @param double $tipAmount
     */
    public function setTipAmount($tipAmount)
    {
        $this->tipAmount = $tipAmount;
    }

    /**
     * @return Person
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * @param Person $payer
     */
    public function setPayer(Person $payer)
    {
        $this->payer = $payer;
    }

    /**
     * @return Person
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param Person $buyer
     */
    public function setBuyer(Person $buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * @return Person
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Person $shipping
     */
    public function setShipping(Person $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    /**
     * @param ArrayOfAttribute $additionalData
     */
    public function setAdditionalData(ArrayOfAttribute $additionalData)
    {
        $this->additionalData = $additionalData;
    }
}
