@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header text-center fw-bolder">
        <h1>Edit Property</h1>
    </div>
        <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

            <form action="{{ route('properties.update', $property->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="body-card">
                    <label class="form-label" for="name">Property Name:</label>
                    <input class="form-control" type="text" name="name" id="name" class="form-control" value="{{ $property->name }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="reference_number">Reference Number:</label>
                    <input class="form-control" type="text" name="reference_number" id="reference_number" class="form-control" value="{{ $property->reference_number }}" required>
                </div>

                <div class="form-group">
                    <label  class="form-label" for="owner">Owner:</label>
                    <input class="form-control" type="text" name="owner" id="owner" class="form-control" value="{{ $property->owner }}" required>
                </div>
            

                <button type="submit" class="btn btn-primary">Update Property</button>
            </form>
        </div>
    </div>
@endsection



