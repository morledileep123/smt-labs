<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Country;
use Illuminate\Http\Request;
use Hash;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
       return view('auth.login');
    }

    
    // public function register_view()
    // {
    //     return view('auth.register');
    // }

    // public function register(Request $request){
    //     // validate 
    //     $request->validate([
    //         'name'=>'required',
    //         'email' => 'required|unique:users|email',
    //         'password'=>'required|confirmed'
    //     ]);

    //     // save in users table 
        
    //     User::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=> \Hash::make($request->password)
    //     ]);

    //     // login user here 
        
    //     if(\Auth::attempt($request->only('email','password'))){
    //         return redirect('home');
    //     }

    //     return redirect('register')->withError('Error');


    // }

    public function loginUser(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('admin/dashboard');
        }

        return redirect('admin/login')->withError('Login details are not valid');

    }

    public function dashboard(Request $request){
        $contactLength = Contact::query('id', $request->id)->get();
        $lengthcon = count($contactLength);
        $jobLength = Job::query('id', $request->id)->get();
        $lengthjob = count($jobLength);
        $blogLength = Blog::query('id', $request->id)->get();
        $lengthblog = count($blogLength);
        $countryLength = Country::query('id', $request->id)->get();
        $lengthsCountry = count($countryLength);
        // dd($lengthsCountry);
        return view('admin.dashboard', ['jlength'=>$lengthjob, 'blength'=>$lengthblog, 'conlengths'=>$lengthcon, 'lengthCountry'=>$lengthsCountry]);
    }

    public function logout(Request $request)
    { 
        \Session::flush();
        \Auth::logout();
        return view('auth.logout');
    }
}
