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
        $formFields = $request->validated();

        ContactUs::create($formFields);

        return redirect('/');
    }
}
