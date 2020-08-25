<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Auth::user()->nip;
        $rpp = Rpp::orderBy('updated_at', 'ASC')->where('nip_guru', $guru)->get();
        
        return view('guru.index', compact('rpp'));
    }

    public function belumDinilai()
    {
        $rpp = Rpp::where([['nilai','=', null], 
                        ['nip_guru','=',Auth::user()->nip]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')->get();
        $title = 'Belum Dinilai';

        return view('guru.info', compact('rpp', 'title'));
    }
    public function belumDisetujui()
    {
        $rpp = Rpp::where([['nilai','!=', null],
                        ['status','=','belum'],
                        ['nip_guru','=',Auth::user()->nip]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')->get();
        $title = 'Menunggu Persetujuan';

        return view('guru.info', compact('rpp', 'title'));
    }
    public function disetujui()
    {
        $rpp = Rpp::where([['nilai','!=', null], 
                        ['status','=','1'],
                        ['nip_guru','=',Auth::user()->nip]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')->get();
        $title = 'Disetujui';

        return view('guru.info', compact('rpp', 'title'));
    }
    public function tidakDisetujui()
    {
        $rpp = Rpp::where([['nilai','!=', null],
                        ['status','=','0'],
                        ['nip_guru','=',Auth::user()->nip]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')->get();
        $title = 'Tidak Disetujui';

        return view('guru.info', compact('rpp', 'title'));
    }

    
}
