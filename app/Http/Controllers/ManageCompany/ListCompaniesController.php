<?php

namespace App\Http\Controllers\ManageCompany;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company;

class ListCompaniesController extends Controller
{

    public function __construct(public ListCompanyUseCase $listCompanyUseCase)
    {
    }

    public function __invoke(Request $request)
    {
        $companies = $this->listCompanyUseCase->execute($request);
        return view('manageCompany.listCompanies', compact('companies'));
    }

}
