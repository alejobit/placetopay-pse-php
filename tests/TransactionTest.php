<?php

namespace PlacetoPay\PSE\Test;

use PHPUnit\Framework\TestCase;
use PlacetoPay\PSE\Client;
use PlacetoPay\PSE\Struct\Bank;
use PlacetoPay\PSE\Struct\PSETransactionResponse;
use PlacetoPay\PSE\Transaction;

class TransactionTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    protected function setUp()
    {
        $this->client = new Client('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
    }

    public function testSendTransactionResponse()
    {
        $transaction = new Transaction($this->client);
        $transaction->setBankCode('1098');
        $transaction->setBankInterface(Bank::PERSONAL_INTERFACE);
        $transaction->setReturnURL('https://www.placetopay.com');
        $transaction->setReference(md5('reference'));
        $transaction->setDescription('Description of transaction');
        $transaction->setLanguage('ES');
        $transaction->setCurrency('COP');
        $transaction->setTotalAmount(12345.6);
        $transaction->setTaxAmount(0.0);
        $transaction->setDevolutionBase(0.0);
        $transaction->setTipAmount(0.0);
        $transaction->setPayer($this->getPayerArray());
        $transaction->setIpAddress('127.0.0.1');
        $this->assertInstanceOf(PSETransactionResponse::class, $transaction->send());
    }

    public function testSendTransactionMultiCreditResponse()
    {
        $transaction = new Transaction($this->client, true);
        $transaction->setBankCode('1098');
        $transaction->setBankInterface(Bank::PERSONAL_INTERFACE);
        $transaction->setReturnURL('https://www.placetopay.com');
        $transaction->setReference(md5('reference'));
        $transaction->setDescription('Description of transaction');
        $transaction->setLanguage('ES');
        $transaction->setCurrency('COP');
        $transaction->setTotalAmount(12345.6);
        $transaction->setTaxAmount(0.0);
        $transaction->setDevolutionBase(0.0);
        $transaction->setTipAmount(0.0);
        $transaction->setPayer($this->getPayerArray());
        $transaction->setIpAddress('127.0.0.1');
        $transaction->addCreditConcept($this->getCreditConceptArray());
        $this->assertInstanceOf(PSETransactionResponse::class, $transaction->send());
    }

    /**
     * @return array
     */
    private function getPayerArray()
    {
        return array(
            'documentType' => 'CC',
            'document' => '123456789',
            'firstName' => 'Foo',
            'lastName' => 'Bar',
            'company' => 'PlacetoPay',
            'emailAddress' => 'info@placetopay.com',
            'address' => 'Calle 53 No. 45 – 112 OF. 1901',
            'city' => 'Medellín',
            'province' => 'Antioquia',
            'country' => 'CO',
            'phone' => '+57 (4) 444 2310',
            'mobile' => '+57 (4) 444 2310',
        );
    }

    /**
     * @return array
     */
    private function getCreditConceptArray()
    {
        return array(
            'entityCode'=> '123456',
            'serviceCode' => '654321',
            'amountValue' => 12345.6,
            'taxValue' => 0.0,
            'description' => 'Description of credit concept',
        );
    }
}
