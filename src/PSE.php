<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\ArrayOfBank;
use PlacetoPay\PSE\Struct\TransactionInformation;
use Psr\Cache\CacheItemPoolInterface;

class PSE
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    public function __construct($login, $tranKey, $wsdl = null)
    {
        $this->client = new Client($login, $tranKey, $wsdl);
    }

    /**
     * @param CacheItemPoolInterface $cache
     */
    public function setCacheAdapter($cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return ArrayOfBank
     */
    public function getBankList()
    {
        if (is_null($this->cache)) {
            return $this->getUpdatedBankList();
        }

        $cachedList = $this->cache->getItem('placetopay.pse.bank_list');

        if ($cachedList->isHit()) {
            return $cachedList->get();
        }

        $updatedList = $this->getUpdatedBankList();

        $cachedList->set($updatedList);
        $cachedList->expiresAfter(86400); // 1 day in cache

        $this->cache->save($cachedList);

        return $updatedList;
    }

    /**
     * @param bool $multiCredit
     * @return Transaction
     */
    public function createTransaction($multiCredit = false)
    {
        return new Transaction($this->client, $multiCredit);
    }

    /**
     * @return Transaction
     */
    public function createTransactionMultiCredit()
    {
        return $this->createTransaction(true);
    }

    /**
     * @param int $transactionID
     * @return TransactionInformation
     */
    public function getTransactionInformation($transactionID)
    {
        $response = $this->client->getTransactionInformation($transactionID);

        return $response->getGetTransactionInformationResult();
    }

    /**
     * @return ArrayOfBank
     */
    private function getUpdatedBankList()
    {
        $response = $this->client->getBankList();

        return $response->getGetBankListResult();
    }
}
