<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Document;

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
            $originalNameFile = $request->image->getClientOriginalName();
            $imagePath = $request->image->store('cars','public');
            
            Document::create([
                'car_id' => $car->id,
                'path' => DIRECTORY_SEPARATOR .'storage'.DIRECTORY_SEPARATOR.$imagePath,
                'title' => $originalNameFile,
                'document_type_id' => 2
            ]);
        }


        return redirect()->route('cars.index');
    }

    public function show(Car $car)
    {
        $documents = $car->documents;
        return view('Cars.show', compact('car', 'documents'));
    }

    public function edit(Car $car)
    {
        return view('Cars.edit', compact('car'));
    }
   

    public function update(UpdateCarRequest $request, Car $car)
    {
        $formData = $request->validated();
        
        $formData['safe'] = $request->has('safe');
        
        $car->update($formData);
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