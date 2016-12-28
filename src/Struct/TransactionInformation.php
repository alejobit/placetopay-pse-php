<?php

namespace PlacetoPay\PSE\Struct;

class TransactionInformation
{
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
    private $reference;

    /**
     * @var string
     */
    private $requestDate;

    /**
     * @var string
     */
    private $bankProcessDate;

    /**
     * @var bool
     */
    private $onTest;

    /**
     * @var string
     */
    private $returnCode;

    /**
     * @var string
     */
    private $trazabilityCode;

    /**
     * @var int
     */
    private $transactionCycle;

    /**
     * @var string
     */
    private $transactionState;

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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return string
     */
    public function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }

    /**
     * @return boolean
     */
    public function isOnTest()
    {
        return $this->onTest;
    }

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
     * @return string
     */
    public function getTransactionState()
    {
        return $this->transactionState;
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
            'transactionID' => $this->transactionID,
            'sessionID' => $this->sessionID,
            'reference' => $this->reference,
            'requestDate' => $this->requestDate,
            'bankProcessDate' => $this->bankProcessDate,
            'onTest' => $this->onTest,
            'returnCode' => $this->returnCode,
            'trazabilityCode' => $this->trazabilityCode,
            'transactionCycle' => $this->transactionCycle,
            'transactionState' => $this->transactionState,
            'responseCode' => $this->responseCode,
            'responseReasonCode' => $this->responseReasonCode,
            'responseReasonText' => $this->responseReasonText,
        );
    }
}
