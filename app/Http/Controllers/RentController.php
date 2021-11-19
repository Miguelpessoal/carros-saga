<?php

namespace App\Http\Controllers;

use App\Models\Car;

class RentController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('Rents.index', compact('cars'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
       //
    } 

    public function destroy($id)
    {
       //
    }
}
