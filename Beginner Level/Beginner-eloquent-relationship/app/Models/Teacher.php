<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //

    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];


    public function courses(){
        return $this->belongsToMany(Course::class,'course_teacher','teacher_id','course_id');
    }
}
