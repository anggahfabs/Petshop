<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Article;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
          'heroes' => Hero::where('is_active', 1)->get(),
          'services' => Service::where('is_active', 1)->get(),
          'galleries' => Gallery::where('is_active', 1)->get(),
          'products' => Product::where('is_active', 1)->get(),
          // 'contacts' => Contact::where('is_active', 1)->get(),
          'articles' => Article::where('is_active', 1)->get(),
          'siteSettings' => SiteSetting::where('is_active', 1)->get(),
        ]);
    }
}