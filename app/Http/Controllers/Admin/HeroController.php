<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::latest()->get();
        return view('admin.heroes.index', compact('heroes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        Hero::create($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero created successfully');
    }

    public function update(Request $request, Hero $hero)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero updated successfully');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();

        return back()->with('success', 'Hero deleted successfully');
    }
}
