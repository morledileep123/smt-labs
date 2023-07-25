@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('style')
<style type="text/css">
    
</style>
@endsection
@section('content')
<div class="main-content">
   <div class="page-content">
       <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Test</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Test</a></li>
                                <li class="breadcrumb-item active">Test</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Name</label>
                                            <div >
                                                <input type="text" name="name" class="form-control" value="" aria-describedby="subjectHelp" placeholder="Enter Name">
                                                <small class="form-hint"></small>
                                                <span class="p">
                                                    @error('name')
                                                    {{$message}}
                                                    @enderror
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Mobile Number</label>
                                            <div >
                                                <input type="text" name="mobile" class="form-control" value="" aria-describedby="subjectHelp" placeholder="Enter Mobile Number">
                                                <small class="form-hint"></small>
                                                <span class="p">
                                                    @error('mobile')
                                                    {{$message}}
                                                    @enderror
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Email</label>
                                            <div >
                                                <input type="email" name="email" class="form-control" value="" aria-describedby="subjectHelp" placeholder="Enter Email">
                                                <small class="form-hint"></small>
                                                <span class="p">
                                                    @error('email')
                                                    {{$message}}
                                                    @enderror
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Password</label>
                                            <div >
                                                <input type="text" name="password" class="form-control" value="" aria-describedby="subjectHelp" placeholder="Enter Password">
                                                <small class="form-hint"></small>
                                                <span class="p">
                                                    @error('password')
                                                    {{$message}}
                                                    @enderror
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@section('javascript')
<script type="text/javascript">

</script>

@endsection