
@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <div class="container col-lg-8">
        <h1>Create a New Post</h1>
        @foreach ($post as $row)
            
        
        <form action="{{ route('post.update',$row->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$row->title}}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{$row->started_at}}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{$row->ended_at}}" required>
            </div>
            <div class="form-group">
                <label for="content">Content English:</label>
                <textarea class="form-control" id="content" name="content" required   rows="5">{{$row->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content Dari:</label>
                <textarea class="form-control" id="content" name="content_fa" required  rows="5">{{$row->content_fa}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content Pashto:</label>
                <textarea class="form-control" id="content" name="content_ps" required  rows="5">{{$row->content_ps}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Add Images For This Post::
                </label>
                <input type="file" class="form-control" id="image" name="images[]" multiple accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
        <div class="">
            @php
                $images = DB::table('images')->where('post_id', $row->id)->get();
            @endphp
            @if ($images->count() > 0)
                @foreach ($images as $image)
                    <img src="{{ asset($image->path)}}" height="50" width="50" alt="Product Image">
                    <form action="{{ route('image.destroy',$image->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="img_id" value="{{$image->id}}">
                    <input class="btn btn-primary btn-sm" type="submit" value="Delete">
                    </form>
                @endforeach
                @php
                if($images->count() > 0)
                $remaining=5-$images->count();
              @endphp
                <p>{{ $images->count() }} image(s) uploaded , you can upload {{$remaining}} more images.</p>
            @else
                <p>No Image Available</p>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection