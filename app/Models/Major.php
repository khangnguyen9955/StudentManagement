<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = "majors";

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
}
