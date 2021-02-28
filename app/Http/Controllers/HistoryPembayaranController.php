<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryPembayaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            $siswa = Siswa::where('user_id', $user->id)->first();
            if ($siswa) {
                $siswa_id = $siswa->id;
                // dd($siswa_id);
                $spp = Spp::where('siswa_id', $siswa_id)->get();
                return view('history.pembayaran', compact('spp'));
            } else {
                return 'Data spp tidak ditemukan';
            }
        } else {
            return 'Data siswa tidak ditemukan';
        }
    }
}
