<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    private Profession $profession;

    public function __construct(Profession $profession) {
        $this->profession = $profession;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = $this->profession->all();
        return view("professions.index", [
            "professions" => $professions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("professions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->profession->rules(), $this->profession->messages());
        $profession = new Profession();
        $profession->fill($request->all());
        $profession->save();
        $_SESSION['msg'] = "Profession register with success";
        $_SESSION['msg_type'] = "success";
        return redirect()->route("professions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profession = $this->profession->find($id);
        if($profession === null) {
            $_SESSION["msg"] = "Profession not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("professions.index");
        }
        return view("professions.details", ["profession" => $profession]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profession = $this->profession->find($id);
        if($profession === null) {
            $_SESSION["msg"] = "Profession not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("professions.index");
        }
        return view("professions.edit", ["profession" => $profession]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profession = $this->profession->find($id);
        if($profession === null) {
            $_SESSION["msg"] = "Profession not found";
            $_SESSION["msg_type"] = "danger";
            return redirect()->route("professions.index");
        }
        $request->validate($profession->rules(), $profession->messages());
        $profession->update($request->all());
        $_SESSION['msg'] = "Profession updated with success";
        $_SESSION['msg_type'] = "success";
        return redirect()->route("professions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
