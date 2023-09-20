<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{
    public function index()
    {
        $inbox = Inbox::orderBy('created_at', 'desc')->get();
        return view('admin.inbox', compact('inbox'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $inbox = new inbox();
        $inbox->name = $request->name;
        $inbox->email = $request->email;
        $inbox->subject = $request->subject;
        $inbox->message = $request->message;
        $inbox->save();
        return redirect('/')->with('send', 'your message has been receved we will contact you shortly');
    }

    public function show()
    {
        // Retrieve and display a specific resource
    }

    public function edit()
    {
        // Return a view to edit an existing resource
    }

    public function update(Request $request,)
    {
        // Handle the update of an existing resource
    }

    public function destroy(Request $request, int $message_id)
    {

        DB::delete('delete from inboxes where id = ?', [$message_id]);
        return redirect()->action([InboxController::class, 'index']);
        // Handle the deletion of a specific resource
    }
}
