@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <h1 class="text-center mb-3">Fill the form to add a new employee</h1>
    @component("employees.components.form", [
        "isUpdate" => false,
        "errors" => $errors,
        "firstName" => old("firstName"),
        "lastName" => old("lastName"),
        "profession_id" => old("profession_id"),
        "professions" => $professions
    ])
    @endcomponent
</div>
@endsection
