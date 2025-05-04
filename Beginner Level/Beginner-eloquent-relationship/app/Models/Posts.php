<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected  $fillable = [
        'title',
        'description',
        'author_id'
    ];

    public function person(){
        return $this->belongsTo(Person::class,'author_id','id');
    }


}
