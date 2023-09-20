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
                      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1> 
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
                            <a href="{{route('post.index')}}"><button class="btn btn-primary">See More</button></a>
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
    <section id="comments">
<!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Comments</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        @foreach ($comments as $comment)
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{$comment->name}}</h6>
                                <span class="m-b-15 d-block">{{$comment->content}}</span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{$comment->created_at}}</span> <span
                                        class="badge bg-primary">{{$comment->rating}}</span> <span
                                        class="action-icons">
                                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                        <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                        <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{route('comment.index')}}"><button class="btn btn-primary">See More</button></a>
                </div>
            </div>
            <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Inbox Messages</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- inbox Row -->
                    @foreach ($inbox as $message)
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h5 class="font-medium">Name:: {{$message->name}}</h5>
                            <h6 class="font-medium">Subject:: {{$message->subject}}</h6>
                            <span class="m-b-15 d-block">Message:: {{$message->message}}</span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">Date:: {{$message->created_at}}</span>
                                 <span class="badge bg-primary">{{$message->email}}</span> 
                                 <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{route('inbox.index')}}"><button class="btn btn-primary">See More</button></a>
            </div>
        </div>
    </section>


</div>
@endsection