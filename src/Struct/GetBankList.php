<?php

namespace PlacetoPay\PSE\Struct;

class GetBankList
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
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
    public function setAuth(Authentication $auth)
    {
        $this->auth = $auth;
    }
}
