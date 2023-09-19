<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(ContactUsRequest $request)
    {
        ContactUs::create($$request->validated());

        // #1
        // $formFields = $request->validated();
        // ContactUs::create($formFields);

        //#2
        // $contactUs = new ContactUs;
        // $contactUs->name = $formFields['name'];
        // $contactUs->email = $formFields['email'];
        // $contactUs->subject = $formFields['subject'];
        // $contactUs->message = $formFields['message'];
        // $contactUs->save();

         // #3
        // ContactUs::create([
        //     'name' => $formFields['name'],
        //     'email' => $formFields['email'],
        //     'subject' => $formFields['subject'],
        //     'message' => $formFields['message'],
        // ]);

        return redirect('/');
    }
}
