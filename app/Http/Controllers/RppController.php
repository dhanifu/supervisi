<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RppController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * UPLOAD RPP
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = Auth::user()->nip;
        $nama_rpp = $request->nama_rpp;
        $this->validate($request, [
            'nama_rpp' => 'required|string',
            'rpp' => 'required|mimes:pdf,jpg,png',
        ]);

        if ( $request->hasFile('rpp') ) {
            $rpp = request('rpp');
            $rpp_name = date('Ymd-').Str::slug($request->nama_rpp).uniqid(). '.' .$rpp->getClientOriginalExtension();

            $rpp_input = Rpp::create([
                'nip_guru' => $guru,
                'nama_rpp' => $nama_rpp,
                'rpp' => $rpp_name,
                'status' => 'belum',
            ]);

            $rpp->move(public_path('documents/rpp/'), $rpp_name);

            return redirect()->back()->with('success', 'RPP telah diupload');
        }else {
            return redirect()->back()->with('error', 'RPP gagal diupload');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rpp  $rpp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rpp = Rpp::findOrFail($request->rpp_id);
        $this->validate($request, [
            'nama_rpp' => 'required|string',
            'rpp' => 'mimes:pdf,jpg,png',
        ]);

        if ( $request->hasFile('rpp') ) {
            $rpp_file = request('rpp');
            $rpp_name = date('Ymd-').Str::slug($request->nama_rpp).uniqid(). '.' .$rpp_file->getClientOriginalExtension();

            File::delete(public_path('documents/rpp/'.$rpp->rpp));
            $rpp_file->move(public_path('documents/rpp/'), $rpp_name);
        }else{
            $rpp_name = $rpp->rpp;
        }
        $rpp->update([
            'nama_rpp' => $request->nama_rpp,
            'rpp' => $rpp_name,
        ]);

        return redirect()->back()->with('success', 'RPP telah diedit');
    }

    public function destroy(Rpp $rpp)
    {
        File::delete(public_path('documents/rpp/'.$rpp->rpp));
        $rpp->delete();

        return redirect()->back()->with('success', 'RPP telah dihapus');
    }

}
