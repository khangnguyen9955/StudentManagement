<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['fullName', 'password', 'email', 'role', 'phone', 'major_id', 'class_id'];
    protected $table = "students";

    public function score_reports()
    {
        return $this->hasMany(ScoreReport::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }





    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $studentCode = "";
            $number = Student::max('id') + 1;
            if ($model->major_id == 1) {
                $studentCode = "GCS" . str_pad($number, 3, '0', STR_PAD_LEFT);
            } elseif ($model->major_id == 2) {
                $studentCode = "GBS" . str_pad($number, 3, '0', STR_PAD_LEFT);
            } else {
                $studentCode = "GDS" . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
            $model->studentCode = $studentCode;
        });
    }
}
