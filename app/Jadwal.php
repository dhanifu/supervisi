<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['nip_kurikulum', 'nip_supervisor', 'tanggal', 'waktu'];

    public function user()
    {
        return $this->belongsTo('App\User', 'nip_supervisor');
    }
}
