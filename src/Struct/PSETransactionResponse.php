<?php

namespace PlacetoPay\PSE\Struct;

class PSETransactionResponse
{
    /**
     * @var string
     */
    private $returnCode;

    /**
     * @var string
     */
    private $bankURL;

    /**
     * @var string
     */
    private $trazabilityCode;

    /**
     * @var int
     */
    private $transactionCycle;

    /**
     * @var int
     */
    private $transactionID;

    /**
     * @var string
     */
    private $sessionID;

    /**
     * @var string
     */
    private $bankCurrency;

    /**
     * @var float
     */
    private $bankFactor;

    /**
     * @var int
     */
    private $responseCode;

    /**
     * @var string
     */
    private $responseReasonCode;

    /**
     * @var string
     */
    private $responseReasonText;

    /**
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return string
     */
    public function getBankURL()
    {
        return $this->bankURL;
    }

    /**
     * @return string
     */
    public function getTrazabilityCode()
    {
        return $this->trazabilityCode;
    }

    /**
     * @return int
     */
    public function getTransactionCycle()
    {
        return $this->transactionCycle;
    }

    /**
     * @return int
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @return string
     */
    public function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * @return string
     */
    public function getBankCurrency()
    {
        return $this->bankCurrency;
    }

    /**
     * @return float
     */
    public function getBankFactor()
    {
        return $this->bankFactor;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    /**
     * @return string
     */
    public function getResponseReasonText()
    {
        return $this->responseReasonText;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'returnCode' => $this->returnCode,
            'bankURL' => $this->bankURL,
            'trazabilityCode' => $this->trazabilityCode,
            'transactionCycle' => $this->transactionCycle,
            'transactionID' => $this->transactionID,
            'sessionID' => $this->sessionID,
            'bankCurrency' => $this->bankCurrency,
            'bankFactor' => $this->bankFactor,
            'responseCode' => $this->responseCode,
            'responseReasonCode' => $this->responseReasonCode,
            'responseReasonText' => $this->responseReasonText,
        );
    }
}
