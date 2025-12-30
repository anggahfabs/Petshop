<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlePageController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_active', 1)->latest()->paginate(9);
        return view('pages.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('is_active', 1)->firstOrFail();
        return view('pages.articles.show', compact('article'));
    }
}
