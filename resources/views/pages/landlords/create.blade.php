@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center fw-bolder">
                    <h2>Add New Landlord</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('landlords.store') }}">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="telephone">Telephone</label>
                            <input class="form-control" type="tel" name="telephone" id="telephone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Landlord</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

