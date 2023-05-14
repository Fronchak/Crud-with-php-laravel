@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1>Profession: {{ $profession->name }}</h1>
    <h3><span class="fw-bold">Number of employees: </span>10</h3>
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
</div>
@endsection
