<?php

namespace src\Infrastructure\Persistence\QueryBuilder;

use Ramsey\Uuid\Uuid;
use src\Domain\Company\Entity\Company;
use src\Domain\Company\Repository\CompanyRepositoryInterface;
use src\Domain\Company\ValueObjects\CompanyId;
use src\Domain\Company\ValueObjects\CompanyName;

class QueryBuilderCompanyRepository implements CompanyRepositoryInterface
{
    public function __construct(protected Company $company)
    {
    }


    public function getNextIdentity(): CompnayId
    {
        return CompanyId::fromString(Uuid::uuid4()->toString());
    }


    public function create($name, $logo, $description, $address)
    {
    }

    public function updateCompany($id, $name, $logo, $description, $address)
    {
        $company = Company::find($id);
        $company->name = $name;
        $company->logo = $logo;
        $company->description = $description;
        $company->address = $address;
        $company->save();
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);
        $company->delete();
    }

    public function getCompanyById($id)
    {
        $company = Company::find($id);

        return $this . makeCompany($company);
    }

    public function getCompanyName(CompanyName $name): Company
    {
        return $this->makeCompany($this->findByName($name->getValue()));
    }

    public function getAllCompanies(): array
    {
        $companies = $this->all();

        $result = $companies->map(function ($company) {
            return $this->makeCompany($company);
        });

        return $result->to_array();
    }


    private function makeCompany($company)
    {
        return new Company(
            $company->id,
            $company->name,
            $company->logo,
            $company->description,
            $company->address
        );
    }
}
