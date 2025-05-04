<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable =[
        'name',
        'description',
    ];


    public function students(){
        return $this->belongsToMany(Student::class,'student_course','course_id','student_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'course_teacher','course_id','teacher_id');
    }

}
