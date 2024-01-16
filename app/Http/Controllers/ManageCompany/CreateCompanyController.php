<?php

namespace App\Http\Controllers\ManageCompany;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(public CreateCompanyUseCase $createCompanyUserCase)
    {
    }

    public function __invoke(CreateCompanyRequest $request)
    {
        $this->createCompanyCase->execute($request);
        return redirect()->route('manageCompany.index');
    }

}
