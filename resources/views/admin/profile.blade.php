@extends('admin.layout.app') <!-- Extend the master layout -->
@section('content') <!-- Define the content specific to this page -->
<div class ="container  mt-5">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="{{route('dash')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Profile</h1> 
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
                                            <h4 class="card-title">Profile</h4>
                                            <h5 class="card-subtitle">Information About Admin</h5>
                                        </div>
                                    </div>
                                    <!-- title -->
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover align-middle text-nowrap">
                                            
                                                <tr>
                                                    <th class="border-top-0"><label class="badge bg-info">ID</label></th>
                                                    <td class="border-top-0"><div class="m-r-10"><a
                                                        class="btn btn-circle d-flex btn-info text-white">{{$profile->id}}</a>
                                                </div></td>
                                                </tr>
                                                <tr>
                                                    <th class="border-top-0"><label class="badge bg-info">Name</label></th>
                                                    <td class="border-top-0"><label class="badge bg-info">{{$profile->name}}</label></td>
                                                </tr>
                                                <tr>
                                                    <th class="border-top-0"><label class="badge bg-info">Email</label></th>
                                                    <td class="border-top-0"><label class="badge bg-info">{{$profile->email}}</label></td>
                                                </tr>
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