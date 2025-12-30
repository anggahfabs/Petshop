<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active');
        $data['excerpt'] = Str::limit(strip_tags($data['content']), 150);

        if ($request->hasFile('image')) {
            $data['thumbnail'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active');
        $data['excerpt'] = Str::limit(strip_tags($data['content']), 150);

        if ($request->hasFile('image')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();
        return back()->with('success', 'Article deleted successfully');
    }
}
