@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <div class="row align-items-center mb-3">
        <div class="col-12 col-md-6 text-center mb-3 mb-md-0">
            <img
                src="{{ env('APP_URL') }}:8000/storage/{{ $employee->photo }}"
                alt="Employee"
                class="img-fluid rounded-img"
            />
        </div>
        <div class="col-12 col-md-6 text-center text-md-start">
            <h1>{{ $employee->firstName }} {{ $employee->lastName }}</h1>
            <h3>Profession: {{ $employee->profession->name }}</h3>
            <div class="text-center text-md-start">
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
    </div>



</div>
@endsection
