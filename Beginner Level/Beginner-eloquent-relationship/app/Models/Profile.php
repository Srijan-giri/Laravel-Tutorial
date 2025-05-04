<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'bio',
        'address',
        'phone_number'
    ];

    public function person(){
        return $this->belongsTo(Person::class,'user_id','id');
    }
}
