<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\Authentication;

class Client extends \SoapClient
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param string $login
     * @param string $tranKey
     * @param string $wsdl
     */
    public function __construct($login, $tranKey, $wsdl = 'https://test.placetopay.com/soap/pse?wsdl')
    {
        $this->auth = new Authentication($login, $tranKey);

        parent::__construct($wsdl);
    }
}
