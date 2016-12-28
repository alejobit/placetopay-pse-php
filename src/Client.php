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
use Psr\Cache\CacheItemPoolInterface;

class Client extends \SoapClient
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @var CacheItemPoolInterface
     */
    private $cachePool;

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
     * @param CacheItemPoolInterface $cachePool
     */
    public function setCachePool(CacheItemPoolInterface $cachePool)
    {
        $this->cachePool = $cachePool;
    }

    /**
     * @return GetBankListResponse
     */
    public function getBankList()
    {
        if (is_null($this->cachePool)) {
            return $this->getUpdatedBankList();
        }

        $cachedResponse = $this->cachePool->getItem('get_bank_list_response');

        if ($cachedResponse->isHit()) {
            return $cachedResponse->get();
        }

        $response = $this->getUpdatedBankList();
        $cachedResponse->set($response);
        $cachedResponse->expiresAfter(86400); // 1 day in cache
        $this->cachePool->save($cachedResponse);

        return $response;
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
     * @param PSETransactionMultiCreditRequest $transactionRequest
     * @return CreateTransactionMultiCreditResponse
     */
    public function createTransactionMultiCredit(PSETransactionMultiCreditRequest $transactionRequest)
    {
        return parent::createTransactionMultiCredit(
            new CreateTransactionMultiCredit($this->auth, $transactionRequest)
        );
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

    /**
     * @return GetBankListResponse
     */
    private function getUpdatedBankList()
    {
        var_dump('obteniendo lista de bancos actualizada');
        return parent::getBankList(new GetBankList($this->auth));
    }
}
