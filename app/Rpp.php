<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpp extends Model
{
    protected $table = 'rpp';
    protected $fillable = ['nip_guru', 'nama_rpp', 'rpp'];

    public function penilaians()
    {
        return $this->hasMany('App\Penilaian', 'rpp_id');
    }
}
