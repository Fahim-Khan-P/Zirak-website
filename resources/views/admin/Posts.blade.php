@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }
    
        .table td {
            max-width: 155px;
            max-height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="{{route('dash')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Posts</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Posts</h1> 
            </div>
        </div>
    </div>
    <section id="posts">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex justify-content-between">
                                <div>
                                    <h4 class="card-title">Recent Posts</h4>
                                    <h5 class="card-subtitle">Overview of Recent Posts</h5>
                                </div>
                                <div ><a href="{{route('admin.new')}}"><button class="btn btn-primary">New Post</button></a></div>
                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Operations</th>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Started At</th>
                                            <th class="border-top-0">Ended At</th>
                                            <th class="border-top-0">Dari Content</th>
                                            <th class="border-top-0">Pashto Content</th>
                                            <th class="border-top-0">English Content</th>
                                            <th class="border-top-0">Created At</th>
                                            <th class="border-top-0">Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <form action="{{route('post.destroy',[$post->id])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit">Delete</button>
                                              </form>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.change')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <input type="submit" value="Update">
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a
                                                            class="btn btn-circle d-flex btn-info text-white">{{$post->id}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$post->title}}</td>
                                            <td><label class="badge bg-info">{{$post->started_at}}</label></td>
                                            <td>
                                                <label class="badge bg-info">{{$post->ended_at}}</label>
                                            </td>
                                            <td>{{$post->content_fa}}</td>
                                            <td>{{$post->content_ps}}</td>
                                            <td>
                                                <h5 class="m-b-0">{{$post->content}}</h5>
                                            </td>
                                            <td><label class="badge bg-info">{{$post->created_at}}</label></td>
                                            <td><label class="badge bg-info">{{$post->updated_at}}</label></td>
                                        </tr>
                                        
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Table -->
    </section>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
</div>
@endsection