@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <section id="comments">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                          <li class="breadcrumb-item"><a href="{{route('dash')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                          <li class="breadcrumb-item active" aria-current="page">Comments</li>
                        </ol>
                      </nav>
                    <h1 class="mb-0 fw-bold">Comments</h1> 
                </div>
            </div>
        </div>
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
                                        <form  style="position: relative; left: 47%;" action="{{route('comment.destroy',[$comment->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        <button type="submit" style="border: none;"><i class="fas fa-trash-alt recycle-bin-icon" style="font-size: 30px; color: rgb(255, 45, 45);"></i></button>
                                      </form>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
        <!-- Recent comment and chats -->
    </section>
</div>
@endsection