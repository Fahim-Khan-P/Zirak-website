<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts', compact('posts'));
    }
    public function new()
    {
        return view('admin.createpost');
    }
    public function change(Request $request)
    {
        $post = DB::table('posts')->where('id', $request->post_id)->get();
        return view('admin.updatepost', compact('post'));
    }
    public function store(Request $request)
    {
        // Handle the storage of a newly created resource
        $image = $request->file('images');
        $post = new Post();
        $post->title = $request->title;
        $post->started_at = $request->start_date;
        $post->ended_at = $request->end_date;
        $post->content = $request->content;
        $post->content_fa = $request->content_fa;
        $post->content_ps = $request->content_ps;
        $post->save();
        $post_id = DB::table('posts')->where('content', $request->content)->where('ended_at', $request->end_date)->where('started_at', $request->start_date)->value('id');
        if ($request->file('images') > 1) {
            foreach ($request->file('images') as $image) {
                $imageName = 'image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('Posts_image'), $imageName);
                images::create([
                    'title' => $request->title,
                    'path' => 'Posts_image/' . $imageName,
                    'post_id' => $post_id
                ]);
            }
        } elseif ($request->file('images') == 1) {
            $imageName = 'image-' . time() . rand(1, 1000) . '.' . $request->file('images')->extension();
            $image->move(public_path('Posts_image'), $imageName);
            images::create([
                'title' => $request->title,
                'path' => 'Posts_image/' . $imageName,
                'post_id' => $post_id
            ]);
        }
        return redirect('admin/dashboard');
    }

    public function show()
    {
        // Retrieve and display a specific resource
    }

    public function edit()
    {
        // Return a view to edit an existing resource
    }

    public function update(Request $request, int $post_id)
    {
        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->started_at =  $request->start_date;
        $post->ended_at = $request->end_date;
        $post->content = $request->content;
        $post->content_fa = $request->content_fa;
        $post->content_ps = $request->content_ps;
        $post->save();

        if ($request->file('images') > 1) {
            foreach ($request->file('images') as $image) {
                $imageName = 'image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('Posts_image'), $imageName);
                images::create([
                    'title' => $request->title,
                    'path' => 'Posts_image/' . $imageName,
                    'post_id' => $post_id
                ]);
            }
        } elseif ($request->file('images') == 1) {
            $imageName = 'image-' . time() . rand(1, 1000) . '.' . $request->file('images')->extension();
            $request->file('images')->move(public_path('Posts_image'), $imageName);
            images::create([
                'title' => $request->title,
                'path' => 'Posts_image/' . $imageName,
                'post_id' => $post_id
            ]);
        }
        return redirect()->action([PostController::class, 'index']);


        // Handle the update of an existing resource
    }

    public function destroy(Post $post)
    {
        $images = DB::select('select path from images where post_id = ?', [$post->id]);
        if ($images) {
            if (is_array($images) && count($images) > 1) {
                foreach ($images as $image) {
                    $path = public_path($image->path);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                DB::delete('delete from images where post_id = ?', [$post->id]);
            } elseif (count($images) == 1) {
                $image = DB::table('images')->where('post_id', $post->id)->value('path');
                $path = public_path($image);
                if (file_exists($path)) {
                    unlink($path);
                    DB::delete('delete from images where post_id = ?', [$post->id]);
                }
            }
        }
        DB::delete('delete from posts where id = ?', [$post->id]);
        return redirect()->action([PostController::class, 'index']);
        // Handle the deletion of a specific resource
    }
}
