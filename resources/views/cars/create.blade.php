@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Car</h2>

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="registration_number" class="form-label">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="owner_id" class="form-label">Owner</label>
            <select name="owner_id" id="owner_id" class="form-select" required>
                <option value="">Select owner</option>
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
