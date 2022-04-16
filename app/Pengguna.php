<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    //
    protected $table = "pengguna";
    protected $primaryKey = 'id';

    public $timestamps = false;

    
    protected $dates = [
        'created_at',

    ];

    protected $fillable = [
        'name',
        'email',
        'noHP',
    ];

    protected $hidden = [
        'password',
    ];

}
