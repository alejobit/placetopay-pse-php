<?php

namespace PlacetoPay\PSE\Test;

use PHPUnit\Framework\TestCase;
use PlacetoPay\PSE\Client;
use PlacetoPay\PSE\Struct\ArrayOfBank;
use PlacetoPay\PSE\Struct\Bank;
use PlacetoPay\PSE\Struct\CreateTransactionResponse;
use PlacetoPay\PSE\Struct\GetBankListResponse;
use PlacetoPay\PSE\Struct\GetTransactionInformationResponse;
use PlacetoPay\PSE\Struct\Person;
use PlacetoPay\PSE\Struct\PSETransactionRequest;
use PlacetoPay\PSE\Struct\PSETransactionResponse;
use PlacetoPay\PSE\Struct\TransactionInformation;

class ClientTest extends TestCase
{
    /**
     * @return Client
     */
    public function testInstance()
    {
        $client = new Client('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
        $this->assertInstanceOf(\SoapClient::class, $client);

        return $client;
    }

    /**
     * @depends testInstance
     * @param Client $client
     * @return ArrayOfBank
     */
    public function testGetBankListMethodResponse(Client $client)
    {
        $response = $client->getBankList();
        $this->assertInstanceOf(GetBankListResponse::class, $response);

        $result = $response->getGetBankListResult();
        $this->assertInstanceOf(ArrayOfBank::class, $result);

        return $result;
    }

    /**
     * @depends testInstance
     * @depends testGetBankListMethodResponse
     * @param Client $client
     * @param ArrayOfBank $bankList
     * @return CreateTransactionResponse
     */
    public function testCreateTransactionMethodResponse(Client $client, ArrayOfBank $bankList)
    {
        $bank = $bankList->current();

        $payer = new Person();
        $payer->setDocumentType('CC');
        $payer->setDocument('123456789');
        $payer->setFirstName('Foo');
        $payer->setLastName('Bar');
        $payer->setCompany('PlacetoPay');
        $payer->setEmailAddress('info@placetopay.com');
        $payer->setAddress('Calle 53 No. 45 – 112 OF. 1901');
        $payer->setCity('Medellín');
        $payer->setProvince('Antioquia');
        $payer->setCountry('Colombia');
        $payer->setPhone('+57 (4) 444 2310');
        $payer->setMobile('+57 (4) 444 2310');

        $request = new PSETransactionRequest();
        $request->setBankCode($bank->getBankCode());
        $request->setBankInterface(Bank::PERSONAL_INTERFACE);
        $request->setReturnURL('https://www.placetopay.com');
        $request->setReference(md5('reference'));
        $request->setDescription('Description of transaction');
        $request->setLanguage('ES');
        $request->setCurrency('COP');
        $request->setTotalAmount(123456);
        $request->setTaxAmount(0);
        $request->setDevolutionBase(0);
        $request->setTipAmount(0);
        $request->setPayer($payer);
        $request->setIpAddress('127.0.0.1');

        $response = $client->createTransaction($request);
        $this->assertInstanceOf(CreateTransactionResponse::class, $response);

        $result = $response->getCreateTransactionResult();
        $this->assertInstanceOf(PSETransactionResponse::class, $result);

        return $result;
    }

    /**
     * @depends testInstance
     * @depends testCreateTransactionMethodResponse
     * @param Client $client
     * @param PSETransactionResponse $transaction
     */
    public function testGetTransactionInformationMethodResponse(Client $client, PSETransactionResponse $transaction)
    {
        $response = $client->getTransactionInformation($transaction->getTransactionID());
        $this->assertInstanceOf(GetTransactionInformationResponse::class, $response);

        $result = $response->getGetTransactionInformationResult();
        $this->assertInstanceOf(TransactionInformation::class, $result);
    }
}
