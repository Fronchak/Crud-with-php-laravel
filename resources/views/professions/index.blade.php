@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <header>
        <h1>All professions already register</h1>
        <p>
            <a href="{{ route('professions.create') }}">Click here</a>
            to add a new profession
        </p>
    </header>
        @foreach($professions as $profession)
            <div >
                <h3>{{ $profession->name }}</h3>
                <p>
                <span class="fw-bold">Number of employees:</span>
                {{ $profession->employees->count() }}</p>
                <div>
                    <a class="btn btn-primary" href="{{ route('professions.show', $profession->id) }}">See more</a>
                    <a class="btn btn-primary" href="{{ route('professions.edit', $profession->id) }}">Edit</a>
                </div>
                <hr />
            </div>
        @endforeach
</div>
@endsection
