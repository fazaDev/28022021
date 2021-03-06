<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $halaman = Halaman::where('status', 1)->get();
        $section = Halaman::where('status', 1)->get();

        return view('landing', compact('halaman', 'section'));
    }

    public function show($slug)
    {
        $halaman = Halaman::findOrFail($slug)->first();

        return $halaman;
    }
}
