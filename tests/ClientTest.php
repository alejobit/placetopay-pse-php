<?php

namespace PlacetoPay\PSE\Test;

use PHPUnit\Framework\TestCase;
use PlacetoPay\PSE\Client;
use PlacetoPay\PSE\Struct\GetBankListResponse;

class ClientTest extends TestCase
{
    public function testInstance()
    {
        $client = new Client('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
        $this->assertInstanceOf(\SoapClient::class, $client);

        return $client;
    }

    /**
     * @depends testInstance
     * @param Client $client
     */
    public function testGetBankListMethodResponse(Client $client)
    {
        $this->assertInstanceOf(GetBankListResponse::class, $client->getBankList());
    }
}
