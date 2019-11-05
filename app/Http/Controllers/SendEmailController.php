<?php
/**
 * Created by PhpStorm.
 * User: Arpine
 * Date: 02.11.2019
 * Time: 17:35
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;


class SendEmailController extends Controller
{

    function index()
    {
        $categories = DB::table('categories')->get();
        return view('contact',['categories' => $categories]);
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'contact_number' => ['required'],
            'postcode' => ['required'],
            'state' => ['required'],
            'message' => ['required']
        ]);

        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'contact_number' => $request->contact_number,
            'postcode' => $request->postcode,
            'state' => $request->state,
            'message' => $request->message
        );

        Mail::to('0867800dd9-4fcc32@inbox.mailtrap.io')->send(new SendMail($data));
        return back()->with('success','Thank you for your message. It has been sent.
');
    }
}