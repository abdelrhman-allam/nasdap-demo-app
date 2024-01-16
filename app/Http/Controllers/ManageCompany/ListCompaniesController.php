<?php

namespace App\Http\Controllers\ManageCompany;

use App\Models\Company;
use Illuminate\Http\Request;

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
