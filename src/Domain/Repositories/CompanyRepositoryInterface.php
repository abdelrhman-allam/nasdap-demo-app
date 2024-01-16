<?php

declare(strict_types=1);

namespace src\Domain\Company\Repository;

use src\Domain\Company\Entity\Company;

interface CompanyRepositoryInterface
{
    public function getCompanyById(int $id): Company;

    public function getCompanyByEmail(string $email): Company;

    public function save(Company $company): void;

    public function update(Company $company): void;

    public function delete(Company $company): void;

    public function getAllCompanies(): array;

    public function getCompanyByCompanyName(string $name): Company;

}
