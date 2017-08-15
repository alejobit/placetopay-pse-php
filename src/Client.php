<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\Authentication;
use PlacetoPay\PSE\Struct\CreateTransaction;
use PlacetoPay\PSE\Struct\CreateTransactionMultiCredit;
use PlacetoPay\PSE\Struct\CreateTransactionMultiCreditResponse;
use PlacetoPay\PSE\Struct\CreateTransactionResponse;
use PlacetoPay\PSE\Struct\GetBankList;
use PlacetoPay\PSE\Struct\GetBankListResponse;
use PlacetoPay\PSE\Struct\GetTransactionInformation;
use PlacetoPay\PSE\Struct\GetTransactionInformationResponse;
use PlacetoPay\PSE\Struct\PSETransactionMultiCreditRequest;
use PlacetoPay\PSE\Struct\PSETransactionRequest;

class Client extends \SoapClient
{
    const DEFAULT_WSDL = 'https://test.placetopay.com/soap/pse/?wsdl';
    const DEFAULT_LOCATION = 'https://test.placetopay.com/soap/pse/';

    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param string $login
     * @param string $tranKey
     * @param string $wsdl
     */
    public function __construct($login, $tranKey, $wsdl = null, $location = null)
    {
        $this->auth = new Authentication($login, $tranKey);

        parent::__construct($wsdl ?: self::DEFAULT_WSDL, array(
            'classmap' => $this->getClassMap(),
            'location' => $location ?: self::DEFAULT_LOCATION,
        ));
    }

    /**
     * @return GetBankListResponse
     */
    public function getBankList()
    {
        return parent::__soapCall('getBankList', array(
            new GetBankList($this->auth)
        ));
    }

    /**
     * @param PSETransactionRequest $transactionRequest
     * @return CreateTransactionResponse
     */
    public function createTransaction(PSETransactionRequest $transactionRequest)
    {
        return parent::__soapCall('createTransaction', array(
            new CreateTransaction($this->auth, $transactionRequest)
        ));
    }

    /**
     * @param PSETransactionMultiCreditRequest $transactionRequest
     * @return CreateTransactionMultiCreditResponse
     */
    public function createTransactionMultiCredit(PSETransactionMultiCreditRequest $transactionRequest)
    {
        return parent::__soapCall('createTransactionMultiCredit', array(
            new CreateTransactionMultiCredit($this->auth, $transactionRequest)
        ));
    }

    /**
     * @param int $transactionID
     * @return GetTransactionInformationResponse
     */
    public function getTransactionInformation($transactionID)
    {
        return parent::__soapCall('getTransactionInformation', array(
            new GetTransactionInformation($this->auth, $transactionID)
        ));
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
            'CreditConcept' => '\\PlacetoPay\\PSE\\Struct\\CreditConcept',
            'ArrayOfCreditconcept' => '\\PlacetoPay\\PSE\\Struct\\ArrayOfCreditconcept',
            'PSETransactionMultiCreditRequest' => '\\PlacetoPay\\PSE\\Struct\\PSETransactionMultiCreditRequest',
            'createTransactionMultiCredit' => '\\PlacetoPay\\PSE\\Struct\\CreateTransactionMultiCredit',
            'createTransactionMultiCreditResponse' => '\\PlacetoPay\\PSE\\Struct\\CreateTransactionMultiCreditResponse',
            'getTransactionInformation' => '\\PlacetoPay\\PSE\\Struct\\GetTransactionInformation',
            'TransactionInformation' => '\\PlacetoPay\\PSE\\Struct\\TransactionInformation',
            'getTransactionInformationResponse' => '\\PlacetoPay\\PSE\\Struct\\GetTransactionInformationResponse',
        );
    }
}
