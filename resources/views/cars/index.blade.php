@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List of cars</h2>
    <br><br>

    <form action="{{ route('cars.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Registration number" value="{{ $search }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ $brand }}">
            </div>
            <div class="col-md-3">
                <select name="owner_id" class="form-select">
                    <option value="">Select owner</option>
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}" {{ $owner_id == $owner->id ? 'selected' : '' }}>
                            {{ $owner->name }} {{ $owner->surname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">Add</a>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Registration number</th>
                <th>Brand</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->registration_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
