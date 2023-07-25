@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                        <h4 class="mb-sm-0 font-size-18">Add Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('job')}}">Blogs</a></li>
                                <li class="breadcrumb-item active">Add Blog</li>
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
                                    <form action="{{route('store-blog')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Title</label>
                                            <div >
                                                <input type="text" name="title" class="form-control" value="{{old('title')}}" aria-describedby="subjectHelp" placeholder="Enter job title">
                                                <small class="form-hint"></small>
                                                @if ($errors->has('title'))
                                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Description</label>
                                            <div >
                                               <textarea name="description" class="form-control summernote" aria-describedby="contentHelp">{{strip_tags(old('description'))}}</textarea>
                                               <small class="form-hint"></small>
                                                @if ($errors->has('description'))
                                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 ">
                                            <label class="form-label">Image Name</label>
                                            <div >
                                                <input type="file" name="image_name" id="image" class="form-control"><br>
                                                @if ($errors->has('image_name'))
                                                    <p class="text-danger">{{ $errors->first('image_name') }}</p>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.summernote').summernote();
});

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