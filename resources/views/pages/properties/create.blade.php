@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center fw-bolder">
        <h1>Create a New Property</h1>
        </div>
        <form action="{{ route('properties.store') }}" method="POST">
            @csrf
            <div class="card-header text-left">
                <label for="landlord_id">Landlord:</label>
                <select name="landlord_id" id="landlord_id" class="form-control">
                    <option value="">Select Landlord</option>
                    @foreach ($landlords as $landlord)
                        <option value="{{ $landlord->id }}">{{ $landlord->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="name">Property Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="reference_number">Reference Number:</label>
                        <input class="form-control" type="text" name="reference_number" id="reference_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="owner">Owner:</label>
                        <input class="form-control" type="text" name="owner" id="owner" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="price">Price:</label>
                        <input class="form-control" type="text" name="price" id="price" class="form-control" required>
                    </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Property</button>
        </form>
    </div>
@endsection
