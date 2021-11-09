<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return view('Company.index');
    }


    public function create(Request $request)
    {
        $companies = Company::all();

        return view('Company.create', compact('companies'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        //
    }

    public function destroy(Company $company)
    {
        //
    }
}
