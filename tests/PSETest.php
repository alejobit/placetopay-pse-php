<?php

namespace PlacetoPay\PSE\Test;

use PHPUnit\Framework\TestCase;
use PlacetoPay\PSE\PSE;
use PlacetoPay\PSE\Struct\ArrayOfBank;
use PlacetoPay\PSE\Struct\Bank;
use PlacetoPay\PSE\Struct\PSETransactionResponse;
use PlacetoPay\PSE\Struct\TransactionInformation;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class PSETest extends TestCase
{
    /**
     * @var PSE
     */
    private $pse;

    protected function setUp()
    {
        $this->pse = new PSE('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
        $this->pse->setCacheAdapter(new FilesystemAdapter());
    }

    /**
     * @return ArrayOfBank
     */
    public function testGetBankListResponse()
    {
        $result = $this->pse->getBankList();
        $this->assertInstanceOf(ArrayOfBank::class, $result);

        return $result;
    }

    /**
     * @depends testGetBankListResponse
     * @param ArrayOfBank $bankList
     * @return PSETransactionResponse
     */
    public function testCreateTransactionResponse(ArrayOfBank $bankList)
    {
        $bank = $bankList->current();

        $transaction = $this->pse->createTransaction();
        $transaction->setBankCode($bank->getCode());
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
        $result = $transaction->send();

        return $result;
    }

    /**
     * @depends testCreateTransactionResponse
     * @param PSETransactionResponse $transaction
     */
    public function testGetTransactionInformationResponse(PSETransactionResponse $transaction)
    {
        $result = $this->pse->getTransactionInformation($transaction->getTransactionId());
        $this->assertInstanceOf(TransactionInformation::class, $result);
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
}
