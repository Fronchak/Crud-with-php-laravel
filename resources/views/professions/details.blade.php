@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1>Profession: {{ $profession->name }}</h1>
    <h3>
        <span class="fw-bold">Number of employees: </span>
        {{ $profession->employees->count() }}
    </h3>
    <div>
        <a class="btn btn-primary" href="{{ route('professions.edit', $profession->id) }}">Edit</a>
        <form
            class="d-inline"
            method="POST"
            action="{{ route('professions.destroy', $profession->id) }}"
        >
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    @unless($profession->employees->count() == 0)
        <h3 class="mt-3">List of employees</h3>
        @foreach($profession->employees as $employee)
            <div>
                <h4>
                    <a href="{{ route('employees.show', $employee->id) }}">
                        {{ $employee->name() }}
                    </a>
                </h4>
                <hr />
            </div>
        @endforeach
    @endif
</div>
@endsection
