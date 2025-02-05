<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brand = $request->input('brand');
        $owner_id = $request->input('owner_id');

        $cars = Car::with('owner')
            ->when($search, function ($query, $search) {
                return $query->where('registration_number', 'like', "%{$search}%");
            })
            ->when($brand, function ($query, $brand) {
                return $query->where('brand', 'like', "%{$brand}%");
            })
            ->when($owner_id, function ($query, $owner_id) {
                return $query->where('owner_id', $owner_id);
            })
            ->get();

        $owners = Owner::all();

        return view('cars.index', compact('cars', 'owners', 'search', 'brand', 'owner_id'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'registration_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
