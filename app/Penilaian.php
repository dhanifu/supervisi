<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = ['rpp_id', 'nip_supervisor', 'nilai'];

    public function rpp()
    {
        return $this->belongsTo('App\Penilaian', 'rpp_id');
    }

    public function persetujuans()
    {
        return $this->hasMany('App\Persetujuan', 'rpp_id');
    }
}
