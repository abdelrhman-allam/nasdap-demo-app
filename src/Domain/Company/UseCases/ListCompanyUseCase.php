<?php

namespace src\Domain\company\UseCases;

use src\Domain\company\Repositories\ICompanyRepository;

class ListCompanyUseCase
{
    public function __construct(private ICompanyRepository $companyRepository)
    {
    }

    public function execute()
    {
        return $this->companyRepository->list();
    }
}
