<?php

namespace App\Http\Controllers;

use App\Rpp;
use App\User;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                    ->where([
                        ['rpp.nilai','!=',null],
                        ['rpp.status','!=','belum']
                    ])->orderBy('rpp.nama_rpp', 'ASC')->get();
        
        return view('kepala-sekolah.lihat', compact('rpp'));
    }

    public function disetujui()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where([['rpp.status','=', '1']])
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();
        $title = 'Disetujui';
        return view('kepala-sekolah.rpp.rpp', compact('rpp', 'title'));
    }
    
    public function tidakDisetujui()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where('rpp.status', '0')
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();
        $title = 'Tidak Disetujui';
        return view('kepala-sekolah.rpp.rpp', compact('rpp', 'title'));
    }

    public function belumDisetujui()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where([['rpp.status', 'belum'], ['rpp.nilai','!=',null]])
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();
        $title = 'Belum Disetujui';
        return view('kepala-sekolah.rpp.rpp', compact('rpp', 'title'));
    }

    public function belumDinilai()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where([['rpp.nilai','=', null], ['rpp.status','=','belum']])
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();
        $title = 'Belum Dinilai';
        return view('kepala-sekolah.rpp.rpp', compact('rpp', 'title'));
    }
}
