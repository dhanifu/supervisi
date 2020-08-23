<?php

namespace App\Http\Controllers;

use Auth;
use App\Rpp;
use App\User;
use App\Jadwal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function supervisor()
    {
        $user = User::role('calon-sv')->get();
        
        return view('admin.rpp.index', compact('user'));
    }
    public function terpilih()
    {
        $users = User::role('supervisor')->get();

        return view('admin.supervisor.terpilih', compact('users'));
    }

    public function create()
    {
        return view('admin.supervisor.calon-sv');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => ['required', 'numeric', 'min:18', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole('calon-sv');

        return redirect()->route('admin.supervisor.index')->with('success', 'Berhasil menambah user');
    }
    public function update(Request $request)
    {
        $users = User::findOrFail($request->user_id);
        
        $users->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Berhasil mengedit');
    }
    public function destroy(User $user)
    {
        $user->removeRole($user->roles->first());
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}
