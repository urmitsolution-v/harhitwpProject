<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\Conversation;



class ContactController extends Controller
{   
    public function contactCreate()
    {
        // $contact = Contact::get();
        // $contact = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.Contacts.contact');
    }

    public function contactenquires(Request $request){

        if ($request->ajax()) {
            $data = Contact::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    // Format the created_at column
                    return Carbon::parse($row->created_at)->format('d F Y h.i A');
                })
                ->addColumn('action', function ($row) {
                    $createdAt = Carbon::parse($row->created_at)->format('d F Y h.i A');
                    return '<a href="/admin/contact-delete/'.$row->id.'" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="fa-solid fa-trash"></i>
        </a>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="viewContact(\''.$row->name.'\', \''.$row->email.'\', \''.$row->message.'\' ,\''.$row->phone.'\', \''.$createdAt.'\')">
            <i class="fa-solid fa-eye"></i>
        </button>
        ';

                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }

        
        return view('admin.contactenquires');
    }


    public function contactdata()
    {
        // $contact = Contact::get();
        $contact = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', compact('contact'));
    }
    public function delete(Request $request, $id)
    {
        $contact = Contact::findorfail($id);
        $contact->delete();

        return redirect()->route('contactenquires')->with('success', 'Delete Successfully');
    }

    public function subscription(Request $request)
    {
         if ($request->ajax()) {
            $data = Subscriber::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    // Format the created_at column
                    return Carbon::parse($row->created_at)->format('d F Y h.i A');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="/admin/delete/subscribers/'.$row->id.'/no_image" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="fa-solid fa-trash"></i></i>
        </a>';

                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
      return view('admin.subscription');
    }


    public function conversations(){
        return view('admin.conversations');
    }
 
   public function fetchConversations(Request $request)
{
 $conversations = Conversation::latest()->paginate(20);

    // if ($request->ajax()) {
        return response()->json([
            'data' => $conversations->items(),
            'pagination' => $conversations->withQueryString()->links('pagination::bootstrap-5')->render(),
        ]);
    // }

}


}