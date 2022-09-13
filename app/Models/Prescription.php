<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    public $table = "prescriptions";
    protected $guarded = ['id'];


    protected $dates = ['deleted_at'];

    public function Patients()
    {
        return $this->belongsTo(Patient::class, 'fk_patients_id');
    }

    public function Doctors()
    {
        return $this->belongsTo(User::class, 'fk_doctors_id');
    }
}
