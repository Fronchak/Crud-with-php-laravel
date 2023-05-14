@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1>Profession: {{ $profession->name }}</h1>
    <p>Fill the form to update the profession</p>
    @component("professions.components.form", [
        "isUpdate" => true,
        "errors" => $errors,
        "name" => empty(old("name")) ? $profession->name : old("name"),
        "profession" => $profession
    ])
    @endcomponent
</div>
@endsection
