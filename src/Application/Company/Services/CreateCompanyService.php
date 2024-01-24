<?php

declare(strict_types=1);

namespace src\Application\Company\Services;

use src\Domain\Company\UseCases\CreateCompanyUseCase;
use src\Application\Company\Requests\CreateCompanyRequest;
use src\Domain\Company\Repository\CompanyRepositoryInterface;
use src\Domain\Company\Entity\Company;

class CreateCompanyService
{

    public function __construct(
        private CompanyRepositoryInterface $createCompanyRepository,
        private CreateCompanyUseCase $createCompanyUseCase
    ) {
    }

    public function execute(CreateCompanyRequest $request): Company
    {
        $companyId = $this->createCompanyUseCase->execute($request);
        return $this->createCompanyRepository->getCompanyById($companyId);
    }
}
