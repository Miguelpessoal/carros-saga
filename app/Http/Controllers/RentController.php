<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Rent;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::all();

        return view('Rents.index', compact('rents'));
    }

    public function create(Car $car)
    {
        $customers = Customer::all();

        return view('Rents.create', compact('customers', 'car'));
    }

    public function store(StoreRentRequest $request, Car $car)
    {
        $formData = $request->validated();

        $formData['car_id'] = $car->id;

        $formData['finished'] = $request->has('finished');

        Rent::create($formData);

        return redirect()->route('cars.index');
    }

    public function edit(Rent $rent)
    {
        return view('Rents.edit', compact('rent'));
    }

    public function update(UpdateRentRequest $request, Rent $rent)
    {
        $formData = $request->validated();

        $formData['finished'] = $request->has('finished');

        $rent->update($formData);
        return redirect()
            ->route('rents.index')
            ->with('mensagem', 'Atualizado com sucesso!');
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return redirect()
            ->route('cars.index')
            ->with('aviso', 'Aluguel encerrado com sucesso!');
    }
}
