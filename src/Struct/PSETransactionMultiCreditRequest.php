<?php

namespace PlacetoPay\PSE\Struct;

class PSETransactionMultiCreditRequest extends PSETransactionRequest
{
    /**
     * @var ArrayOfCreditConcept
     */
    private $credits;

    /**
     * @param ArrayOfCreditConcept $credits
     */
    public function __construct(ArrayOfCreditConcept $credits = null)
    {
        $this->credits = $credits ?: new ArrayOfCreditConcept();
        parent::__construct();
    }

    /**
     * @return ArrayOfCreditConcept
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param ArrayOfCreditConcept $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @param CreditConcept $creditConcept
     */
    public function addCreditConcept(CreditConcept $creditConcept)
    {
        $this->credits->addItem($creditConcept);
    }
}
