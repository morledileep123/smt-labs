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
                        <h4 class="mb-sm-0 font-size-18">Edit Test</h4>

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
                                            <label class="form-label">Subject Name</label>
                                            <div >
                                                <input type="text" name="subject_name" class="form-control" value="" aria-describedby="subjectHelp" placeholder="Enter subject">
                                                <small class="form-hint"></small>
                                                <span class="p">
                                                    @error('subject_name')
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