<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Search by Name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by Brand
        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand_id', $request->brand);
        }

        // Filter by Price Range
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();

        return view('pages.products.index', compact('products', 'categories', 'brands'));
    }

    public function show(string $slug)
    {
        $product = Product::with(['category', 'brand'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProducts = Product::with(['category', 'brand'])
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->when($product->category_id, fn ($query) => $query->where('category_id', $product->category_id))
            ->latest()
            ->take(3)
            ->get();

        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
