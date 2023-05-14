@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1>{{ $employee->firstName }} {{ $employee->lastName }}</h1>
    <h3>Profession: {{ $employee->profession->name }}</h3>
    <div>
        <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
        <form
            class="d-inline"
            method="POST"
            action="{{ route('employees.destroy', $employee->id) }}"
        >
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
