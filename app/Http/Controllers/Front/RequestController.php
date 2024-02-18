<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestRequest $request)
    {
        $data = $request->validated();

        $r = Request::create($data);



        try {
            $message =  Mail::send([], [], function ($messages) use ($data) {

                $name = $data['name'];
                $email = $data['email'];
                $phone = $data['phone'];
                $subject = $data['body'];
                $messages->to('kerimberdi99@gmail.com', 'Hat')->subject('Request For Product')->setBody(
                    "                
                    <h2>$name</h2><br>
                    <h2>$email</h2><br>
                    <h2>$phone</h2><br>
                    <h2>$subject</h2><br>
                   ",
                    'text/html'
                );
            });
        } catch (\Throwable $th) {
            //throw $th;
        }





        return redirect()->back()->with(['success' => 'success']);
    }
}
