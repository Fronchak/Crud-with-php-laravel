@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <header>
        <h1>All professions already register</h1>
        <p>
            <a href="{{ route('professions.create') }}">Click here</a>
            to add a new profession
        </p>
        @foreach($professions as $profession)
            <div >
                <h3>{{ $profession->name }}</h3>
                <div>
                    <a class="btn btn-primary" href="{{ route('professions.show', $profession->id) }}">See more</a>
                    <a class="btn btn-primary" href="{{ route('professions.edit', $profession->id) }}">Edit</a>
                </div>
                <hr />
            </div>
        @endforeach
    </header>
</div>
@endsection
