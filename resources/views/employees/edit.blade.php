@extends("layouts.root")
@section("content")
<div class="container" id="main-container">
    <header class="text-center mb-3">
        <h1>{{ $employee->firstName }} {{ $employee->lastName }}</h1>
        <h3>Fill the form to update the employee</h3>
    </header>
    @component("employees.components.form", [
        "isUpdate" => true,
        "errors" => $errors,
        "firstName" => empty(old("firstName")) ? $employee->firstName : old("firstName"),
        "lastName" => empty(old("lastName")) ? $employee->lastName : old("lastName"),
        "profession_id" => (old("profession_id") === null) ? $employee->profession_id : old("profession_id"),
        "professions" => $professions,
        "employee" => $employee
    ])
    @endcomponent
</div>
@endsection
