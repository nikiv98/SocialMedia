<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;

class ContactsController extends Controller
{
    public function create(){

        return view('contacts.contactus');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'information' => 'required'
        ]);
        
        $contact = new Contact;
        $contact->user_id = NULL;
        $contact->first_name = NULL;
        $contact->last_name = NULL;
        $contact->title = $request->input('title');
        $contact->information = $request->input('information');

        if(Auth::user()){

            $contact->first_name = auth()->user()->first_name;
            $contact->last_name = auth()->user()->last_name;
            $contact->user_id = auth()->user()->id;                        
        }
        else{

            $request->validate([
                'first_name' => auth()->check() ? 'required|nullable': '',
                'last_name' => auth()->check() ? 'required|nullable': '',
            ]);

            $contact->first_name = $request->input('first_name');
            $contact->last_name = $request->input('last_name');
        }        

        $contact->save();        

        return redirect('/contacts')->with('success', 'Contact created');
    }
}
