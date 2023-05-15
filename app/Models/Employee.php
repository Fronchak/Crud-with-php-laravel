<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ["firstName", "lastName", "profession_id"];

    public function rules() {
        return [
            "firstName" => "required|min:2|max:50",
            "lastName" => "required|min:2|max:256",
            "photo" => "required|file|mimes:png,jpeg,jpg",
            "profession_id" => "required|exists:professions,id"
        ];
    }

    public function messages() {
        return [
            'required' => "The :attribute is required",
            'profession_id.required' => "The profession is required",
            'exists' => 'Profession not found',
            "photo.mines" => 'Photo should be a picture'
        ];
    }

    public function profession() {
        return $this->belongsTo("App\Models\Profession", "profession_id", "id");
    }

    public function name() {
        return $this->firstName . ' ' . $this->lastName;
    }
}
