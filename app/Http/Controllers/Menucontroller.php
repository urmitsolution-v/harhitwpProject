<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use Yajra\DataTables\Facades\DataTables;

class Menucontroller extends Controller
{


    // <a href="'.route('menu-tools', $row->id).'" class="btn btn-sm btn-primary">Tools</a>
    //             <a href="/admin/page-builder/'.$row->id.'" class="btn btn-sm btn-info">Page Builder</a>

    public function categories(Request $request){

            if ($request->ajax()) {
            $data = MenuCategory::where('type','category')->select(['id', 'title', 'slug', 'status']);
        return DataTables::of($data)
            ->addIndexColumn()
          
            ->addColumn('status', function ($row) {
                return $row->status === 'Y'
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="'.route('menu-categories.edit', $row->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a onclick="return confirm(\'Are you sure you want to delete this menu?\');" href="'.route('menu-categories.destroy', $row->id).'" class="btn btn-sm btn-danger">Delete</a>
                
                ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    
        return view('admin.menu.categories');
    }

public function newCategory(Request $request)
{
    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:menu_categories,slug',
            'status' => 'required|in:Y,N',
        ]);
        
        $data['type'] = 'category'; 
        MenuCategory::create($data);
        return redirect()->route('menu.categories')->with('success', 'Category created successfully.');
    }

    return view('admin.menu.new-category');
}

public function editCategory(Request $request, $id)
{
    $category = MenuCategory::findOrFail($id);

    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:menu_categories,slug,' . $id,
            'status' => 'required|in:Y,N',
        ]);

        $category->update($data);

        return redirect()->route('menu.categories')->with('success', 'Category updated successfully.');
    }

    return view('admin.menu.edit-category', compact('category'));
    
}


 public function menusubcategories(Request $request)
{
    if ($request->ajax()) {
        $data = MenuCategory::with('parent')
            ->where('type', 'subcategory')
            ->select(['id', 'title', 'slug', 'status', 'parent_category']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('parent_menu', function ($row) {
                return $row->parent ? $row->parent->title : '<em>—</em>';
            })
            ->addColumn('status', function ($row) {
                return $row->status === 'Y'
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="'.route('menu-subcategory.edit', $row->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a onclick="return confirm(\'Are you sure you want to delete this submenu?\');" href="'.route('menu-subcategory.destroy', $row->id).'" class="btn btn-sm btn-danger">Delete</a>
               ';
            })
            ->rawColumns(['status', 'action', 'parent_menu'])
            ->make(true);
    }

    return view('admin.menu.subcategories');
}


public function newsubmenu(Request $request)
{
    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'string|max:255|unique:menu_categories,slug',
            'status' => 'required|in:Y,N',
            'parent_category' => 'required|exists:menu_categories,id',
            'external_link' => 'nullable',
            'link_type' => 'nullable',
        ]);

        $data['type'] = 'subcategory';

        MenuCategory::create($data);

        return redirect()->route('menusubcategories')->with('success', 'Submenu created successfully.');
    }

    $categories = MenuCategory::where('type', 'category')->get();

    return view('admin.menu.new-submenu', compact('categories'));
}

public function editsubmenu(Request $request, $id)
{
    $submenu = MenuCategory::findOrFail($id);

    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'unique:menu_categories,slug,' . $id,
            'status' => 'required|in:Y,N',
            'parent_category' => 'required|exists:menu_categories,id',
            'link_type' => 'nullable',
            'external_link' => 'nullable',
        ]);
        $submenu->update($data);
        return redirect()->route('menusubcategories')->with('success', 'Submenu updated successfully.');
    }
    $categories = MenuCategory::where('type', 'category')->get();
    return view('admin.menu.edit-submenu', compact('submenu', 'categories'));   
}


public function deletemainmenu(Request $request, $id)
{
    $category = MenuCategory::findOrFail($id);

    $subcategories = MenuCategory::where('parent_category', $id)->get();
    if ($subcategories->count() > 0) {
        return redirect()->route('menu.categories')->with('error', 'Cannot delete this category because it has subcategories. Please delete the subcategories first.');
    }
    $category->delete();
    return redirect()->route('menu.categories')->with('success', 'Menu category deleted successfully.');
    
}

public function deletesubmenu(Request $request, $id)
{
    $submenu = MenuCategory::findOrFail($id);
    $submenus = MenuCategory::where('parent_category', $id)->get();   
    $submenu->delete();
    return redirect()->route('menusubcategories')->with('success', 'Submenu deleted successfully.');
}

public function menuTools(Request $request, $id)
{
    if ($request->isMethod('post')) {

        $selected = $request->input('selected_sections', []);
        $positions = $request->input('position', []);

        $data = [];
        $usedPositions = []; // To track used positions
        $lastPosition = 0;

        foreach ($selected as $section) {
            $rawPosition = $positions[$section] ?? null;

            // If not numeric, skip
            if (!is_numeric($rawPosition)) continue;

            $pos = (int) $rawPosition;

            // If already used, assign next available
            while (in_array($pos, $usedPositions)) {
                $pos++;
            }

            $usedPositions[] = $pos;
            $lastPosition = max($lastPosition, $pos);

            $data[] = [
                'section' => $section,
                'position' => $pos,
            ];
        }

        // Sort by position before saving
        usort($data, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        $menu = MenuCategory::findOrFail($id);
        $menu->tools = $data;
        $menu->save();

        return redirect()->route('menu-tools', $id)->with('success', 'Menu tools updated successfully.');
    }

    $menu = MenuCategory::findOrFail($id);
    return view('admin.menu.menu-tools', compact('menu'));
}

public function page_builder(Request $request, $id)
{
    $menu = MenuCategory::findOrFail($id);


    if ($request->isMethod('post')) {
    $menu = MenuCategory::findOrFail($id);

    // Decode existing data for edit fallback
    $existingBreaducump = json_decode($menu->breadcump_data, true) ?? [];

    $breaducump = $request->input('breaducump', []);

    // Handle image upload
    $uploadedPath = uploadImageNew('breaducump.banner_image', 'uploads/banner/');
    if ($uploadedPath) {
        // Delete old image if exists
        if (
            !empty($existingBreaducump['banner_image']) &&
            str_starts_with($existingBreaducump['banner_image'], 'uploads/banner/') &&
            file_exists(public_path($existingBreaducump['banner_image']))
        ) {
            @unlink(public_path($existingBreaducump['banner_image']));
        }

        $breaducump['banner_image'] = $uploadedPath;
    } elseif (!empty($existingBreaducump['banner_image'])) {
        $breaducump['banner_image'] = $existingBreaducump['banner_image'];
    }

    // Sanitize and validate button data
    if (isset($breaducump['buttons']) && is_array($breaducump['buttons'])) {
        $buttons = [];
        foreach ($breaducump['buttons'] as $btn) {
            if (!empty($btn['name']) && !empty($btn['url'])) {
                $buttons[] = [
                    'name' => strip_tags($btn['name']),
                    'url' => strip_tags($btn['url']),
                    'target' => in_array($btn['target'], ['_self', '_blank']) ? $btn['target'] : '_self',
                ];
            }
        }
        $breaducump['buttons'] = $buttons;
    } else {
        // Ensure buttons key exists
        $breaducump['buttons'] = [];
    }

    // Save updated breaducump data
    $menu->breadcump_data = json_encode($breaducump);


      // --- CONTENT SECTIONS LOGIC ---
        $existingSections = json_decode($menu->contentsection, true) ?? [];
        $contentSections = [];

        $submittedSections = $request->input('contentsection', []);

        foreach ($submittedSections as $index => $section) {
            $sectionData = [
                'title' => strip_tags($section['title'] ?? ''),
                'description' => strip_tags($section['description'] ?? ''),
                'lists' => array_map('strip_tags', $section['lists'] ?? []),
                'button' => [
                    'name' => strip_tags($section['button']['name'] ?? ''),
                    'url' => strip_tags($section['button']['url'] ?? ''),
                    'target' => in_array($section['button']['target'] ?? '_self', ['_self', '_blank']) ? $section['button']['target'] : '_self',
                ],
                'design' => in_array($section['design'] ?? 'left-image', ['left-image', 'right-image']) ? $section['design'] : 'left-image',
                'image' => '',
            ];

            // Image Upload for Each Section
            $imageField = "contentsection.$index.image";
            $uploadedImage = uploadImageNew($imageField, 'uploads/section-images/');

            // Old image fallback if not replaced
            if ($uploadedImage) {
                // delete old image if exists
                if (!empty($existingSections[$index]['image']) && file_exists(public_path($existingSections[$index]['image']))) {
                    @unlink(public_path($existingSections[$index]['image']));
                }
                $sectionData['image'] = $uploadedImage;
            } elseif (!empty($existingSections[$index]['image'])) {
                $sectionData['image'] = $existingSections[$index]['image'];
            }

            $contentSections[] = $sectionData;
        }

        $menu->contentsection = json_encode($contentSections);

    $menu->save();

    return redirect()->route('page-builder', ['id' => $id])
                     ->with('success', 'Page builder updated successfully.');
}
    
    $tools = $menu->tools ?? [];

    if (!is_array($tools)) {
        $tools = json_decode($tools, true) ?? [];
    }
    $selectedSections = collect($tools)
        ->pluck('position', 'section')
        ->toArray();

    return view('admin.menu.page-builder', compact('menu', 'selectedSections'));
}


}