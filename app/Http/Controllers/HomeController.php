<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Service;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'heroes' => Hero::where('is_active', 1)
                ->latest()
                ->take(3)
                ->get(),
            'services' => Service::where('is_active', 1)
                ->latest()
                ->take(3)
                ->get(),
            'products' => Product::with('category')
                ->where('is_active', 1)
                ->latest()
                ->take(3)
                ->get(),
            'brands' => Brand::where('is_active', 1)
                ->latest()
                ->take(8)
                ->get(),
            'galleries' => Gallery::where('is_active', 1)
                ->latest()
                ->take(8)
                ->get(),
            'articles' => Article::where('is_active', 1)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
