<?php

declare(strict_types=1);

namespace src\Domain\Company\UseCases;

use src\Domain\Company\Entity\Company;
use src\Domain\User\ValueObjects\UserId;
use src\Domain\Company\ValueObjects\Logo;
use src\Domain\Company\ValueObjects\Address;
use src\Domain\Company\ValueObjects\CompanyName;
use src\Domain\Company\ValueObjects\Description;
use src\Application\Company\Requests\CreateCompanyRequest;
use src\Domain\Company\Repository\CompanyRepositoryInterface;
use src\Domain\Company\ValueObjects\CompanyId;

class CreateCompanyUseCase
{
    public function __construct(private CompanyRepositoryInterface $companyRepository)
    {
    }

    public function execute(CreateCompanyRequest $request): CompanyId
    {

        $company = new Company(
            $this->companyRepository->getNextIdentity(),
            new CompanyName($request->name),
            new Logo($request->logo),
            new Description($request->description),
            new Address($request->address),
            new UserId($request->userId)
        );

        return $this->companyRepository->create($company);
    }
}
