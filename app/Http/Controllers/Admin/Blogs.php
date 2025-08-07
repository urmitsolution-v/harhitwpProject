<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\Enquiry;
use App\Models\Events;
use App\Models\Blogmodel;
use App\Models\Insights;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class Blogs extends Controller
{
    public function events(){
        $data['blog'] = Events::orderBy('id', 'desc')->get();
        return view('admin.events.index', $data);
    }

    public function new_event(Request $request) {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'short_description' => ['required'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'location' => ['required'],
                'date' => ['required'],
                'start_time' => ['required'],
                'end_time' => ['required'],
                'meta_description' => ['required'],
                'image' => ['required','max:2048'],
            ]);

            $events = new Events;
            $events->title = $request->title;
            $events->slug = Str::slug($request->title,'-');
            $events->short_description = $request->short_description;
            $events->description = $request->description;
            $events->location = $request->location;
            $events->date = $request->date;
            $events->start_time = $request->start_time;
            $events->end_time = $request->end_time;
            $events->meta_title = $request->meta_title;
            $events->meta_tags = $request->meta_tags;
            $events->meta_tags = $request->meta_tags;
            $events->meta_description = $request->meta_description;
            if ($request->image) {
                $events->image = uploadImage($request->image, $events, 'image');
            }

            $events->save();
            return redirect('/admin/events')->with('success', 'New Events Created Successfully');

        }
        return view('admin.events.add');
    }

    public function edit_events(Request $request,$id){
        $events = Events::findorfail($id);
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'short_description' => ['required'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'location' => ['required'],
                'date' => ['required'],
                'start_time' => ['required'],
                'end_time' => ['required'],
                'meta_description' => ['required'],
                'image' => ['max:2048'],
            ]);


            $events->title = $request->title;
            $events->slug = Str::slug($request->title,'-');
            $events->short_description = $request->short_description;
            $events->description = $request->description;
            $events->location = $request->location;
            $events->date = $request->date;
            $events->start_time = $request->start_time;
            $events->end_time = $request->end_time;
            $events->meta_title = $request->meta_title;
            $events->meta_tags = $request->meta_tags;
            $events->meta_tags = $request->meta_tags;
            $events->meta_description = $request->meta_description;
            if ($request->image) {
                $events->image = updateImage($request->image, $events, 'image');
            }

            $events->save();
            return redirect('/admin/events')->with('success', 'Update Successfully');

        }
        return view('admin.events.edit',compact('events'));

    }


    public function blogs(Request $request){
        if ($request->ajax()) {
            $data = Blogmodel::query()->with('get_Category')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('uploads/'.$row->image)
                    : url('images/default.png');
                })
                ->addColumn('category', function ($row) {
                    return $row->get_Category->title ?? 'N/A';
                })

                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    }else{
                        $image = $row->image;
                    }
                    return '<a href="/admin/delete/blogs/'.$row->id.'/'.$image.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete">Delete</i>
        </a>
        <a href="/admin/blogs-edit/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline">Edit</i>
        </a>';

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function newblog(Request $request)
    {
        if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'image' => ['max:2048'],
            ]);

            $blog = new Blogmodel;
            $blog->title = $request->title;
            if ($request->slug) {
                $blog->slug = $request->slug;
            } else {
                $blog->slug = Str::slug($request->title);
            }
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->category = $request->category;
            $blog->meta_tags = $request->meta_tags;
            $blog->meta_description = $request->meta_description;
            $blog->status = $request->status;
            $blog->show_home_page = $request->show_home_page;

            if ($request->image) {
                $blog->image = uploadImage($request->image, $blog, 'image');
            }

            $blog->save();
            return redirect('/admin/blogs')->with('success', 'New Blog Created Successfully');

        }
        return view('admin.blogs.add');
    }


    public function editblogs(Request $request, $id) {
        $blog = Blogmodel::find($id);
        if ($request->method() == "POST") {


            $validatedData = $request->validate([
                'title' => ['required'],
                'category' => ['numeric'],
                'image' => ['max:2048'],
            ]);

            $blog->title = $request->title;
            if ($request->slug) {
                $blog->slug = $request->slug;
            } else {
                $blog->slug = Str::slug($request->title);
            }
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->category = $request->category;
            $blog->meta_tags = $request->meta_tags;
            $blog->status = $request->status;
            $blog->meta_description = $request->meta_description;
            $blog->show_home_page = $request->show_home_page;


        if ($request->banner) {
            $blog->banner = updateImage($request->banner, $blog, 'banner');
        }


        if ($request->image) {
            $blog->image = updateImage($request->image, $blog, 'image');
        }


        $blog->save();
        return redirect('/admin/blogs')->with('success', 'Blog Updated Successfully');
    }

    if (isset($blog)) {
        return view('admin.blogs.edit',compact('blog'));

    }else{
        abort(404);
    }

    }

    public function contactenquires(){
        $data['enquires'] = Enquiry::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.contactenquires',$data);
    }

    public function viewenquiry($id){
        $row = Enquiry::find($id);
        if (isset($row)) {
            return view('superadmin.viewenquiry',compact('row'));

        }else{
            abort(404);
        }
    }


    public function insights(Request $request){

         if ($request->ajax()) {
            $data = Insights::query()->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('uploads/'.$row->image)
                    : url('images/default.png');
                })
             

                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    }else{
                        $image = $row->image;
                    }
                    return '<a href="/admin/delete/insights/'.$row->id.'/'.$image.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete">Delete</i>
        </a>
        <a href="/admin/insight-edit/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline">Edit</i>
        </a>';

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        
        return view('admin.insights.index');
    }

    public function newinsight(Request $request){
          if ($request->method() == "POST") {
            $validatedData = $request->validate([
                'title' => ['required'],
                'image' => ['max:2048'],
            ]);

            $insight = new Insights;
            $insight->title = $request->title;
            if ($request->slug) {
                $insight->slug = $request->slug;
            } else {
                $insight->slug = Str::slug($request->title);
            }
            $insight->short_description = $request->short_description;
            $insight->description = $request->description;
            $insight->meta_title = $request->meta_title;
            $insight->meta_tags = $request->meta_tags;
            $insight->meta_description = $request->meta_description;
            $insight->status = $request->status;
            $insight->show_home_page = $request->show_home_page;

            if ($request->image) {
                $insight->image = uploadImage($request->image, $insight, 'image');
            }

            $insight->save();
            return redirect('/admin/insights')->with('success', 'New Insights Created Successfully');

        }
        return view('admin.insights.newinsight');
    }

    public function editinsight(Request $request, $id){
      
      
       $row = Insights::find($id);
        if ($request->method() == "POST") {


            $validatedData = $request->validate([
                'title' => ['required'],
                'category' => ['numeric'],
                'image' => ['max:2048'],
            ]);

            $row->title = $request->title;
            if ($request->slug) {
                $row->slug = $request->slug;
            } else {
                $row->slug = Str::slug($request->title);
            }
            $row->short_description = $request->short_description;
            $row->description = $request->description;
            $row->meta_title = $request->meta_title;
            $row->meta_tags = $request->meta_tags;
            $row->status = $request->status;
            $row->meta_description = $request->meta_description;
            $row->show_home_page = $request->show_home_page;

            if ($request->banner) {
            $row->banner = updateImage($request->banner, $row, 'banner');
        }
        if ($request->image) {
            $row->image = updateImage($request->image, $row, 'image');
        }
        $row->save();
        return redirect('/admin/insights')->with('success', 'Updated Successfully');
    }

    if (isset($row)) {
      return view('admin.insights.editinsight',compact('row'));
    }else{
        abort(404);
    }  
    }
}