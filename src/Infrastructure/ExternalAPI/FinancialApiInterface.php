<?php

namespace src\Infrastructure\ExternalAPI;

use src\Infrastructure\ExternalAPI\FinanicalStateResponse;

interface FinancialApiInterface
{
    public function getFinancialState(string $name): FinancialStateResponse;
}
