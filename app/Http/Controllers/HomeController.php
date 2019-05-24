<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emails = \DB::table('emails')->get();
        return view('home', compact('emails'));
    }

    public function sendEmails()
    {
        try {
            $collections = \DB::table('emails')->pluck('email');
            $email_lists = collect($collections)->chunk(10)->toArray();

            \Cache::forever('emails', $email_lists);


            return redirect('home')->with(['status' => 'Successfully Sent.']);
        } catch(\Exception $e) {
            report($e);

            return rediect('home')->with(['error' => 'We are unable to send emails.']);
        }
    }
}
