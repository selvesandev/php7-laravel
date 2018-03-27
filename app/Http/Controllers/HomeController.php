<?php

namespace App\Http\Controllers;

use App\Mail\SendTestMail;
use App\Models\User;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use Mail;
use Psr\Log\InvalidArgumentException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmailTest()
    {
        $users = User::all();

        Mail::to('dev.selvesan@gmail.com')->send(new SendTestMail($users));

//        Mail::send('emails.send', ['users' => $users], function ($message) {
//            $message->from('me@gmail.com', 'Test PHP7 Laravel');
//            $message->to('dev.selvesan@gmail.com');
//        });

        echo 'mail was sent';
    }
}
