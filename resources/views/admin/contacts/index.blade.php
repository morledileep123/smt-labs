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
                    <h5 class="card-title">All Contacts<span class="text-muted fw-normal ms-2">({{ $arrayLength}})</span></h5>
    
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                                <li class="breadcrumb-item active">User Contact List</li>
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
                    <th scope="col">Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Code</th>
                    <th scope="col">Country</th>
                    <th scope="col">Descreption</th>
                    <th scope="col">Created Date</th>
                    <th style="width: 80px; min-width: 80px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($addcontact as $contact)
                      <tr>
                        <!-- <th scope="row">
                            <div class="form-check font-size-16">
                                <input type="checkbox" class="form-check-input" id="contacusercheck11">
                                <label class="form-check-label" for="contacusercheck11"></label>
                            </div>
                        </th> -->
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->username}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_code}}</td>
                        <td>{{$contact->country}}</td>
                        <td>{{$contact->description}}</td>
                        <td>{{$contact->createDate}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
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
     })
   });
</script>

@endsection