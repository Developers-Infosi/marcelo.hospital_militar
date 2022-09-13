<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = "employees";
    protected $guarded = ['id'];


    public function positions()
    {
        return $this->belongsTo(Position::class, 'fk_positions_id');
    }

    public function departaments()
    {
        return $this->belongsTo(Departament::class, 'fk_departments_id');
    }

    protected $dates = ['deleted_at'];
}
