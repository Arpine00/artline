@extends('layouts.main')

@section('content')
    <section class="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col-12 contact_heading">
                            <h2>CONTACT US</h2>
                        </div>
                    </div>
                    <div class="row contact_details">
                        <div class="col-6 left_part">
                            <p>
                                To email us, please complete the form to the right. We will reply to your enquiry as soon as possible.
                            </p>
                            <p>
                                If from outside Australia/New Zealand please refer to <a href="#">www.artlineworld.com</a> to ensure your enquiry is dealt with promptly by the correct country.
                            </p>
                        </div>
                        <div class="col-5 right_part">
                            <form action="{{ route('send') }}" method="post">
                                @csrf
                                <div class="form_control">
                                    <label for="">First Name (required)</label>
                                    <input type="text" name="firstname"/>
                                    @if ($errors->has('firstname'))
                                        <p class="errors">{{ $errors->first('firstname') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <label for="">Last Name (required)</label>
                                    <input type="text" name="lastname"/>
                                    @if ($errors->has('lastname'))
                                        <p class="errors">{{ $errors->first('lastname') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <label for="">Contact Number (required)</label>
                                    <input type="text" name="contact_number"/>
                                    @if ($errors->has('contact_number'))
                                        <p class="errors">{{ $errors->first('contact_number') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <label for="">Postcode (required)</label>
                                    <input type="text" name="postcode" class="postcode"/>
                                    @if ($errors->has('postcode'))
                                        <p class="errors">{{ $errors->first('postcode') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <label for="">State (required)</label>
                                    <input type="text" name="state" class="state"  placeholder="Select" readonly/>
                                    <div class="state_dropdown">
                                        <ul>
                                            <li><p>ACT</p></li>
                                            <li><p>NSW</p></li>
                                            <li><p>NT</p></li>
                                            <li><p>QLD</p></li>
                                            <li><p>SA</p></li>
                                            <li><p>TAS</p></li>
                                            <li><p>VIC</p></li>
                                            <li><p>WA</p></li>
                                            <li><p>OTHER</p></li>
                                        </ul>
                                    </div>
                                    @if ($errors->has('state'))
                                        <p class="errors">{{ $errors->first('state') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <label for="">Your Message</label>
                                    <textarea name="message"></textarea>
                                    @if ($errors->has('message'))
                                        <p class="errors">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                                <div class="form_control">
                                    <button name="submit">send</button>
                                </div>
                                @if(count($errors) > 0)
                                    <p class="errors">One or more fields have an error. Please check and try again.</p>
                                @endif
                                @if($message = Session::get('success'))
                                    <p class="success">{{$message}}</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
