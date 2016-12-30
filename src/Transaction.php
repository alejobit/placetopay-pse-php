<?php

namespace PlacetoPay\PSE;

use PlacetoPay\PSE\Struct\Attribute;
use PlacetoPay\PSE\Struct\CreditConcept;
use PlacetoPay\PSE\Struct\Person;
use PlacetoPay\PSE\Struct\PSETransactionMultiCreditRequest;
use PlacetoPay\PSE\Struct\PSETransactionRequest;
use PlacetoPay\PSE\Struct\PSETransactionResponse;

/**
 * @method setBankCode($bankCode)
 * @method setBankInterface($bankInterface)
 * @method setReturnURL($returnUrl);
 * @method setReference($reference)
 * @method setDescription($description)
 * @method setLanguage($language)
 * @method setCurrency($currency)
 * @method setTotalAmount($totalAmount)
 * @method setTaxAmount($taxAmount)
 * @method setDevolutionBase($devolutionBase)
 * @method setTipAmount($tipAmount)
 * @method setIpAddress($ipAddress)
 */
class Transaction
{
    /**
     * @var PSETransactionRequest|PSETransactionMultiCreditRequest
     */
    private $request;

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client, $multiCredit = false)
    {
        $this->client = $client;

        if ($multiCredit) {
            $this->request = new PSETransactionMultiCreditRequest();
        } else {
            $this->request = new PSETransactionRequest();
        }
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setPayer(array $data)
    {
        $this->request->setPayer($this->createPerson($data));

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setBuyer(array $data)
    {
        $this->request->setBuyer($this->createPerson($data));

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setShipping(array $data)
    {
        $this->request->setShipping($this->createPerson($data));

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function addAdditionalData($name, $value)
    {
        $this->request->addAdditionalData(new Attribute($name, $value));

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function addCreditConcept(array $data)
    {
        $creditConcept = new CreditConcept();

        foreach ($data as $property => $value) {
            $method = 'set'.ucfirst($property);

            if (method_exists($creditConcept, $method)) {
                $creditConcept->$method($value);
            }
        }

        $this->request->addCreditConcept($creditConcept);

        return $this;
    }

    /**
     * @return PSETransactionResponse
     */
    public function send()
    {
        if ($this->request instanceof PSETransactionMultiCreditRequest) {
            $response = $this->client->createTransactionMultiCredit($this->request);
            return $response->getCreateTransactionMultiCreditResult();
        } else {
            $response = $this->client->createTransaction($this->request);
            return $response->getCreateTransactionResult();
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return $this
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->request, $name)) {
            call_user_func_array(array($this->request, $name), $arguments);
        } else {
            throw new \Exception(sprintf('Call to undefined method %s::%s()', self::class, $name));
        }

        return $this;
    }

    /**
     * @param array $data
     * @return Person
     */
    private function createPerson(array $data)
    {
        $person = new Person();

        foreach ($data as $property => $value) {
            $method = 'set'.ucfirst($property);

            if (method_exists($person, $method)) {
                $person->$method($value);
            }
        }

        return $person;
    }
}
