<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables; // Correct import for Yajra DataTables

class WorkController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => 'required|string',
                // 'description' => 'required',
                // 'status' => 'required|in:Y,N',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $work = new Work();
            $work->title = $validatedData['title'];
            $work->description = $request->description;
            $work->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('/work-image'), $imageName);
                $work->image = $imageName;
            }
            $work->save();

            return redirect('/admin/whychooseus')->with('success', 'Created Successfully');
        }

        return view('admin.works.add');
    }

    public function edit(Request $request, $id)
    {
        $work = Work::find($id);

        if ($request->post()) {
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'destination' => ['required'],
            //     'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // ]);
            $work->title = $request->title;
            $work->description = $request->description;
            $work->status = $request->status;
            if ($request->hasFile('image')) {
                if ($work->image && file_exists(public_path('work-image/'.$work->image))) {
                    unlink(public_path('work-image/'.$work->image));  // Delete the old image
                }
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('work-image'), $imageName);
                $work->image = $imageName;
            }
            $work->save();

            return redirect('/admin/whychooseus')->with('success', 'Updated Successfully');
        }

        return view('admin.works.edit', compact('work'));
    }

    public function delete(Request $request, $id)
    {
        $work = Work::find($id);

        if ($work->image) {
            unlink(public_path('work-image/'.$work->image));
        }

        $work->delete();

        return redirect()->route('whychooseus')->with('success', 'Delete Successfully');
    }

    public function work(Request $request)
    {

        if ($request->ajax()) {
            $data = Work::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('work-image/'.$row->image)
                    : url('images/default.png');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="/admin/delete-work/'.$row->id.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/edit-whychooseus/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.works.index');
    }
}
