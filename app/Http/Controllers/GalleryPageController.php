<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryPageController extends Controller
{
    public function index()
    {
        // Ambil semua layanan aktif
        $galleries = Gallery::where('is_active', 1)->latest()->get();
        return view('pages.gallery.index', compact('galleries'));
    }
}
