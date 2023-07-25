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
                        <h4 class="mb-sm-0 font-size-18">Add Job</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('job')}}">Jobs</a></li>
                                <li class="breadcrumb-item active">Add Job</li>
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
                                    @if (Session::has('error'))
                                        <p class="text-danger">{{ Session::get('error') }}</p>
                                    @endif
                                    @if (Session::has('success'))
                                        <p class="text-success">{{ Session::get('success') }}</p>
                                    @endif
                                    <form action="{{route('store-job')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Job Title</label>
                                            <div >
                                                <input type="text" name="job_title" class="form-control" value="{{old('job_title')}}" aria-describedby="subjectHelp" placeholder="Enter job title">
                                                <small class="form-hint"></small>
                                                @if ($errors->has('job_title'))
                                                    <p class="text-danger">{{ $errors->first('job_title') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Job Experience</label>
                                            <div >
                                                <input type="text" name="job_experience" class="form-control" value="{{old('job_title')}}" aria-describedby="subjectHelp" placeholder="Enter job experience">
                                                <small class="form-hint"></small>
                                                @if ($errors->has('job_experience'))
                                                    <p class="text-danger">{{ $errors->first('job_experience') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Job Requirnment</label>
                                            <div >
                                                <input type="text" name="job_requirement" class="form-control" value="{{old('job_requirement')}}" aria-describedby="subjectHelp" placeholder="Enter job requirement">
                                                <small class="form-hint"></small>
                                                @if ($errors->has('job_requirement'))
                                                    <p class="text-danger">{{ $errors->first('job_requirement') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Job Image</label>
                                            <div >
                                                <input type="file" name="job_image" id="image" class="form-control">
                                                @if ($errors->has('job_image'))
                                                    <p class="text-danger">{{ $errors->first('job_image') }}</p>
                                                @endif
                                                <img id="preview-image-before-upload" src="" style="max-height: 150px;">
                                                <small class="form-hint"></small>
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
 $(document).ready(function (e) {
   $('#image').change(function(){
       let reader = new FileReader();
          reader.onload = (e) => { 
             $('#preview-image-before-upload').attr('src', e.target.result); 
            }
           reader.readAsDataURL(this.files[0]); 
    });
});
</script>

@endsection