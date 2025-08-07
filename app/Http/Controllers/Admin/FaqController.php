<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqSetting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    


  public function index()
    {
        $setting = FaqSetting::first();
        $faqs = Faq::latest()->get();
        return view('admin.Faq.index', compact('setting', 'faqs'));
    }

    public function storeSetting(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_tags' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'sub_description', 'meta_title', 'meta_tags', 'meta_description']);

        FaqSetting::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'FAQ Settings updated successfully.');
    }

     public function updateFaq(Request $request, Faq $faq)
    {
        $faq->update($request->only('question', 'answer'));
        return back()->with('success', 'FAQ Updated.');
    }
    
    public function storeFaq(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        Faq::create($request->only('question', 'answer'));

        return redirect()->back()->with('success', 'FAQ added successfully.');
    }

    public function destroyFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }

}