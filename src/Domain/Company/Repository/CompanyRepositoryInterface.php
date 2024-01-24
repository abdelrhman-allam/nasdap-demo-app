<?php

declare(strict_types=1);

namespace src\Domain\Company\Repository;

use src\Domain\Company\Entity\Company;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\ValueObjects\CompanyName;

interface CompanyRepositoryInterface
{
    public function getNextIdentity();
    public function getCompanyById(CompanyId $id): ?Company;
    public function create(Company $company): CompanyId;
    public function getAllCompanies(): array;
}
