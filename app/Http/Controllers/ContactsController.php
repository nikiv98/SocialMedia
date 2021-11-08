<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
        $contact->email = NULL;
        $contact->title = $request->input('title');
        $contact->information = $request->input('information');

        if(Auth::user()){

            $contact->first_name = auth()->user()->first_name;
            $contact->last_name = auth()->user()->last_name;
            $contact->email = auth()->user()->email;
            $contact->user_id = auth()->user()->id;                        
        }
        else{

            $request->validate([
                'first_name' => auth()->check() ? 'required|nullable': '',
                'last_name' => auth()->check() ? 'required|nullable': '',
                'email' => auth()->check() ? 'required|nullable': '',
            ]);

            $contact->first_name = $request->input('first_name');
            $contact->last_name = $request->input('last_name');
            $contact->email = $request->input('email');
        }        

        $contact->save();
        
        Mail::send('mails.contact_email',
             array(
                 'first_name' => $request->get('first_name'),
                 'last_name' => $request->get('last_name'),
                 'email' => $request->get('email'),
                 'title' => $request->get('title'),
                 'information' => $request->get('information'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to(env('ADMIN_EMAILS'));
               });


        return redirect('/contacts')->with('success', 'Contact created');
    }
}
