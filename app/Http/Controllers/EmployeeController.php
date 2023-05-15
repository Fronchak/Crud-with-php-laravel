<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    private Employee $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employee->with("profession")->get();
        return view("employees.index", ["employees" => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professions = Profession::all();
        return view("employees.create", ["professions" => $professions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->employee->rules(), $this->employee->messages());

        $photo = $request->file('photo');
        $photoUrn = $photo->store('imgs/employees', 'public');

        $employee = new Employee();
        $employee->fill($request->all());
        $employee->photo = $photoUrn;
        $employee->save();
        $_SESSION["msg"] = "Employee register with success";
        $_SESSION["msg_type"] = "success";
        return redirect()->route("employees.show", $employee->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = $this->employee->with("profession")->find($id);
        if($employee === null) {
            $_SESSION["msg"] = "Employee not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("employees.index");
        }
        return view("employees.details", ["employee" => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = $this->employee->find($id);
        if($employee === null) {
            $_SESSION["msg"] = "Employee not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("employees.index");
        }
        $professions = Profession::all();
        return view("employees.edit", [
            "employee" => $employee,
            "professions" => $professions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = $this->employee->find($id);
        if($employee === null) {
            $_SESSION["msg"] = "Employee not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("employees.index");
        }
        $parameters = $request->all();
        $rules = $employee->rules();
        if(!array_key_exists('photo', $parameters)) {
            unset($rules['photo']);
        }
        $request->validate($rules, $employee->messages());

        $oldPhoto = $employee->photo;
        $photo = $request->file('photo');
        $photoUrn = null;
        if($photo !== null) {
            $photoUrn = $photo->store('imgs/employees', 'public');
        }

        $employee->fill($request->all());
        if($photoUrn !== null) {
            $employee->photo = $photoUrn;
        }
        $employee->update();
        $_SESSION["msg"] = "Employee updated with success";
        $_SESSION["msg_type"] = "success";
        if($photoUrn !== null) {
            Storage::disk('public')->delete($oldPhoto);
        }
        return redirect()->route("employees.show", $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
