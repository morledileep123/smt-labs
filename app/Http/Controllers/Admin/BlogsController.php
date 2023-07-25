<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Hash;
use File;
use Session;
class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $data = Blog::query()->get();
        $countLength = Blog::query('id', $request->id)->get();
        $length = count($countLength);
        return view('admin.blog.index',['addblog'=>$data, 'arrayLength'=>$length]);
    }
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request){
        // validate 
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image_name'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $blogadd          = new Blog();
        $blogadd->title   = $request->title;
        $blogadd->description   = $request->description;
        if($request->hasfile('image_name')){
            $file      = $request->file('image_name');
            $extension = $file->getClientOriginalExtension();
            if ($extension=='jpg' || $extension=='jpeg' || $extension=='png') {
                $blogadd->type   = 'picture';
            }elseif ($extension=='3gp' || $extension=='mp4' || $extension=='flv' || $extension=='mkv') {
                $blogadd->type   = 'video';
            }else{
                $blogadd->type   = 'NULL';
            }
            $filename  = time().'.'.$extension;
            $file->move('public/blog-image/', $filename);
            $blogadd['image_name']= $filename;
        }
        $blogadd->save();

        return redirect()->route('blog')->with('status', 'blog added succesfully!!');


    }
    
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', ['blogedit'=>$blog]);
    }
   
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $updateData = Blog::find($id);
        $updateData->title   = $request->title;
        $updateData->description   = $request->description;
        if($request->hasfile('image_name')){
            $destination = 'public/blog-image/'.$updateData->image_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file      = $request->file('image_name');
            $extension = $file->getClientOriginalExtension();
            if ($extension=='jpg' || $extension=='jpeg' || $extension=='png') {
                $updateData->type   = 'picture';
            }elseif ($extension=='3gp' || $extension=='mp4' || $extension=='flv' || $extension=='mkv') {
                $updateData->type   = 'video';
            }else{
                $updateData->type   = 'NULL';
            }
            $filename  = time().'.'.$extension;
            $file->move('public/blog-image/', $filename);
            $updateData['image_name']= $filename;
        }
        $updateData->save();
        return redirect()->route('blog')->with('status', 'blog Update succesfully!!');
    }

    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('blog')->with('status', 'blog Deleted succesfully!!');
    }
}
