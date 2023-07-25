<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Hash;
use File;
use Session;
class JobsController extends Controller
{
    public function index(Request $request)
    {
        $data = Job::query()
        ->get();
        $countLength = Job::query('id', $request->id)->get();
        $length = count($countLength);
        return view('admin.job.index',['addjob'=>$data, 'arrayLength'=>$length]);

    }
    public function create()
    {
        return view('admin.job.create');
    }
    public function store(Request $request){
        // validate 
        $request->validate([
            'job_title'=>'required',
            'job_experience' => 'required',
            'job_requirement'=>'required',
            'job_image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $jobadd          = new Job();
        $jobadd->job_title   = $request->job_title;
        $jobadd->job_experience   = $request->job_experience;
        $jobadd->job_requirement    = $request->job_requirement;
        if($request->hasfile('job_image')){
            $file      = $request->file('job_image');
            $extension = $file->getClientOriginalExtension();
            $filename  = time().'.'.$extension;
            $file->move('public/job-image/', $filename);
            $jobadd['job_image']= $filename;
        }
        $jobadd->save();

        return redirect()->route('job')->with('status', 'Job added succesfully!!');


    }
    
    public function edit($id)
    {
        $job = Job::find($id);
        return view('admin.job.edit', ['jobedit'=>$job]);
    }
   
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title'=>'required',
            'job_experience' => 'required',
            'job_requirement'=>'required',
        ]);
        $updateData = Job::find($id);
        $updateData->job_title   = $request->job_title;
        $updateData->job_experience   = $request->job_experience;
        $updateData->job_requirement    = $request->job_requirement;
        if($request->hasfile('job_image')){
            $destination = 'public/job-image/'.$updateData->job_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file      = $request->file('job_image');
            $extension = $file->getClientOriginalExtension();
            $filename  = time().'.'.$extension;
            $file->move('public/job-image/', $filename);
            $updateData['job_image']= $filename;
        }
        $updateData->save();
        return redirect()->route('job')->with('status', 'job Update succesfully!!');
    }

    public function destroy($id)
    {
        Job::destroy($id);
        return redirect()->route('job')->with('status', 'job Deleted succesfully!!');
    }
}
