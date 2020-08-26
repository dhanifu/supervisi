<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('supervisor')->orderBy('name', 'ASC')->get();

        return view('kurikulum.jadwal.index', compact('users'));
    }
    public function lihat(User $user)
    {
        $jadwals = User::role('supervisor')->where('nip', $user->nip)
                    ->join('jadwals', 'users.nip','=','jadwals.nip_supervisor')
                    ->orderBy('jadwals.tanggal', 'ASC')->get();
        // dd($jadwals);

        return view('kurikulum.jadwal.lihat', compact('user', 'jadwals'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'waktu' => 'required',
            'sampai' => 'required',
        ]);

        $jadwal = Jadwal::create([
            'nip_supervisor' => $request->nip,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'sampai' => $request->sampai,
        ]);

        return redirect()->route('kurikulum.jadwal.lihat', $request->id)->with('success', 'Jadwal telah ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $jadwal = Jadwal::findOrFail($request->id);
        $this->validate($request, [
            'tanggal' => 'required',
            'waktu' => 'required',
            'sampai' => 'required',
        ]);

        $jadwal->update([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'sampai' => $request->sampai,
        ]);
        
        return redirect()->back()->with('success', 'Jadwal telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jadwal = Jadwal::find($request->id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}
