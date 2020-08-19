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
        $rpp = Rpp::join('users', 'rpp.nip_guru','=','users.nip')
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
}
