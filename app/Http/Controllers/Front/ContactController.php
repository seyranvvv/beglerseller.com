<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('contact');
            })
            ->first();
        $contact = Contact::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })->first();

        return view('front.contact.index', compact('banner', 'contact'));
    }


    public function sendMail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            // 'captcha' => 'required|captcha'
        ]);



        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $message = $request->message;


        $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'subject' => $subject, 'message' => $message);


        $message =  Mail::send([], [], function ($messages) use ($data) {

            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $subject = $data['subject'];
            $message = $data['message'];
            $messages->to('kerimberdi99@gmail.com', 'Hat')->subject('Hat')->setBody(
                "                
                    <h2>$name</h2><br>
                    <h2>$email</h2><br>
                    <h2>$phone</h2><br>
                    <h2>$subject</h2><br>
                    <h2>$message</h2><br>
                   ",
                'text/html'
            );
        });

        $success = trans('transFront.contact-success');

        return redirect()->route('index')
            ->with([
                'success' => $success,
            ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
