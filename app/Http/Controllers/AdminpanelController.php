<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use App\Models\Usertype;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class AdminpanelController extends Controller
{
    public function updateprofileadmin(Request $request)
    {
        if ($request->method() == 'POST') {

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'destination' => 'required',
                'phone' => 'required|digits:10',
            ]);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'destination' => $request->destination,
                'phone' => $request->phone,
            ];

            $userid = Auth::user()->id;

            if ($request->image) {
                $user = User::find($userid);
                $user->image = uploadImage($request->image, $user, 'image');
                $user->save();
            }
            DB::table('users')->where('id', $userid)->update($data);

            return redirect()->back()->with('success', 'Successfully Updated.');
        }
    }
public function dashboard(Request $request)
{
    $filter = $request->get('filter', '30_days'); // default to last 30 days

    switch ($filter) {
        case 'today':
            $startDate = Carbon::today();
            break;
        case 'this_week':
            $startDate = Carbon::now()->startOfWeek();
            break;
        case 'this_month':
            $startDate = Carbon::now()->startOfMonth();
            break;
        case '6_months':
            $startDate = Carbon::now()->subMonths(6);
            break;
        case '1_year':
            $startDate = Carbon::now()->subYear();
            break;
        case 'all':
            $startDate = null;
            break;
        default:
            $startDate = Carbon::now()->subDays(30);
    }

    $enquiryQuery = Contact::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->when($startDate, fn($q) => $q->where('created_at', '>=', $startDate))
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

    $dates = $enquiryQuery->pluck('date')->map(fn($date) => Carbon::parse($date)->format('d M'));
    $counts = $enquiryQuery->pluck('count');

    $contact = Contact::latest()->get();

    return view('admin.dashboard', compact('contact', 'dates', 'counts', 'filter'));
}

    public function profile()
    {
        return view('admin.profile');
    }

    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'currunt_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required| min:6',
        ]);

        //Match The Old Password

        if (! Hash::check($request->currunt_password, auth()->user()->password)) {
            return back()->with('error', "Currunt Password Doesn't match!");
        }
        //Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully!');
    }

    public function createuser(Request $request)
    {

        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $type = 'customer';
                $title = 'Customer';
            } elseif ($_GET['type'] == 'team') {
                $type = 'team';
                $title = 'Team';

            } elseif ($_GET['type'] == 'project_manager') {
                $type = 'project_manager';
                $title = 'Project Manager';
            } elseif ($_GET['type'] == 'account_manager') {
                $type = 'account_manager';
                $title = 'Account Manager';
            }
        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid Request Found !');
        }

        if ($request->method() == 'POST') {

            // $validated = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email|unique:users',
            //     'phone' => 'required|digits:10|unique:users',
            //     'company_name' => 'required',
            //     'company_address' => 'required',
            //     'gstin_number' => 'required',
            //     'domain' => 'required',
            //     'password' => 'required|min:6',
            // ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->company_address = $request->company_address;
            $user->gstin = $request->gstin_number;
            $user->domain = $request->domain;
            $user->password = Hash::make($request->password);
            $user->codeid = $request->password;

            if ($request->image) {
                $user->image = uploadImage($request->image, $user, 'image');
            }

            if ($_GET['type'] == 'team') {
                $user->customer_type_id = $request->customertype;
                $user->role = 'team';
            }

            if ($user->save()) {
                if ($_GET['type'] == 'customer') {
                    return redirect('admin/users-list?type=customer')->with('success', 'Customer Created Successfully');
                } elseif ($_GET['type'] == 'team') {
                    return redirect('admin/users-list?type=team')->with('success', 'Team Created Successfully');
                } elseif ($_GET['type'] == 'project_manager') {
                    return redirect('admin/users-list?type=project_manager')->with('success', 'Project Manager Created Successfully');
                } elseif ($_GET['type'] == 'account_manager') {
                    return redirect('admin/users-list?type=account_manager')->with('success', 'Account Manager Created Successfully');
                }
            }
        }

        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            return view('admin.usersmanagement.create', compact('title'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid Request Found !');
        }

    }

    public function users_list()
    {

        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $user = User::where('role', 'customer')->get();
                $title = 'Customer ( Partner )';
                $type = 'customer';
            } elseif ($_GET['type'] == 'team') {
                $user = User::where('role', 'team')->get();
                $title = 'Team';
                $type = 'team';
            } elseif ($_GET['type'] == 'project_manager') {
                $user = User::where('role', 'project_manager')->get();
                $title = 'Project Manager';
                $type = 'project_manager';
            } elseif ($_GET['type'] == 'account_manager') {
                $user = User::where('role', 'account_manager')->get();
                $title = 'Account Manager';
                $type = 'account_manager';
            }

            return view('admin.usersmanagement.index', compact('user', 'title', 'type'));

        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid Request Found !');
        }
    }

    public function edit_users(Request $request, $id)
    {

        $user = User::findOrFail($id);
        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $type = 'customer';
                $title = 'Customer';
            } elseif ($_GET['type'] == 'team') {
                $type = 'team';
                $title = 'Team';
            } elseif ($_GET['type'] == 'project_manager') {
                $type = 'project_manager';
                $title = 'Project Manager';
            } elseif ($_GET['type'] == 'account_manager') {
                $type = 'account_manager';
                $title = 'Account Manager';
            }
        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid Request Found !');
        }

        if ($request->method() == 'POST') {
            // $validated = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'phone' => 'required|digits:10',
            //     'company_name' => 'required',
            //     'company_address' => 'required',
            //     'gstin_number' => 'required',
            //     'domain' => 'required',
            //     'customertype' => 'required',
            // ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->company_address = $request->company_address;
            $user->gstin = $request->gstin_number;
            $user->domain = $request->domain;
            if ($request->image) {
                $user->image = updateImage($request->image, $user, 'image');
            }
            if ($_GET['type'] == 'team') {
                $user->customer_type_id = $request->customertype;
            }
            if (! empty($request->password)) {
                $user->codeid = $request->password;
                $user->password = Hash::make($request->password);
            }
            $user->codeid = $request->password;
            if ($user->save()) {
                if ($_GET['type'] == 'customer') {
                    return redirect('admin/users-list?type=customer')->with('success', 'Customer Updated Successfully');
                } elseif ($_GET['type'] == 'team') {
                    return redirect('admin/users-list?type=team')->with('success', 'Team Updated Successfully');
                } elseif ($_GET['type'] == 'project_manager') {
                    return redirect('admin/users-list?type=project_manager')->with('success', 'Project Manager Updated Successfully');
                } elseif ($_GET['type'] == 'account_manager') {
                    return redirect('admin/users-list?type=account_manager')->with('success', 'Account Manager Updated Successfully');
                }
            }
        }

        return view('admin.usersmanagement.edituser', compact('user', 'title'));
    }

    // --customers-types

    public function customertypes()
    {
        $data = Usertype::get();

        return view('admin.customerstype', compact('data'));
    }

    public function usertypecreate(Request $request)
    {
        $validated = $request->validate([
            'user_type' => 'required',
            'status' => 'required',
        ]);
        $usertype = new Usertype;
        $usertype->type = $request->user_type;
        $usertype->status = $request->status;
        if ($usertype->save()) {
            return redirect()->back()->with('success', 'Created Successfully');
        }
    }

    public function editusertype(Request $request)
    {
        $id = $request->usertypeid;
        $usertype = Usertype::find($id);
        $usertype->type = $request->user_type;
        if ($usertype->save()) {
            return redirect()->back()->with('success', 'Updated Successfully');
        }
    }

    public function customerslist()
    {

        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $user = DB::table('users')->where('users.role', '!=', 'admin')
                    ->where('users.role', 'customer')->get();
                $title = 'Customer ( Partner )';
                $type = 'customer';
            } elseif ($_GET['type'] == 'team') {
                $user = DB::table('users')
                    ->join('user_types', function ($join) {
                        $join->on('users.customer_type_id', '=', 'user_types.id')
                            ->where('users.role', '!=', 'admin')
                            ->where('users.role', 'team');
                    })
                    ->select('users.*', 'user_types.type', 'user_types.id as usertypeid')
                    ->get();
                $title = 'Team';
                $type = 'team';
            } elseif ($_GET['type'] == 'project_manager') {
                $user = User::where('role', 'project_manager')->get();
                $title = 'Project Manager';
                $type = 'project_manager';
            } elseif ($_GET['type'] == 'account_manager') {
                $user = User::where('role', 'account_manager')->get();
                $title = 'Account Manager';
                $type = 'account_manager';
            }

            return view('admin.usersmanagement.index', compact('user', 'title', 'type'));

        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid Request Found !');
        }

    }

    // ---------common-functions--------

    public function changestatus($table, $id, $colom, $value)
    {
        DB::table($table)->where('id', $id)->update([$colom => $value]);

        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function deleterow($table, $id)
    {
        DB::table($table)->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // --view-users---

    public function viewusers_admin(Request $request, $id)
    {
        if (isset($_GET['type']) && ! empty($_GET['type'])) {
            if ($_GET['type'] == 'team') {
                $user = User::find($id);
                $data = DB::table('projectasign')
                // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
                    ->join('projects', 'projectasign.project_id', '=', 'projects.id')
                    ->join('projectasignuser', 'projectasign.id', '=', 'projectasignuser.project_id')
                    ->where('projectasignuser.user_id', $id)
                    ->select('projectasign.*', 'projectasignuser.*', 'projects.name as project_name')
                    ->get();

                //   $data = DB::table('projectasign')
                // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
                // ->join('projects', 'projectasign.project_id', '=', 'projects.id')
                // ->join('projectasignuser', 'projectasign.id', '=', 'projectasignuser.project_id')
                // ->where('projectasignuser.user_id',$id)
                // ->select('projectasign.*', 'projectstatus.id as status_id','projectasignuser.*','projectstatus.name as status_name','projects.name as project_name')
                // ->get();

                //   echo "<pre>";
                // print_r($data);
                // die;

                return view('admin.usersmanagement.viewteaminfo', compact('user', 'data'));

            } elseif ($_GET['type'] == 'customer') {
                $user = User::find($id);
                $data = DB::table('projectasign')
                // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
                    ->join('projects', 'projectasign.project_id', '=', 'projects.id')
                    ->where('projectasign.customer_id', $id)
                    ->select('projectasign.*', 'projects.name as project_name')
                    ->get();

                //  $data = DB::table('projectasign')
                // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
                // ->join('projects', 'projectasign.project_id', '=', 'projects.id')
                // ->where('projectasign.customer_id',$id)
                // ->select('projectasign.*', 'projectstatus.id as status_id','projectstatus.name as status_name','projects.name as project_name')
                // ->get();

                // echo "<pre>";
                // print_r($data);
                // die;

                return view('admin.usersmanagement.viewcustomerinfo', compact('user', 'data'));
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}