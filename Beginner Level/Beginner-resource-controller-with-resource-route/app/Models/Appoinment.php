<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{

    use HasFactory;
    protected $table = 'appoinments';

    protected $fillable = [
        'name',
        'date',
        'email',
        'phone'
    ];
}
