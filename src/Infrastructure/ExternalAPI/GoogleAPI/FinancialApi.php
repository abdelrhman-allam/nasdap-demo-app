<?php

namespace src\Infrastructure\ExternalAPI\GoogleAPI;

use src\Infrastructure\ExternalAPI\FinancialApiInterface;
use src\Infrastructure\ExternalAPI\FinancialStateResponse;

class FinancialApi implements FinancialApiInterface
{
    public function getFinancialState(string $name): FinancialStateResponse
    {
        return new FinancialStateResponse();
    }
}
