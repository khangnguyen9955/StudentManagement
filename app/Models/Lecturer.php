<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = ['fullName', 'password', 'email', 'phone', 'major_id'];
    protected $table = "lecturers";


    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function classrooms(){
        return $this->belongsToMany(Classroom::class);
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lecturerCode = "";
            $number = Lecturer::max('id') + 1;
            if ($model->major_id == 1) {
                $lecturerCode = "GCL" . str_pad($number, 3, '0', STR_PAD_LEFT);
            } elseif ($model->major_id == 2) {
                $lecturerCode = "GBL" . str_pad($number, 3, '0', STR_PAD_LEFT);
            } else {
                $lecturerCode = "GDL" . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
            $model->lecturerCode = $lecturerCode;
        });
    }
}
