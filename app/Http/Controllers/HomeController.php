<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rpp;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $nip = Auth::user()->nip;
        $total = Rpp::count();
        $disetujui = Rpp::where('status', '1')->get()->count();
        $tak_disetujui = Rpp::where('status', '0')->get()->count();
        $belum_dinilai = Rpp::where('nilai', null)->count();
        $belum_disetujui = Rpp::where([['status','=', 'belum'], ['nilai','!=',null]])->count();

        // if ( Auth::user()->role('admin') ) {
        //     return view('dashboard');
        // }
        // elseif ( Auth::user()->role('kepalasekolah') ) {
        //     return view('dashboard');
        // }
        // elseif ( Auth::user()->role('kurikulum') ) {
        //     return view('dashboard');
        // }
        if ( Auth::user()->role('guru') ) {
            $total_guru = Rpp::where('nip_guru', $nip)->count();
            $disetujui_guru = Rpp::where([['status', '1'], ['nip_guru','=',$nip]])->get()->count();
            $tak_disetujui_guru = Rpp::where([['status', '0'], ['nip_guru','=',$nip]])->get()->count();
            $belum_dinilai_guru = Rpp::where([['nilai', null], ['nip_guru','=',$nip]])->count();
            $belum_disetujui_guru = Rpp::where([['status','=', 'belum'], ['nilai','!=',null], ['nip_guru','=',$nip]])->count();

            return view('dashboard', compact('total_guru', 'disetujui_guru', 'tak_disetujui_guru', 'belum_dinilai_guru', 'belum_disetujui_guru'));
        }
        // elseif ( Auth::user()->role('supervisor') ) {
        //     return view('dashboard');
        // }

        return view('dashboard', compact('total', 'disetujui', 'tak_disetujui', 'belum_dinilai', 'belum_disetujui'));
    }
}
