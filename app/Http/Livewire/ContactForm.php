<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    public function submitForm(){
        $contact = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;
        Mail::to('info@comictime.com')->send(new ContactFormMailable($contact));
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';

        session()->flash('success_message', 'we received successfully and will get back to you soon');
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
