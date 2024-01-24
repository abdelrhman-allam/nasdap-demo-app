<?php


namespace src\Domain\Services;

class CompanyService
{

    protected $companyRepository;
    protected $financialApiService;

    public function __construct($companyRepository, $financialApiService)
    {
        $this->companyRepository = $companyRepository;
        $this->financialApiService = $financialApiService;
    }



    public function createCompany($name, $logo, $description, $address){
        $company = new Company($name, $logo, $description, $address);
        $this->companyRepository->createCompany($company);

        return $company;
    }

    public function updateCompany($id, $name, $logo, $description, $address){
        $company = new Company($name, $logo, $description, $address);
        $this->companyRepository->updateCompany($id, $company);

        return $company;

    }

    public function deleteCompany($id){
        $this->companyRepository->deleteCompany($id);
    }

    public function getCompanyById($id){
        $this->companyRepository->getCompanyById($id);
    }

    public function getAllCompanies($limit, $offset){
        $this->companyRepository->getAllCompanies($limit, $offset);
    }

    public function getCompanyByName($name){
        $this->companyRepository->getCompanyByName($name);
    }

}
