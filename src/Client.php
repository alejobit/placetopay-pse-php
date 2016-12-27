<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\Authentication;
use PlacetoPay\PSE\Struct\CreateTransaction;
use PlacetoPay\PSE\Struct\CreateTransactionResponse;
use PlacetoPay\PSE\Struct\GetBankList;
use PlacetoPay\PSE\Struct\GetBankListResponse;
use PlacetoPay\PSE\Struct\GetTransactionInformation;
use PlacetoPay\PSE\Struct\GetTransactionInformationResponse;
use PlacetoPay\PSE\Struct\PSETransactionRequest;

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

    /**
     * @return GetBankListResponse
     */
    public function getBankList()
    {
        return parent::getBankList(new GetBankList($this->auth));
    }

    /**
     * @param PSETransactionRequest $transactionRequest
     * @return CreateTransactionResponse
     */
    public function createTransaction(PSETransactionRequest $transactionRequest)
    {
        return parent::createTransaction(new CreateTransaction($this->auth, $transactionRequest));
    }

    /**
     * @param int $transactionID
     * @return GetTransactionInformationResponse
     */
    public function getTransactionInformation($transactionID)
    {
        return parent::getTransactionInformation(new GetTransactionInformation($this->auth, $transactionID));
    }

    /**
     * @return array
     */
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
            'Person' => '\\PlacetoPay\\PSE\\Struct\\Person',
            'PSETransactionRequest' => '\\PlacetoPay\\PSE\\Struct\\PSETransactionRequest',
            'createTransaction' => '\\PlacetoPay\\PSE\\Struct\\CreateTransaction',
            'PSETransactionResponse' => '\\PlacetoPay\\PSE\\Struct\\PSETransactionResponse',
            'createTransactionResponse' => '\\PlacetoPay\\PSE\\Struct\\CreateTransactionResponse',
            'getTransactionInformation' => '\\PlacetoPay\\PSE\\Struct\\GetTransactionInformation',
            'TransactionInformation' => '\\PlacetoPay\\PSE\\Struct\\TransactionInformation',
            'getTransactionInformationResponse' => '\\PlacetoPay\\PSE\\Struct\\GetTransactionInformationResponse',
        );
    }
}
