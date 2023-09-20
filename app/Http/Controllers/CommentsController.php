<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::orderBy('created_at', 'desc')->get();
        return view('admin.comment', compact('comments'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->name = $request->name;
        $comment->rating = $request->rating;
        $comment->content = $request->message;
        $comment->save();
        return redirect('/')->with('send', 'your comment has been added thank you for your time');
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

    public function destroy(Request $request, int $comment_id)
    {

        DB::delete('delete from comments where id = ?', [$comment_id]);
        return redirect()->action([InboxController::class, 'index']);
        // Handle the deletion of a specific resource
    }
}
