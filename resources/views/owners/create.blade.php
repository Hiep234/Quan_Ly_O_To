@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Owner</h2>

    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" name="surname" id="surname" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
