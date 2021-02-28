<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function cetakById($uuid)
    {

        $pembayaran = Spp::with('siswa')->where('uuid', $uuid)->first();
        if ($pembayaran) {
            return view('cetak.index', compact('pembayaran'));
        }

        return redirect()->route('pembayaran-spp');
    }
}
