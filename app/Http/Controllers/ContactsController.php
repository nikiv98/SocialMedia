<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function create(){

        return view('contacts.contactus');
    }

    public function store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'information' => 'required'
        ]);

        $contact = new Contact;
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->title = $request->input('title');
        $contact->information = $request->input('information');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact created');
    }
}
