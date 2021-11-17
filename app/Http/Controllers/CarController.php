<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('Cars.index', compact('cars'));
    }


    public function create()
    {
        return view('Cars.create');
    }

    public function store(StoreCarRequest $request)
    {
        $formData = $request->validated();
        
        $formData['safe'] = $request->has('safe');
        
        $car = Car::create($formData);

        if ($request->hasFIle('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('cars');
          
           Document::create([
               'car_id' => $car->id,
               'path' => $imagePath,
               'title' => $request->image->getClientOriginalName(),
               'type' => 2
           ]);
        }


        return redirect()->route('cars.index');
    }

    public function show()
    {
        return view('Cars.show');
    }

    public function edit(Car $car)
    {
        return view('Cars.edit', compact('car'));
    }
   

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());
        return redirect()
        ->route('cars.index')
        ->with('mensagem', 'Atualizado com sucesso!');
    }

    public function destroy(Car $car)
    {
     $car->delete();
        return redirect()
        ->route('cars.index')
        ->with('aviso', 'Carro removido com sucesso!');
    }
}