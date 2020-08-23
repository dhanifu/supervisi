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
        // elseif ( Auth::user()->role('guru') ) {
        //     return view('dashboard');
        // }
        // elseif ( Auth::user()->role('supervisor') ) {
        //     return view('dashboard');
        // }

        return view('dashboard', compact('total', 'disetujui', 'tak_disetujui', 'belum_dinilai', 'belum_disetujui'));
    }
}
