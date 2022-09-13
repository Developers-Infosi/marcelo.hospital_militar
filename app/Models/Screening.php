<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;
    public $table = "screenings";
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

    public function Nurses()
    {
        return $this->belongsTo(User::class, 'fk_nurses_id');
    }
}
