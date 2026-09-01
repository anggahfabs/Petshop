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

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        $relatedServices = Service::where('is_active', 1)
            ->where('id', '!=', $service->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.services.show', compact('service', 'relatedServices'));
    }
}
