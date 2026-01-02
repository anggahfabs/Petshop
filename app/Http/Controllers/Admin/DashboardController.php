<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Appointment;
use App\Models\ContactMessage;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products_count' => Product::count(),
            'services_count' => Service::count(),
            'categories_count' => Category::count(),
            'articles_count' => Article::count(),
            'galleries_count' => Gallery::count(),
            'appointments_count' => Appointment::count(),
            'messages_count' => ContactMessage::where('is_read', 0)->count(),
            'subscribers_count' => Subscriber::count(),
        ];

        $recent_appointments = Appointment::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_appointments'));
    }
}
