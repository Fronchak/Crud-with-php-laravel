@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <header>
        <h1>All employees already register</h1>
        <p>
            <a href="{{ route('employees.create') }}">Click here</a>
            to add a new employee
        </p>
    </header>
    @foreach($employees as $employee)
        <div >
            <h3>{{ $employee->firstName }} {{ $employee->lastName }}</h3>
            <h5><span class="fw-bold">Profession: </span>{{ $employee->profession->name }}</h5>
            <div>
                <a class="btn btn-primary" href="{{ route('employees.show', $employee->id) }}">See more</a>
                <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
            </div>
            <hr />
        </div>
    @endforeach
</div>
@endsection
