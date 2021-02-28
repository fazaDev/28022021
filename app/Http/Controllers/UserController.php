<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function sycn_user_siswa()
    {
        $siswa = Siswa::all();

        foreach ($siswa as $row) {

            $email = Str::slug($row->ind) . '@paudteratai.com';

            $cek = User::where('email', $email)->first();

            if ($cek === null) {
                $user = new User;
                $user->name = $row->nama;
                $user->email = Str::slug($row->ind) . '@paudteratai.com';
                $user->password = bcrypt($row->tanggal_lahir);
                $user->role = 'user';
                $user->save();
            } else {
                return redirect()->route('users.index')->with('info', 'Data user siswa sudah terupdate!');
            }
        }
        return redirect()->back()->with('success', 'Data user siswa berhasil disinkronisasi...');
    }

    public function reset_password($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'password' => bcrypt('123456')
        ]);

        return redirect()->back()->with('success', 'Password user berhasil direset (default: 123456)');
    }
}
