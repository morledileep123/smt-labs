@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<style type="text/css">
    
</style>
@endsection
@section('content')
<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <!-- end page title -->
        
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h5 class="card-title">All Blogs <span class="text-muted fw-normal ms-2">({{ $arrayLength}})</span></h5>
    
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('create-blog')}}">Add New Blog</a></li>
                                <li class="breadcrumb-item active">Blogs</li>
                            </ol>
                        </div>
    
                    </div>
                </div>
            </div>
        
            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                <thead>
                  <tr>
                    <!-- <th scope="col" style="width: 50px;">
                        <div class="form-check font-size-16">
                            <input type="checkbox" class="form-check-input" id="checkAll">
                            <label class="form-check-label" for="checkAll"></label>
                        </div>
                    </th> -->
                    <th scope="col">blog Image</th>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Created Date</th>
                    <th style="width: 80px; min-width: 80px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($addblog as $blog)
                    <tr>
                        <!-- <th scope="row">
                            <div class="form-check font-size-16">
                                <input type="checkbox" class="form-check-input" id="contacusercheck11">
                                <label class="form-check-label" for="contacusercheck11"></label>
                            </div>
                        </th> -->
                        <td><img src="{{ url('public/blog-image/'.$blog->image_name) }}"
                            style="height: 100px; width: 150px;">
                        </td>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->description}}</td>
                        <td>{{$blog->type}}</td>
                        <td>{{$blog->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{route('blog-edit', $blog->id)}}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{route('blog-destroy', $blog->id)}}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                </tbody>
            </table>
            <!-- end table -->
        </div>
        <!-- end table responsive -->
        
    </div> <!-- container-fluid -->
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@section('javascript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready(function (e) {
     $('#datatable').DataTable({
        pageLength:5
     });
   });
</script>

@endsection