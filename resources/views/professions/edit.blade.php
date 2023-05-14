@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <header class="text-center mb-3">
        <h1>Profession: {{ $profession->name }}</h1>
        <p>Fill the form to update the profession</p>
    </header>
    @component("professions.components.form", [
        "isUpdate" => true,
        "errors" => $errors,
        "name" => empty(old("name")) ? $profession->name : old("name"),
        "profession" => $profession
    ])
    @endcomponent
</div>
@endsection
