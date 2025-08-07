<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudio;
use App\Models\Category;
use App\Models\Industries;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables; // Correct import for Yajra DataTables

class ServiceController extends Controller
{
    public function herosection()
    {
        return view('admin.hero.index');
    }

    public function casestudios(Request $request)
    {
        if ($request->ajax()) {
            $data = CaseStudio::query()->with('get_Category'); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->get_Category->title ?? 'N/A'; // Assuming the category relationship
                })

                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('uploads/'.$row->image)
                    : url('images/default.png');
                })

                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    } else {
                        $image = $row->image;
                    }

                    return '<a href="/admin/delete/case_studio/'.$row->id.'/'.$image.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/edit-casestudio/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return View('admin.casestudios.index');
    }

    public function addcasestudio(Request $request)
    {
        if ($request->method() == 'POST') {

            $new = new CaseStudio;

            $new->title = $request->title;
            if ($request->slug) {
                $new->slug = $request->slug;
            } else {
                $new->slug = Str::slug($request->title);
            }
            $new->category = $request->category;
            $new->title = $request->title;
            $new->date = $request->date;
            $new->description = $request->description;
            $new->meta_title = $request->meta_title;
            $new->meta_tags = $request->meta_tags;
            $new->meta_description = $request->meta_description;
            $new->status = $request->status;

            $proJect = [
                'client' => $request->client,
                'location' => $request->location,
                'date' => $request->date,
                'budget' => $request->budget,
            ];

            $new->project_information = json_encode($proJect);

            if ($request->image) {
                $new->image = uploadImage($request->image, $new, 'image');
            }
            $new->save();

            return redirect('/admin/casestudios')->with('success', 'New Case Studio Created Successfully.');
        }

        return View('admin.casestudios.add');
    }

    public function edit_casestudio(Request $request, $id)
    {
        $row = CaseStudio::findorfail($id);
        if ($request->method() == 'POST') {

            $row->title = $request->title;
            if ($request->slug) {
                $row->slug = $request->slug;
            } else {
                $row->slug = Str::slug($request->title);
            }
            $row->category = $request->category;
            $row->title = $request->title;
            $row->date = $request->date;
            $row->description = $request->description;
            $row->meta_title = $request->meta_title;
            $row->meta_tags = $request->meta_tags;
            $row->meta_description = $request->meta_description;
            $row->status = $request->status;

            $proJect = [
                'client' => $request->client,
                'location' => $request->location,
                'date' => $request->date,
                'budget' => $request->budget,
            ];

            $row->project_information = json_encode($proJect);

            if ($request->image) {
                $row->image = updateImage($request->image, $row, 'image');
            }
            $row->save();

            return redirect('/admin/casestudios')->with('success', 'New Case Studio Created Successfully.');
        }

        return View('admin.casestudios.edit', compact('row'));
    }

    public function newindustry(Request $request)
    {
        if ($request->method() == 'POST') {

            $new = new Industries;
            $new->post_title = $request->post_title;
            if ($request->slug) {
                $new->slug = $request->slug;

            } else {
                $new->slug = Str::slug($request->title);

            }


            $new->faq_status = $request->faq_status;

            $lists = [];
            foreach ($request->faqtitle as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'dec' => $request->dec[$key],
                ];
            }

            $new->lists = json_encode($lists);

            
            $new->title = $request->title;
            $new->cmstitle = $request->cmstitle;
            $new->description = $request->description;
            $new->meta_title = $request->meta_title;
            $new->meta_tags = $request->meta_tags;
            $new->meta_description = $request->meta_description;
            $new->status = $request->status;
            if ($request->image) {
                $new->image = uploadImage($request->image, $new, 'image');
            }
            $new->save();

            return redirect('/admin/industries')->with('success', 'New Industry Created Successfully.');
        }

        return view('admin.industries.add');

    }

    public function editindustry(Request $request, $id)
    {
        $row = Industries::findorfail($id);

        if ($request->method() == 'POST') {

            $row->post_title = $request->post_title;
            if ($request->slug) {
                $row->slug = $request->slug;

            } else {
                $row->slug = Str::slug($request->title);

            }
            $row->title = $request->title;
            $row->description = $request->description;
            $row->cmstitle = $request->cmstitle;
            $row->meta_title = $request->meta_title;
            $row->meta_tags = $request->meta_tags;
            $row->meta_description = $request->meta_description;
            $row->status = $request->status;

            $row->faq_status = $request->faq_status;

            $lists = [];
            foreach ($request->faqtitle as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'dec' => $request->dec[$key],
                ];
            }

            $row->lists = json_encode($lists);

            
            if ($request->image) {
                $row->image = updateImage($request->image, $row, 'image');
            }
            $row->save();

            return redirect('/admin/industries')->with('success', 'Industry Updated Successfully.');
        }

        return view('admin.industries.edit', compact('row'));
    }

    public function industries(Request $request)
    {
        if ($request->ajax()) {
            $data = Industries::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    } else {
                        $image = $row->image;
                    }

                    return '<a href="/admin/delete/industry/'.$row->id.'/'.$image.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/edit-industry/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.industries.index'); // Return the view for non-AJAX requests
    }

    public function create(Request $request)
    {
        if ($request->post()) {
            $validated = $request->validate([
                'title' => 'required|',
                // 'description' => 'nullable|string',
                // 'long_description' => 'nullable|string',
                // 'image' => 'nullable|image|max:2048',
                // 'baner_img' => 'nullable|baner_img|',
            ]);
            $Service = new Service();
            $Service->title = $request->title;
            if ($request->slug) {
                $Service->slug = $request->slug;

            } else {
                $Service->slug = Str::slug($request->title);

            }
            // $Service->category = $request->category;
            $Service->description = $request->description;
            $Service->meta_title = $request->meta_title;
            $Service->meta_tags = $request->meta_tags;
            $Service->meta_description = $request->meta_description;
            $Service->short_description = $request->short_description;
            $Service->cmstitle = $request->cmstitle;
            $Service->status = $request->status;
            $Service->faq_status = $request->faq_status;
            $Service->featured = $request->featured;

            $lists = [];
            foreach ($request->faqtitle as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'dec' => $request->dec[$key],
                ];
            }

            $Service->lists = json_encode($lists);
            
            if ($request->image) {
                $imageName = rand().time().'.'.$request->image->extension();
                $request->image->move(public_path('/Service-image'), $imageName);
                $Service->image = $imageName;
            }

            if ($request->icon) {
                $imageName = rand().time().'.'.$request->icon->extension();
                $request->icon->move(public_path('/Service-image'), $imageName);
                $Service->icon = $imageName;
            }
            if ($request->baner_img) {
                $imageName = rand().time().'.'.$request->baner_img->extension();
                $request->baner_img->move(public_path('/Service-Banner-image'), $imageName);
                $Service->baner_img = $imageName;
            }
            $Service->save();

            return redirect('admin/services-list')->with('success', 'Created Successfully');
        }

        return View('admin/services/add');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::query()->with('get_Category')->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('Service-image/'.$row->image)
                    : url('images/default.png');
                })
                ->addColumn('category', function ($row) {
                    return $row->get_Category->title ?? 'N/A'; // Assuming the category relationship
                })

                ->addColumn('action', function ($row) {
                    return '<a href="/admin/services-delete/'.$row->id.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/services-update/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.services.index'); // Return the view for non-AJAX requests
    }

    public function update(Request $request, $id)
    {

        $service = Service::find($id);
        $categories = Category::where('status', 'Y')->where('type', 'service')->get();

        if ($request->post()) {

            $service->title = $request->title;
               $service->cmstitle = $request->cmstitle;
            // $service->category = $request->category;
            $service->description = $request->description;
            $service->meta_title = $request->meta_title;
            $service->meta_tags = $request->meta_tags;
            $service->meta_description = $request->meta_description;
            $service->short_description = $request->short_description;
            $service->status = $request->status;
            $service->featured = $request->featured;
            $service->faq_status = $request->faq_status;

            $lists = [];
            foreach ($request->faqtitle as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'dec' => $request->dec[$key],
                ];
            }


            $service->lists = json_encode($lists);

            
            $slug = Str::slug($request->title);
            
            $service->slug = Str::slug($request->slug);

            if ($request->hasFile('image')) {
                if ($service->image && file_exists(public_path('Service-image/'.$service->image))) {
                    unlink(public_path('Service-image/'.$service->image));  // Delete the old image
                }
                $imageName = rand().time().'.'.$request->image->extension();
                $request->image->move(public_path('Service-image'), $imageName);
                $service->image = $imageName;
            }

            if ($request->hasFile('icon')) {
                if ($service->icon && file_exists(public_path('Service-image/'.$service->icon))) {
                    unlink(public_path('Service-image/'.$service->icon));  // Delete the old image
                }
                $imageName = rand().time().'.'.$request->icon->extension();
                $request->icon->move(public_path('Service-image'), $imageName);
                $service->icon = $imageName;
            }

            if ($request->hasFile('baner_img')) {
                if ($service->baner_img && file_exists(public_path('Service-Banner-image/'.$service->baner_img))) {
                    unlink(public_path('Service-Banner-image/'.$service->baner_img));  // Delete the old image
                }
                $imageName = rand().time().'.'.$request->baner_img->extension();
                $request->baner_img->move(public_path('Service-Banner-image'), $imageName);
                $service->baner_img = $imageName;
            }
            $service->save();

            return redirect()->route('services-list')->with('success', 'Update Successfully');
        }

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function delete(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service->image) {
            unlink(public_path('Service-image/'.$service->image));
        }
        if ($service->baner_img) {
            unlink(public_path('Service-Banner-image/'.$service->baner_img));
        }

        $service->delete();

        return redirect()->route('services-list')->with('success', 'Delete Successfully');
    }
}