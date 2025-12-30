<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicePageController extends Controller
{
    public function index()
    {
        // Ambil semua layanan aktif
        $services = Service::where('is_active', 1)->latest()->get();
        return view('pages.services.index', compact('services'));
    }
}
