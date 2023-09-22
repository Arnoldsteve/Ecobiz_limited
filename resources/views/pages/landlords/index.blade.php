@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif


<script>
    // Function to hide the success message
    function hideSuccessMessage() {
        $('alert.alert-success').fadeOut('slow');
    }

    // Automatically hide the success message after 3 seconds (adjust duration as needed)
    $(document).ready(function () {
        setTimeout(hideSuccessMessage, 3000); // 3000 milliseconds (3 seconds)
    });
</script>




<div class="card">
   
    <div class="card-header text-center fw-bolder">
    <h1>LANDLORDS</h1>
</div>

<div class="d-flex justify-content-between align-items-center p-3">
    <!-- Add Property Button -->
    <a href="{{ route('landlords.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Landlord
    </a>

    <!-- List All Properties Button -->
    <a href="{{ route('landlords.index') }}" class="btn btn-info">
        <i class="fas fa-plust"></i> List All Landlords
    </a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($landlords as $landlord)
            <tr>
                <td>{{ $landlord->name }}</td>
                <td>{{ $landlord->telephone }}</td>

                <td>
                    <a href="{{ route('landlords.edit', $landlord->id) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    <!-- Delete Form -->
                    <form action="{{ route('landlords.delete', $landlord->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this landlord?');">
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