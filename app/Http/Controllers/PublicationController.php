<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\PublicationSetting;



class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::latest()->get();
        $setting = \App\Models\PublicationSetting::first();
        return view('admin.publications.index', compact('publications', 'setting'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title'         => 'required',
        // 'description'   => 'nullable|string',
        // 'published_by'  => 'nullable',
        // 'button_name'   => 'nullable',
        // 'button_url'    => 'nullable|url',
        // 'target'        => 'in:_self,_blank',
        'image'         => 'nullable|max:2048',
    ]);

    $data = $request->only([
        'title'
    ]);

    // Ensure folder exists
    $uploadPath = public_path('uploads/publications');
    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0775, true);
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $imageName);
        $data['image'] = $imageName;
    }

    // If updating
    if ($request->filled('id')) {
        $pub = \App\Models\Publication::findOrFail($request->id);

        // Delete old image if a new one was uploaded
        if ($request->hasFile('image') && $pub->image) {
            $oldPath = $uploadPath . '/' . $pub->image;
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        $pub->update($data);
        return redirect()->back()->with('success', 'Publication updated successfully.');
    }

    // Create new
    \App\Models\Publication::create($data);
    return redirect()->back()->with('success', 'Publication created successfully.');
}


public function destroy($id)
{
    $pub = \App\Models\Publication::findOrFail($id);
    $uploadPath = public_path('uploads/publications');

    if ($pub->image) {
        $imagePath = $uploadPath . '/' . $pub->image;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    $pub->delete();
    return redirect()->back()->with('success', 'Publication deleted successfully.');
}


public function updateBasicInfo(Request $request)
{
    $request->validate([
        'title' => 'required',
        'sub_description' => 'nullable|string',
        'meta_title' => 'nullable',
        'meta_tags' => 'nullable',
        'meta_description' => 'nullable|string',
    ]);

    $data = $request->only([
        'title', 'sub_description', 'meta_title', 'meta_tags', 'meta_description',
    ]);

    $setting = PublicationSetting::first();
    if ($setting) {
        $setting->update($data);
    } else {
        PublicationSetting::create($data);
    }

    return redirect()->back()->with('success', 'Basic info updated successfully.');
}

}