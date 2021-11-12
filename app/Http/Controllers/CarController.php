<?php

namespace App\Http\Controllers;

use App\Models\Car;

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

    public function store()
    {
        //
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

    public function destroy()
    {
        //
    }
}