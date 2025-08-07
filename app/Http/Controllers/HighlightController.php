<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Highlight;


class HighlightController extends Controller
{
 public function index()
    {
        $highlights = Highlight::latest()->get();
        return view('admin.highlighcontent', compact('highlights'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'month' => 'required',
            'year' => 'required|integer',
            'url' => 'nullable|url',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // $validated['image'] = $request->file('image')->store('uploads/highlights', 'public');
            $validated['image'] = $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null;
        }

        Highlight::create($validated);
        return redirect()->back()->with('success', 'Highlight created successfully!');
    }

    public function update(Request $request, Highlight $highlight)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'month' => 'required',
            'year' => 'required|integer',
            'url' => 'nullable|url',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|max:2048',
        ]);

       if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($highlight->image && file_exists(public_path($highlight->image))) {
            unlink(public_path($highlight->image));
        }

        // Store new image
        $image = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $validated['image'] = 'uploads/'.$imageName;
    }

        $highlight->update($validated);
        return redirect()->back()->with('success', 'Highlight updated successfully!');
    }

  public function destroy(Highlight $highlight)
{
    // Delete the image file from folder if exists
    if ($highlight->image && file_exists(public_path($highlight->image))) {
        unlink(public_path($highlight->image));
    }

    // Delete the database record
    $highlight->delete();

    return redirect()->back()->with('success', 'Highlight deleted successfully!');
}
  public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return 'uploads/' . $imageName;
    }

    
}