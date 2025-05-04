<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name',
        'email',
        'age'
    ];


    public function posts(){
        return $this->hasMany(Posts::class,'author_id','id');
    }
    public function generalInfo(){
        return 'This is a test function';
    }
    public function profile(){
        return $this->hasOne(Profile::class,'user_id','id');
    }


}
