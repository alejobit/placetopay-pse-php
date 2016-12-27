<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\Authentication;
use PlacetoPay\PSE\Struct\GetBankList;

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
    public function __construct($login, $tranKey, $wsdl = 'https://test.placetopay.com/soap/pse/?wsdl')
    {
        $this->auth = new Authentication($login, $tranKey);

        parent::__construct($wsdl, array(
            'classmap' => $this->getClassMap(),
        ));
    }

    public function getBankList()
    {
        return parent::getBankList(new GetBankList($this->auth));
    }

    private function getClassMap()
    {
        return array(
            'Attribute' => '\\PlacetoPay\\PSE\\Struct\\Attribute',
            'ArrayOfAttribute' => '\\PlacetoPay\\PSE\\Struct\\ArrayOfAttribute',
            'Authentication' => '\\PlacetoPay\\PSE\\Struct\\Authentication',
            'getBankList' => '\\PlacetoPay\\PSE\\Struct\\GetBankList',
            'Bank' => '\\PlacetoPay\\PSE\\Struct\\Bank',
            'ArrayOfBank' => '\\PlacetoPay\\PSE\\Struct\\ArrayOfBank',
            'getBankListResponse' => '\\PlacetoPay\\PSE\\Struct\\GetBankListResponse',
        );
    }
}
