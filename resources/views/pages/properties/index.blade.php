@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header text-center fw-bolder">
    <h1>PROPERTIES</h1>
</div>

<div class="d-flex justify-content-between align-items-center p-3">
    <!-- Add Property Button -->
    <a href="{{ route('properties.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Property
    </a>

    <!-- List All Properties Button -->
    <a href="{{ route('properties.index') }}" class="btn btn-info">
        <i class="fas fa-plust"></i> List All Properties
    </a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Reference Number</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->reference_number }}</td>
                    <td>{{ $property->owner }}</td>
                    <td>
                        <!-- Edit Property Icon -->
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Property Icon -->
                        <form action="{{ route('properties.delete', $property->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this property?');">
                                <i class="fas fa-trash"></i> Delete

                                
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection()