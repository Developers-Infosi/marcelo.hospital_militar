<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public $table = "exams";
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */







    protected $dates = ['deleted_at'];

    public function Patients()
    {
        return $this->belongsTo(Patient::class, 'fk_patients_id');
    }
    public function Doctors()
    {
        return $this->belongsTo(User::class, 'fk_doctors_id');
    }
    public function Nurses()
    {
        return $this->belongsTo(User::class, 'fk_nurses_id');
    }
    public function ExamTypes()
    {
        return $this->belongsTo(ExamType::class, 'fk_examTypes_id');
    }

}
