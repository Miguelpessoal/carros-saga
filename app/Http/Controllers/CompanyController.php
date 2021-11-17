<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        
        return view('Company.index', compact('companies'));
    }


    public function create()
    {
        $companies = Company::all();

        return view('Company.create', compact('companies'));
    }

    public function store(StoreCompanyRequest $request)
    {
        Company::create($request->validated());
        
        return redirect()->route('companies.index');  
    }

    public function show(Company $company)
    {
        if(!$company=Company::find($company->id)){
            return redirect()->route('companies.index');
        }
        
        return view('Company.show',[
            'company' => $company
        ]);
    }

    public function edit(Company $company)
    {
        return view('Company.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // $input = $request->all();
        $company->update($request->all());
        return redirect()
        ->route('companies.index')
        ->with('mensagem', 'Atualizado com sucesso!');
    }

    public function destroy(Company $company)
    {
        DB::table('companies')->where('id', $company->id)->delete();
        return redirect()
        ->route('companies.index')
        ->with('aviso', 'Deletado com sucesso!');
    }
}
