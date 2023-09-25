
@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <div class="container col-lg-8">
        <h1>Create a New Post</h1>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="content">Content English:</label>
                <textarea class="form-control" id="content" name="content" required  rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content Dari:</label>
                <textarea class="form-control" id="content" name="content_fa" required  rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content Pashto:</label>
                <textarea class="form-control" id="content" name="content_ps" required  rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Add Images For This Post::
                </label>
                <input type="file" class="form-control" id="image" name="images[]" multiple accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
</div>
@endsection