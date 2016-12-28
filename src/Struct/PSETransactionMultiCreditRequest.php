<?php

namespace PlacetoPay\PSE\Struct;

class PSETransactionMultiCreditRequest extends PSETransactionRequest
{
    /**
     * @var ArrayOfCreditConcept
     */
    private $credits;

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
}
