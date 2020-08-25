<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $supervisor = Auth::user()->nip;
        $rpp = User::join('rpp', 'users.nip','=','rpp.nip_guru')
                    ->where('rpp.status','belum')
                    ->orderBy('rpp.created_at', 'DESC')
                    ->get();

        return view('supervisor.rpp.menilai', compact('rpp'));
    }

    public function menilai(Request $request)
    {
        $rpp = Rpp::findOrFail($request->rpp_id);
        $this->validate($request, [
            'nilai' => 'required|numeric',
        ]);

        $rpp->update([
            'nilai' => $request->nilai,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menilai RPP');
    }
    // HALAMAN BIASA YANG BERISI INFO
    public function disetujui()
    {
        $rpp = Rpp::where([['status','=','1'],['nilai','!=',null]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')
                    ->get();
        $title = 'Disetujui';
        
        return view('supervisor.rpp.info', compact('rpp', 'title'));
    }
    public function belumDisetujui()
    {
        $rpp = Rpp::where([['status','=','belum'],['nilai','!=',null]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')
                    ->get();
        $title = 'Menunggu Persetujuan';

        return view('supervisor.rpp.info', compact('rpp', 'title'));
    }
    public function tidakDisetujui()
    {
        $rpp = Rpp::where([['status','=','0'],['nilai','!=',null]])
                    ->join('users', 'rpp.nip_guru','=','users.nip')
                    ->get();
        $title = 'Tidak Disetujui';

        return view('supervisor.rpp.info', compact('rpp', 'title'));
    }


    public function editNilai(Request $request)
    {
        $rpp = Rpp::findOrFail($request->rpp_id);
        $this->validate($request, [
            'nilai' => 'required|numeric',
        ]);

        $rpp->update([
            'nilai' => $request->nilai,
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengedit Nilai RPP');
    }

    // JADWAL
    public function jadwal()
    {
        $jadwals = User::role('supervisor')->where('nip', Auth::user()->nip)
                        ->join('jadwals', 'users.nip','=','jadwals.nip_supervisor')
                        ->get();
        
        return view('supervisor.jadwal.index', compact('jadwals'));
    }
}
