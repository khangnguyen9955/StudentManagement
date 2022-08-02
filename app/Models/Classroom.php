<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = ['major_id'];
    protected $table = "classrooms";


    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $classCode = "";
            $number = Classroom::max('id') + 1;
            if ($model->major_id == 1) {
                $classCode = "GCC" . str_pad($number, 2, '0', STR_PAD_LEFT);
            } elseif ($model->major_id == 2) {
                $classCode = "GBC" . str_pad($number, 2, '0', STR_PAD_LEFT);
            } else {
                $classCode = "GDC" . str_pad($number, 2, '0', STR_PAD_LEFT);
            }
            $model->classCode = $classCode;
        });
    }
}
