<?php

namespace App\Http\Controllers\ManageCompany;

use App\Models\Company;
use Illuminate\Http\Request;

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
