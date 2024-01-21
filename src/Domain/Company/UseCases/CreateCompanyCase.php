<?php

class CreateCompany
{
    public function __construct(ICompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;


    }

    public function execute(CreateCompanyRequest $request)
    {
        if(!$request->is_valid()){
          throw new InvalidRequestException($request->errors());
        }

        $company =  new Company($request->name, $request->logo, $request->description, $request->address);
        $this->companyRepository->save($company);

    }
}
