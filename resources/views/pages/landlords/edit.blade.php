@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="card">
        <div class="card-header text-center fw-bolder">
        <h1>EDIT LANDLORD</h1>
    </div>
        <div class="card-body">   
            <form method="POST" action="{{ route('landlords.update', ['landlord' => $landlord->id]) }}">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->

                <!-- Landlord Name -->
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $landlord->name) }}">
                </div>

                <!-- Telephone -->
                <div class="form-group">
                    <label class="form-label"  for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $landlord->telephone) }}">
                </div>

                <!-- Other fields you want to edit (e.g., email, address, etc.) -->

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>     
    </div>
@endsection
