<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {

        $data['contacts'] = Contact::latest('created_at')->paginate(10);

        return view('Admin.contact.index', $data);
    }



    public function store(Request $request)
    {

        // return $request->all();

        $data =   Contact::create($request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'business_name' => 'required',
                'service' => 'required',
                'mobile' => 'required',
                'message' => 'required',
                'business_details' => 'required',

            ]
        ));

        // return $data;
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        return redirect()->back()->with('contact_success', 'Message sent. Please wait for further instruction!');
        // $data = "Thank you for your interest in us!";
        // return view('Front.success')->with('success', 'Thank you for your interest in us!');
        // return view('Front.success', ['data' => $data]);
    }


    public function show(Contact $contact)
    {
        // return $reservation;
        return view('Admin.contact.show', ['data' => $contact]);
    }




    public function destroy(Contact $contact)
    {

        $contact->delete();
        return redirect(route('contact.index'))->with('success', 'Deleted successfully');
    }
}