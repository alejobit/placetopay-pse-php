<?php

namespace PlacetoPay\PSE\Struct;

use PlacetoPay\PSE\Helper\Validator;

class PSETransactionRequest
{
    /**
     * @var string
     */
    protected $bankCode;

    /**
     * @var string
     */
    protected $bankInterface;

    /**
     * @var string
     */
    protected $returnURL;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var double
     */
    protected $totalAmount;

    /**
     * @var double
     */
    protected $taxAmount;

    /**
     * @var double
     */
    protected $devolutionBase;

    /**
     * @var double
     */
    protected $tipAmount;

    /**
     * @var Person
     */
    protected $payer;

    /**
     * @var Person
     */
    protected $buyer;

    /**
     * @var Person
     */
    protected $shipping;

    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var string
     */
    protected $userAgent;

    /**
     * @var ArrayOfAttribute
     */
    protected $additionalData;

    /**
     * @param ArrayOfAttribute $additionalData
     */
    public function __construct(ArrayOfAttribute $additionalData = null)
    {
        $this->additionalData = $additionalData ?: new ArrayOfAttribute();
    }

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
        $this->bankCode = Validator::validString($bankCode, 4);
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
        $this->bankInterface = Validator::validString($bankInterface, 1);
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
        $this->returnURL = Validator::validString($returnURL, 255);
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
        $this->reference = Validator::validString($reference, 32);
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
        $this->description = Validator::validString($description, 255);
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
        $this->language = Validator::validString($language, 2);
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
        $this->currency = Validator::validString($currency, 3);
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
        $this->totalAmount = Validator::validDouble($totalAmount);
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
        $this->taxAmount = Validator::validDouble($taxAmount);
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
        $this->devolutionBase = Validator::validDouble($devolutionBase);
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
        $this->tipAmount = Validator::validDouble($tipAmount);
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
        $this->ipAddress = Validator::validString($ipAddress, 15);
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
        $this->userAgent = Validator::validString($userAgent, 255);
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

    /**
     * @param Attribute $attribute
     */
    public function addAdditionalData(Attribute $attribute)
    {
        $this->additionalData->addItem($attribute);
    }
}
