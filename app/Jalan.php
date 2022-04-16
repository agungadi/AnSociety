<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    protected $table = "jalan";
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
