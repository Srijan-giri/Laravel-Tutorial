<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // for testing purposes
    use HasFactory;

    protected $table = 'employees';


    // $fillable is an array that specifies which attributes can be mass assigned
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    // ];


    // guarded is an array that specifies which attributes are not mass assignable
    // protected $guarded = [
    //     'name',
    //     'email',
    //     'phone',
    // ];


    public function genarateInfo(){
        return 'This is a test function';
    }

    public function getFullNameAttribute(){
        return "This is a full name attribute test function";
    }
}
