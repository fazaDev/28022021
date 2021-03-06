<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        $halaman  = Halaman::paginate(5);

        return view('halaman.index', compact('halaman'));
    }

    public function create()
    {
        return view('halaman.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Halaman::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('halaman.index');
    }

    public function edit($id)
    {
        $halaman = Halaman::findOrFail($id);

        return view('halaman.edit', compact('halaman'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $halaman = Halaman::findOrFail($id);
        $halaman->judul = $request->judul;
        $halaman->deskripsi = $request->deskripsi;
        $halaman->status = $request->status;
        $halaman->save();

        return redirect()->route('halaman.index');
    }

    public function destroy($id)
    {
        $halaman = Halaman::findOrFail($id);

        $halaman->delete();

        return redirect()->route('halaman.index');
    }
}
