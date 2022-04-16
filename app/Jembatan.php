<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jembatan extends Model
{
    protected $table = "jembatan";
    protected $primaryKey = 'idLapor';

    public $timestamps = false;

    protected $dates = [
        'created_at',

    ];

    protected $fillable = [
        'idUser',
        'image',
        'deskripsi',
        'alamat',
        'kecamatan',
        'latitude',
        'longtitude',

    ];
    public function pengguna(){
        return $this->belongsTo('App\Pengguna');
    }
}
