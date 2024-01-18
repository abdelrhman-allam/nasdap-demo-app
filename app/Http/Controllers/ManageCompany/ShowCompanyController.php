<?php

namespace App\Http\Controllers\ManageCompany;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company;

class ShowCompanyController extends Controller
{

    public function __construct(public ShowCompanyUseCase $showCompanyUseCase)
    {
    }

    public function __invoke(ShowCompanyRequest $request, $id)
    {
        $company = $this->showCompanyUseCase->execute($id);
        return view('manageCompany.show', compact('company'));
    }

}
