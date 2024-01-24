<?php

namespace src\Infrastructure\Persistence\Connection;

use Ramsey\Uuid\Uuid;
use src\Domain\Company\Entity\Company;
use Illuminate\Database\ConnectionInterface;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\Repository\CompanyRepositoryInterface;

class DbConnectionCompanyRepository implements CompanyRepositoryInterface
{
    private $table;

    public function __construct(private ConnectionInterface $connection)
    {
        $this->table =  $this->connection->table('companies');
    }


    public function getNextIdentity(): CompanyId
    {
        return CompanyId::fromString(Uuid::uuid4()->toString());
    }

    public function create(Company $company): CompanyId
    {
        $this->table->insert([
            'id' => "{$company->getId()}",
            'name' => "{$company->getName()}",
            'address' => "{$company->getAddress()}",
            'description' => "{$company->getDescription()}",
            'logo' => "{$company->getLogo()}",
            'user_id' => "{$company->getUserId()}",
        ]);

        #$id = $this->connection->pdo->lastInsertId();
        return CompanyId::fromString($company->getId());
    }


    public function getAllCompanies(): array
    {
        $companies  = $this->table->get();
        if ($companies->isEmpty()) {
            return [];
        }

        $array =  $companies->map(function ($company) {
            return $this->makeCompany($company)->toArray();
        });

        return $array->toArray();
    }

    public function getCompanyById(CompanyId $id): ?Company
    {
        $company = $this->table->where('id', $id->getValue())->first();

        return $this->makeCompany($company);
    }

    public function update(CompanyId $id, Company $company)
    {
        $this->table->where('id', $id->getValue())->update(
            $company->toArray()
        );
    }

    private function makeCompany($company): ?Company
    {
        return Company::fromArray([
            'id' => $company->id,
            'name' => $company->name,
            'address' => $company->address,
            'description' => $company->description,
            'logo' => $company->logo,
            'user_id' => $company->user_id
        ]);
    }
}
