<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Mail\ConversationUserMail;
use App\Mail\ConversationAdminMail;
use Illuminate\Support\Facades\Mail;

class ConversationController extends Controller
{
  
      public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'organization' => 'nullable|string|max:150',
            'message' => 'required|string',
        ]);

        $conversation = Conversation::create($request->all());

        // Send email to user
        Mail::to($conversation->email)->send(new ConversationUserMail($conversation));

        // // Send email to admin
        Mail::to(config('mail.admin_address', 'admin@example.com'))->send(new ConversationAdminMail($conversation));

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!'
        ]);
    }
    
}