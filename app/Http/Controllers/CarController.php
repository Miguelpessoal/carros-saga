<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Document;
use App\Services\UploadFileService;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $customers = Customer::all();
        return view('Cars.index', compact('cars', 'customers'));
    }


    public function create()
    {
        return view('Cars.create');
    }

    public function store(StoreCarRequest $request, UploadFileService $uploadFileService)
    {

        foreach ($request->file('images') as $image) {
            $filePath = $uploadFileService->upload($image, 'cars');

            if (!$filePath) {
                return redirect()
                    ->route('cars.create')
                    ->with('aviso', 'Extensão inválida (apenas: jpg, jpeg, png, gif, pdf, docx, xls).');
            }

            $documents[] = new Document([
                'path' => $uploadFileService->upload($image, 'cars'),
                'title' => $image->getClientOriginalName(),
                'document_type_id' => 2
            ]);
        }

        $car = Car::create($request->validated());

        $car->documents()->saveMany($documents ?? []);

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


    public function update(UpdateCarRequest $request, Car $car, UploadFileService $uploadFileService)
    {
        $formData = $request->validated();

        $images = $request->file('images') ?? [];

        foreach ($images as $image) {
            $filePath = $uploadFileService->upload($image, 'cars');

            if (!$filePath) {
                return redirect()
                    ->route('cars.create')
                    ->with('aviso', 'Extensão inválida (apenas: jpg, jpeg, png, gif, pdf, docx, xls).');
            }

            $documents[] = new Document([
                'path' => $uploadFileService->upload($image, 'cars'),
                'title' => $image->getClientOriginalName(),
                'document_type_id' => 2
            ]);
        }

        $car->documents()->saveMany($documents ?? []);

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
