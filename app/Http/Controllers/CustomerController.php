<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('Customers.index', compact('customers'));
    }


    public function create(Request $request)
    {
        $customers = Customer::all();

        return view('Customers.create', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create($request->all());

        return redirect()->route('customers.index');
    }  
    

    public function show(Customer $customer)
    {
        if(!$customer=Customer::find($customer->id)){
            return redirect()->route('customers.index');
        }
        
        return view('Customers.show',[
            'customer' => $customer
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('Customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()
        ->route('customers.index')
        ->with('mensagem', 'Atualizado com sucesso!');
    }


    public function destroy(Customer $customer)
    {
      DB::table('customers')->where('id', $customer->id)->delete();
      return redirect()
      ->route('customers.index')
      ->with('aviso', 'Customer deleted successfully');
    }
}


