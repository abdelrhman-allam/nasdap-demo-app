<?php

namespace App\Http\Controllers\ManageCompany;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;

class CreateCompanyController extends Controller
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
