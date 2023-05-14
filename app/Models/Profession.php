<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function rules() {
        return [
            "name" => "required|min:3|max:100|unique:professions,name," . $this->id
        ];
    }

    public function messages() {
        return [
            "required" => "The :attribute is required"
        ];
    }

    public function employees() {
        return $this->hasMany("App\Models\Employee", "profession_id", "id");
    }
}
