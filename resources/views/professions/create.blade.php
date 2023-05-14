@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1 class="text-center">Fill the form to add a new profession</h1>
    @component("professions.components.form", [
        "isUpdate" => false,
        "errors" => $errors,
        "name" => old("name"),
    ])
    @endcomponent
</div>
@endsection
