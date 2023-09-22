<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Landlord;


class PropertyController extends Controller
{
    
    public function index()
    {
        $properties = Property::all();
        return view('pages.properties.index', compact('properties') );
    }

    public function create()
    {

        $landlords = Landlord::all();
        return view('pages.properties.create', compact('landlords'));



        // return view('pages.properties.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'reference_number' => 'required|string|unique:properties',
            'owner' => 'required|string|max:255',
        ]);

        Property::create($validatedData);

        return redirect()->route('properties.index');
    }

    public function edit(Property $property)
    {
        return view('pages.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'reference_number' => 'required|string|unique:properties,reference_number,' . $property->id,
            'owner' => 'required|string|max:255',
        ]);

        $property->update($validatedData);

        return redirect()->route('properties.index');
    }

    public function delete(Property $property)
    {
        $properties = property::find($property);
        $property->delete();
        
        session()->flash('success', 'Property information updated successfully');

        return redirect()->route('properties.index');
    }
}
