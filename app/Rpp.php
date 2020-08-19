<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpp extends Model
{
    protected $table = 'rpp';

    protected $fillable = ['nip_guru', 'nama_rpp', 'rpp', 'nilai', 'status'];

    public function users()
    {
        return $this->hasMany('App\User', 'nip_guru');
    }
}
