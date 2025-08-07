<?php

namespace App\Http\Controllers\Admin;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamsController extends Controller
{
    public function team(Request $request)
    {
        if ($request->ajax()) {
            $data = Team::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image
                    ? url('team-image/'.$row->image)
                    : url('images/default.png');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="/admin/delete-team/'.$row->id.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
           <i class="fa-solid fa-trash"></i>
        </a>
        <a href="/admin/edit-team/'.$row->id.'"  class="btn btn-sm btn-primary">
           <i class="fa-solid fa-pen"></i>
        </a>';

                })
             ->addColumn('team_type', function ($row) {
    $type = $row->team_type;
    $badge = '';

    if ($type == 'is_team') {
        $badge = '<span class="badge bg-success">Teams</span>';
    } elseif ($type == 'investment_committee') {
        $badge = '<span class="badge bg-primary">Investment Committee</span>';
    } elseif ($type == 'technical_adviser') {
        $badge = '<span class="badge bg-danger">Technical Advisors</span>';
    }
    return $badge ;
})
                ->rawColumns(['image', 'action','team_type'])
                ->make(true);
        }

        return view('admin.teams.index');
    }

    public function create(Request $request)
    {
        // Check if the form is submitted via POST method
        if ($request->isMethod('post')) {

            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'sub_title' => 'required|string',
                'bio' => 'nullable',
                'status' => 'required|in:Y,N',
                'team_type' => 'required',
                'image' => 'nullable|max:2048',
            ]);

            $team = new Team();
            $team->slug = Str::slug($request->name);
            $team->name = $validatedData['name'];
            $team->sub_title = $validatedData['sub_title'];
            // $team->show_about = $validatedData['show_about'];
            $team->description = $validatedData['bio'];
            // $team->icon = $validatedData['icon'];
            $team->status = $validatedData['status'];
            $team->team_type = $validatedData['team_type'];
            // $team->phone = $request->phone;
            // $team->email = $request->email;
            // $team->experience = $request->experience;
            // $team->address = $request->address;
            // $team->since = $request->since;
            // $team->description = $request->description;
            // $team->facebook = $request->facebook;
            // $team->twitter = $request->twitter;
            // $team->instagram = $request->instagram;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('/team-image'), $imageName);
                $team->image = $imageName;
            }
            $team->save();

            return redirect('/admin/teams')->with('success', 'Created Successfully');
        }
        return view('admin.teams.add');
    }
    public function editteam(Request $request, $id)
    {
        $team = Team::find($id);

        if ($request->post()) {
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'destination' => ['required'],
            //     'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // ]);
            $team->name = $request->name;
             $team->slug = Str::slug($request->name);
            $team->sub_title = $request->sub_title;
            // $team->show_about = $request->show_about;
            $team->description = $request->bio;
            $team->team_type = $request->team_type;
            // $team->phone = $request->phone;
            // $team->email = $request->email;
            // $team->experience = $request->experience;
            // $team->address = $request->address;
            // $team->facebook = $request->facebook;
            // $team->since = $request->since;
            // $team->description = $request->description;
            // $team->twitter = $request->twitter;
            // $team->instagram = $request->instagram;
            // $team->status = $request->status;
            $slug = Str::slug($request->name);
            if (Team::where('slug', $slug)->where('id', '!=', $team->id)->exists()) {
                $slug = $slug . '-' . uniqid();
            }

            $team->slug = $slug;

            if ($request->hasFile('image')) {
                if ($team->image && file_exists(public_path('team-image/' . $team->image))) {
                    unlink(public_path('team-image/' . $team->image));  // Delete the old image
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('team-image'), $imageName);
                $team->image = $imageName;
            }
            $team->save();
            return redirect('/admin/teams')->with('success', 'Updated Successfully');
        }
        return view('admin.teams.edit', compact('team'));
    }


    public function deleteteam(Request $request, $id)
    {
        $faq = Team::find($id);
        $faq->delete();

        return redirect()->route('teams-list')->with('success', 'Delete Successfully');
    }

    public function editpageteam(Request $request){
         $setting = Info::find(27);
        if($request->method() == "POST"){
             $counters = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ];
           
            if (! $setting) {
                $setting = new Info;  
                $setting->id = 27;
            }
            $setting->info_one = json_encode($counters);

            $setting->save();

            return redirect()->back()->with('success', 'Successfully Updated');
        }
        $row = json_decode($setting->info_one);
        
        return view('admin.teams.page' , compact('setting','row'));
    }
    
    
    public function editpageblog(Request $request){
         $setting = Info::find(28);
        if($request->method() == "POST"){


             $counters = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ];
           
            if (! $setting) {
                $setting = new Info;  
                $setting->id = 28;
            }
            if ($request->hasFile('image')) {
                $setting->image = updateImage($request->file('image'), $setting, 'image');
            }
            
            $setting->info_one = json_encode($counters);
            $setting->save();
            return redirect()->back()->with('success', 'Successfully Updated');
        }
        $row = json_decode($setting->info_one);
        
        return view('admin.blogs.page' , compact('setting','row'));
    }
}