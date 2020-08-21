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
        $rpp = Rpp::orderBy('created_at', 'DESC')->where('nip_guru', $guru)->get();
        
        return view('guru.index', compact('rpp'));
    }

    
}
