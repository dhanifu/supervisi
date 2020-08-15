<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    protected $fillable = ['rpp_id', 'status'];

    public function penilaian()
    {
        return $this->belongsTo('App\Penilaian', 'rpp_id');
    }
}
