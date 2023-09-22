<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landlord;

class LandlordController extends Controller
{
    public function index()
    {
        $landlords = Landlord::all();
    return view('pages.landlords.index', compact('landlords'));
    }

    public function create()
    {
        return view('pages.landlords.create');

        
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required|string|max:255',
            'telephone'=>'required|string|max:20',
        ]);

        Landlord::create($validateData);

        return redirect()->route('landlords.index')-> with('success', 'Landlord created succefully');
    }

    public function edit(Landlord $landlord)
    {
        $landlords = Landlord::find($landlord);
        return view('pages.landlords.edit', compact('landlord'));


    }

    public function update(Request $request, Landlord $landlord)
    {
        // Validate the incoming request data
    $validateData = $request->validate([
        'name' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
    ]);

    // Update the landlord's details with the new data
    $landlord->update($validateData);


    // dd($landlord);


    session()->flash('success', 'Landlord information updated successfully');

    return redirect()->route('landlords.index');
    }

    public function delete(Landlord $landlord)
    {
        $landlords = Landlord::find($landlord);
        $landlord->delete();

        session()->flash('success', 'Landlord information deleted successfully');

        return redirect()->route('landlords.index');
    }
}
