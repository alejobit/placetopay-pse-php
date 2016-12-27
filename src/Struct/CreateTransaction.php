<?php

namespace PlacetoPay\PSE\Struct;

class CreateTransaction
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @var PSETransactionRequest
     */
    private $transaction;

    /**
     * @param Authentication $auth
     * @param PSETransactionRequest $transaction
     */
    public function __construct(Authentication $auth, PSETransactionRequest $transaction)
    {
        $this->auth = $auth;
        $this->transaction = $transaction;
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
     * @return PSETransactionRequest
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param PSETransactionRequest $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}
