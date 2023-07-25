<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Hash;
use Session;
class ContactsController extends Controller
{
    public function create()
    {
        return view('admin.contacts.index');
    }
    public function contactList (Request $request)
    {
        $search = $request->input('search');
        $data = Contact::query()->get();
        $countLength = Contact::query('id', $request->id)->get();
        $length = count($countLength);
        return view('admin.contacts.index',['addcontact'=>$data, 'arrayLength'=>$length]);
    }
}
