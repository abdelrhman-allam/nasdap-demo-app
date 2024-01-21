<?php

declare(strict_types=1);

namespace src\Domain\Company\Repository;

use src\Domain\Entities\Company;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\ValueObjects\CompanyName;

interface CompanyRepositoryInterface
{
    public function getNextIdentity();
    public function getCompanyById(CompanyId $id): Company;
    public function create(Company $company): void;
    public function getAllCompanies(): array;
    public function getCompanyName(CompanyName $name): Company;
}
