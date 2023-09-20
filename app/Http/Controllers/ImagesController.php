<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show()
    {
        // Retrieve and display a specific resource
    }

    public function edit()
    {
        // Return a view to edit an existing resource
    }

    public function update(Request $request)
    {
        // Handle the update of an existing resource
    }

    public function destroy(Request $request)
    {
        DB::delete('delete from images where id = ?', [$request->img_id]);
        return redirect()->action([PostController::class, 'index']);
        // Handle the deletion of a specific resource
    }
}
