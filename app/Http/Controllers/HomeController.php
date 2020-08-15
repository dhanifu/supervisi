<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if ( Auth::user()->role('admin') ) {
            return view('dashboard');
        }elseif ( Auth::user()->role('kepalasekolah') ) {
            return view('dashboard');
        }elseif ( Auth::user()->role('kurikulum') ) {
            return view('dashboard');
        }elseif ( Auth::user()->role('guru') ) {
            return view('dashboard');
        }elseif ( Auth::user()->role('supervisor') ) {
            return view('dashboard');
        }
    }
}
