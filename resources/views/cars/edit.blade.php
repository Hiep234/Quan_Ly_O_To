@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Car</h2>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="registration_number" class="form-label">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $car->registration_number }}" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ $car->brand }}" required>
        </div>

        <div class="mb-3">
            <label for="owner_id" class="form-label">Owner</label>
            <select name="owner_id" id="owner_id" class="form-select" required>
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}" {{ $car->owner_id == $owner->id ? 'selected' : '' }}>
                        {{ $owner->name }} {{ $owner->surname }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
