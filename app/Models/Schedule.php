<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $casts = [
        'recurrence' => 'array'
    ];
    protected $table = "schedule";


    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
    public function slots()
    {
        return $this->hasMany(Slot::class);
    }
}
