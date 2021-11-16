<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
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
        $cars = Car::all();
        
        return view('Cars.create', compact('cars'));
    }

    public function store(CarRequest $request)
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
        //
    }

    public function edit()
    {
        // 
    }

    public function update()
    {
        //
    }

    public function destroy(Car $car)
    {
        DB::table('cars')->where('id', $car->id)->delete();
        return redirect()
        ->route('cars.index')
        ->with('aviso', 'Carro removido com sucesso!');
    }
}