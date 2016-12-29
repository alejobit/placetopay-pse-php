<?php

namespace PlacetoPay\PSE\Struct;

use PlacetoPay\PSE\Helper\Validator;

class Authentication
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $tranKey;

    /**
     * @var string
     */
    private $seed;

    /**
     * @var ArrayOfAttribute
     */
    private $additional;

    /**
     * @param string $login
     * @param string $tranKey
     * @param array $additional
     */
    public function __construct($login, $tranKey, array $additional = array())
    {
        $this->login = Validator::validString($login, 32);
        $this->tranKey = $this->generateHash($tranKey);
        $this->additional = new ArrayOfAttribute($additional);
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getTranKey()
    {
        return $this->tranKey;
    }

    /**
     * @return string
     */
    public function getSeed()
    {
        return $this->seed;
    }

    /**
     * @return ArrayOfAttribute
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param string $tranKey
     * @return string
     */
    private function generateHash($tranKey)
    {
        $this->seed = date('c');

        return sha1($this->seed.$tranKey);
    }
}
