<?php
namespace src\Infrastructure\Persistence\Eloquent;
Class EloquentCompanyRepository implements ICompanyRepository
{
    public function __construct(Company $company)
    {
        $this->company = $company;
    }


    public function createCompany($name, $logo, $description, $address)
    {
        $company = new Company;
        $company->name = $name;
        $company->logo = $logo;
        $company->description = $description;
        $company->address = $address;
        $company->save();
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

    public function getCompany($id)
    {
        $company = Company::find($id);

        return $this.makeCompany($company);
    }

    public function getAllCompanies()
    {
        $companies = Company::all();

        $result = $companies->map(function($company) {
            return $this->makeCompany($company);
        });

        return $result;
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
