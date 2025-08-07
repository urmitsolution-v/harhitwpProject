<?php

namespace App\Http\Controllers;
use App\Models\InclusivityPulse;
use App\Models\InclusivityPulseEditor;
use App\Models\InclusivityPulseTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InclusivityPulseController extends Controller
{
   public function submitpulse(Request $request)
{
    
    
    $request->validate([
        'banner_title' => 'nullable',
        'banner_subdescription' => 'nullable|string',
        'banner_image' => 'nullable|max:2048',

        'content_title' => 'nullable',
        'content_description' => 'nullable|string',
        'content_image' => 'nullable|max:2048',
        'content_layout' => 'nullable|in:left,right',

        'timeline_title' => 'nullable',
        'timeline_image' => 'nullable|max:2048',

        'meta_title' => 'nullable',
        'meta_tags' => 'nullable',
        'meta_description' => 'nullable|string',

        'editor_layouts.*' => 'nullable|string',
        'editor_contents.*' => 'nullable|string',
        
        // 'team_members' => 'nullable|array',
        // 'team_members.*' => 'exists:team,id',
        
        'team_members' => 'nullable|array',
'team_members.*.name' => 'required|string|max:255',
'team_members.*.position' => 'nullable|string|max:500',
'team_members.*.image' => 'nullable|max:2048',

    ]);



    DB::beginTransaction();

    try {
        $pulse = InclusivityPulse::first() ?? new InclusivityPulse();

        // Banner Section
        $pulse->banner_title = $request->banner_title;
        $pulse->banner_subdescription = $request->banner_subdescription;
        if ($request->hasFile('banner_image')) {
            if ($pulse->banner_image && file_exists(public_path($pulse->banner_image))) {
                unlink(public_path($pulse->banner_image));
            }
            $image = $request->file('banner_image');
            $imageName = time() . '_banner_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/dpi'), $imageName);
            $pulse->banner_image = 'uploads/dpi/' . $imageName;
        }

        // Content Section
        $pulse->content_title = $request->content_title;
        $pulse->content_description = $request->content_description;
        $pulse->content_layout = $request->content_layout;
        if ($request->hasFile('content_image')) {
            if ($pulse->content_image && file_exists(public_path($pulse->content_image))) {
                unlink(public_path($pulse->content_image));
            }
            $image = $request->file('content_image');
            $imageName = time() . '_content_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/dpi'), $imageName);
            $pulse->content_image = 'uploads/dpi/' . $imageName;
        }
   
   
        $pulse->cms_editor = $request->cms_editor;
        $pulse->cms_title = $request->cms_title;
        if ($request->hasFile('cms_image')) {
            if ($pulse->cms_image && file_exists(public_path($pulse->cms_image))) {
                unlink(public_path($pulse->cms_image));
            }
            $image = $request->file('cms_image');
            $imageName = time() . '_content_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/dpi'), $imageName);
            $pulse->cms_image = 'uploads/dpi/' . $imageName;
        }


        $pulse->timeline_title = $request->timeline_title;
        if ($request->hasFile('timeline_image')) {
            if ($pulse->timeline_image && file_exists(public_path($pulse->timeline_image))) {
                unlink(public_path($pulse->timeline_image));
            }
            $image = $request->file('timeline_image');
            $imageName = time() . '_timeline_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/dpi'), $imageName);
            $pulse->timeline_image = 'uploads/dpi/' . $imageName;
        }

        // SEO Section
        $pulse->meta_title = $request->meta_title;
        $pulse->meta_tags = $request->meta_tags;
        $pulse->meta_description = $request->meta_description;

        $pulse->save();

        // Remove existing editors and add new ones
        InclusivityPulseEditor::where('inclusivity_pulse_id', $pulse->id)->delete();

        if ($request->editor_layouts && $request->editor_contents) {
            foreach ($request->editor_layouts as $key => $layout) {
                $content = $request->editor_contents[$key] ?? null;
                if ($layout && $content) {
                    InclusivityPulseEditor::create([
                        'inclusivity_pulse_id' => $pulse->id,
                        'editor_layout' => $layout,
                        'editor_content' => $content,
                    ]);
                }
            }
        }

        // Sync team members
        // $pulse->teams()->sync($request->team_members ?? []);
        
        
        // Delete existing related teams if stored separately

// Step 1: Fetch all old team member IDs from DB
$existingTeamMembers = InclusivityPulseTeam::where('inclusivity_pulse_id', $pulse->id)->get()->keyBy('id');

// Step 2: Keep track of current member IDs from the form
$currentTeamMemberIds = [];

if ($request->has('team_members')) {
    foreach ($request->team_members as $member) {
        $imagePath = null;
        $memberId = $member['id'] ?? null;

        // Update existing member
        if ($memberId && isset($existingTeamMembers[$memberId])) {
            $existing = $existingTeamMembers[$memberId];

            // If new image provided, delete old image
            if (isset($member['image']) && $member['image'] instanceof \Illuminate\Http\UploadedFile) {
                if ($existing->image && file_exists(public_path($existing->image))) {
                    unlink(public_path($existing->image));
                }

                $image = $member['image'];
                $imageName = time() . '_team_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/dpi'), $imageName);
                $imagePath = 'uploads/dpi/' . $imageName;
            } else {
                $imagePath = $existing->image;
            }

            $existing->update([
                'name' => $member['name'],
                'position' => $member['position'],
                'company' => $member['company'],
                'image' => $imagePath,
            ]);

            $currentTeamMemberIds[] = $memberId;
        }
        // Create new member
        else {
            if (isset($member['image']) && $member['image'] instanceof \Illuminate\Http\UploadedFile) {
                $image = $member['image'];
                $imageName = time() . '_team_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/dpi'), $imageName);
                $imagePath = 'uploads/dpi/' . $imageName;
            }

            $new = InclusivityPulseTeam::create([
                'inclusivity_pulse_id' => $pulse->id,
                'name' => $member['name'],
                'position' => $member['position'],
                'company' => $member['company'],
                'image' => $imagePath,
            ]);

            $currentTeamMemberIds[] = $new->id;
        }
    }
}

// Step 3: Delete team members removed from the form
$membersToDelete = $existingTeamMembers->keys()->diff($currentTeamMemberIds);

foreach ($membersToDelete as $idToDelete) {
    $member = $existingTeamMembers[$idToDelete];
    if ($member->image && file_exists(public_path($member->image))) {
        unlink(public_path($member->image));
    }
    $member->delete();
}



        DB::commit();

        return redirect()->back()->with('success', 'Inclusivity Pulse updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Something went wrong. ' . $e->getMessage());
    }
} 
}