<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['subjectName', 'major_id'];
    protected $table = "subjects";

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class);
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $subjectCode = "";
            $number = Subject::max('id') + 1;
            $subjectName = $model->subjectName;
            $expr = '/(?<=\s|^)\w/iu';
            preg_match_all($expr, $subjectName, $matches);
            $result = implode('', $matches[0]);
            $result = strtoupper($result);
            if ($model->major_id == 1) {
                $subjectCode = "C" . str_pad($number, 2, '0', STR_PAD_LEFT);
            } elseif ($model->major_id == 2) {
                $subjectCode = "B" . str_pad($number, 2, '0', STR_PAD_LEFT);
            } else {
                $subjectCode = "D" . str_pad($number, 2, '0', STR_PAD_LEFT);
            }
            $model->subjectCode = $result . $subjectCode;
        });
    }
}
