<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rpps_join = Rpp::join('penilaians', 'rpp.id','=','penilaians.rpp_id')
                    ->join('persetujuans', 'penilaians.rpp_id','=','persetujuans.rpp_id')
                    ->join('users', 'penilaians.nip_supervisor','=','users.nip')
                    ->get();
        $rpps = Rpp::all();

        // if ( empty($rpps) ) {
        //     $rpps = Rpp::all();
        //     return view('guru.index', compact('rpps'));
        // }else{
        //     return view('guru.index', compact('rpps'));
        // }

        return view('guru.index', compact('rpps_join', 'rpps'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nip_guru = Auth::user()->nip;
        
        // Validate
        $this->validate($request, [
            'nama_rpp' => 'required',
            'rpp' => 'required|mimes:pdf,jpg,png,jpeg',
        ]);

        if ( $request->hasFile('rpp') ) {
            $rpp_file = request('rpp');
            $rppName = uniqid() . date('ymd') . Str::slug('rpp-'.$request->nama_rpp) . time() . '.' . $rpp_file->getClientOriginalExtension();

            $rpp = Rpp::create([
                'nip_guru' => $nip_guru,
                'nama_rpp' => $request->nama_rpp,
                'rpp' => $rppName,
            ]);
            $rpp_file->move(public_path('rpp/'), $rppName);
            
            return redirect()->back()->with('success', 'RPP Telah diupload');
        }
    }

}
