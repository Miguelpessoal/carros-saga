<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();
        return view('Company.index', compact('companies'));
    }


    public function create(Request $request)
    {
        $companies = Company::all();

        return view('Company.create', compact('companies'));
    }

    public function store(Request $request)
    {
        Company::create($request->all());
        return redirect()->route('companies.index');  
    }

    public function show(Company $company)
    {
        return view('Company.show');
    }

    public function edit(Company $company)
    {
        return view('Company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // $input = $request->all();
        $company->update($request->all());
        return redirect()
        ->route('companies.index')
        ->with('mensagem', 'Atualizado com sucesso!');
    }

    public function destroy(Company $company)
    {
        //
    }
}
