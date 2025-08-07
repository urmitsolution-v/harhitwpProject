<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpactStory;
use Illuminate\Support\Str;


class ImpactStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $stories = ImpactStory::latest()->get();
        return view('admin.impact_stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.impact_stories.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'menu_title' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only([
        'menu_title', 'short_description', 'content', 'status',
        'meta_title', 'meta_tags', 'meta_description'
    ]);

    $data['slug'] = Str::slug($request->title);

    $originalSlug = $data['slug'];
    $count = 1;
    while (\App\Models\ImpactStory::where('slug', $data['slug'])->exists()) {
        $data['slug'] = $originalSlug . '-' . $count++;
    }

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $data['image'] = 'uploads/' . $filename;
    }

    \App\Models\ImpactStory::create($data);

    return redirect()->route('stories.index')->with('success', 'Story created successfully!');
}

    public function edit(ImpactStory $impact_story , $id)
    {

        $impact_story = ImpactStory::findOrFail($id);

        return view('admin.impact_stories.edit', compact('impact_story'));
    }

   public function update(Request $request, ImpactStory $impact_story ,$id)
{

    $impact_story = ImpactStory::findOrFail($id);

    $request->validate([
        'title' => 'required|string',
        'menu_title' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only([
        'menu_title', 'short_description', 'content', 'status',
        'meta_title', 'meta_tags', 'meta_description'
    ]);

    // Optional: update slug only if title changed
    if ($request->title !== $impact_story->title) {
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (\App\Models\ImpactStory::where('slug', $slug)->where('id', '!=', $impact_story->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $data['slug'] = $slug;
    }

    // Handle new image
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $data['image'] = 'uploads/' . $filename;

        // Optional: delete old image
        if ($impact_story->image && file_exists(public_path($impact_story->image))) {
            unlink(public_path($impact_story->image));
        }
    }

    $impact_story->update($data);

    return redirect()->route('stories.index')->with('success', 'Impact story updated successfully.');
}

    public function destroy(ImpactStory $impact_story)
    {
        $impact_story->delete();
        return back()->with('success', 'Deleted.');
    }
    
}