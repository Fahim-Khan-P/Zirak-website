@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="{{route('dash')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Inbox</h1> 
            </div>
        </div>
    </div>
    <section>
<!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
            <!-- column -->
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
                                    <form action="{{route('inbox.destroy',[$message->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt recycle-bin-icon"></i></button>
                                  </form>
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


</div>
@endsection