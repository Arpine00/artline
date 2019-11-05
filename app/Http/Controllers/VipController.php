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
use App\Mail\Vip;


class VipController extends Controller
{

    function index()
    {
        $categories = DB::table('categories')->get();
        return view('vip',['categories' => $categories]);
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'address' => ['required'],
            'suburb' => ['required'],
            'postcode' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'email' => ['required','email'],
            'occupation' => ['required'],
            'full1' => ['required'],
            'full2' => ['required'],
            'full3' => ['required'],
            'agree' => ['required']
        ]);

        $data = array(
            'title' => $request->title,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'suburb' => $request->suburb,
            'postcode' => $request->postcode,
            'state' => $request->state,
            'country' => $request->country,
            'email' => $request->email,
            'occupation' => $request->occupation,
            'full1' => $request->full1,
            'full2' => $request->full2,
            'full3' => $request->full3,
            'agree' => $request->agree,
        );

        Mail::to('0867800dd9-4fcc32@inbox.mailtrap.io')->send(new Vip($data));
        return back()->with('success','Welcome to the VIP club. Visit our Facebook page and upload your creations for a chance to feature in our inspiration room.');
    }
}