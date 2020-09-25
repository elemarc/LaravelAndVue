<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view ('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('test@test-com')->send(new ContactFormMail($data)); //mando un mail mediante ContactFormMail con el data a tes@est-com
       
        session()->flash('message','Thanks for your message. We\'ll be in touch ');//envio este mensaje a la sesion (flashear)
        return redirect('contact-us');
    }
}
