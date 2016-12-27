<?php

namespace PlacetoPay\PSE\Struct;

class GetTransactionInformation
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @var int
     */
    private $transactionID;

    /**
     * @param Authentication $auth
     * @param int $transactionID
     */
    public function __construct(Authentication $auth, $transactionID)
    {
        $this->auth = $auth;
        $this->transactionID = $transactionID;
    }

    /**
     * @return Authentication
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param Authentication $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    /**
     * @return int
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @param int $transactionID
     */
    public function setTransactionID($transactionID)
    {
        $this->transactionID = $transactionID;
    }
}
