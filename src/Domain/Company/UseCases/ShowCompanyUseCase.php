<?php

namespace src\Domain\company\UseCases;

use src\Domain\Company\ValueObjects\CompanyId;
use src\Application\Company\Requests\GetCompanyByIdRequest;
use src\Domain\Company\Repository\CompanyRepositoryInterface;

class ListCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $companyRepository)
    {
    }

    public function execute(GetCompanyByIdRequest $request)
    {
        return $this->companyRepository->getCompanyById(new CompanyId($request->id));
    }
}
