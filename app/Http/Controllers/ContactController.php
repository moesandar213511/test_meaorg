<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function contact(){
        return view('admin.site_admin.admin.contact')->with([
            'url' => 'contact_list'
        ]);
    }

    public function show(){
        $contact = Contact::orderBy('id','desc')->get();
        return json_encode($contact);
    }

    public function destroy($id){
        Contact::findOrFail($id)->delete();
    }
    
}
