<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexPilih()
    {
        $users = User::role('calon-sv')->get();

        return view('kurikulum.pilih-supervisor.index', compact('users'));
    }
    public function terpilih()
    {
        $users = User::role('supervisor')->get();

        return view('kurikulum.pilih-supervisor.terpilih', compact('users'));
    }
    public function pilih(Request $request)
    {
        $supervisor = User::find($request->id);
        $supervisor->syncRoles('supervisor');

        return redirect()->route('kurikulum.pilih.index');
    }
    public function cabut(Request $request)
    {
        $supervisor = User::find($request->id);
        $supervisor->syncRoles('calon-sv');

        return redirect()->route('kurikulum.pilih.terpilih');
    }

    public function persetujuan()
    {
        $null = !null;
        $rpp = Rpp::join('users','rpp.nip_guru','=','users.nip')
                ->where([
                    ['rpp.nilai','!=',null]
                ])->orderBy('rpp.updated_at', 'DESC')
                ->get();
        $total = Rpp::count();
        $disetujui = Rpp::where('status', '1')->get()->count();
        $tak_disetujui = Rpp::where('status', '0')->get()->count();
        $belum_dinilai = Rpp::where('nilai', null)->count();
        $belum_disetujui = Rpp::where([['status','=', 'belum'], ['nilai','!=',null]])->count();

        return view('kurikulum.persetujuan.index', compact('rpp', 'total', 'disetujui', 'tak_disetujui', 'belum_dinilai', 'belum_disetujui'));
    }

    public function disetujui()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where([['rpp.status','=', '1']])
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();

        return view('kurikulum.persetujuan.disetujui', compact('rpp'));
    }

    public function tidakDisetujui()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where('rpp.status', '0')
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();

        return view('kurikulum.persetujuan.tidak-disetujui', compact('rpp'));
    }

    public function belumDinilai()
    {
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
                ->where('rpp.nilai', null)
                ->orderBy('rpp.updated_at', 'DESC')
                ->get();

        return view('kurikulum.persetujuan.belum-dinilai', compact('rpp'));
    }
}
