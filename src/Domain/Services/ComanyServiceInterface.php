<?php

namespace ser\Domain\Services;

interface CompanyServiceInterface
{
    public function createCompany($company);

    public function updateCompany($company);

    public function deleteCompany($company);

    public function getCompanyById($id);

    public function getCompanyByName($name);

    public function getAllCompanies($limit, $offset);


    public function getCompanies();

}


