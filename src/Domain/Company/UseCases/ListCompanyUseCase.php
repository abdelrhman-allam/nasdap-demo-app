<?php

namespace src\Domain\company\UseCases;


use src\Domain\Company\Repository\CompanyRepositoryInterface;

class ListCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $companyRepository)
    {
    }

    public function execute()
    {
        return $this->companyRepository->getAllCompanies();
    }
}
