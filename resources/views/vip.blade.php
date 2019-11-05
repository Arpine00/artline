@extends('layouts.main')

@section('content')
    <section class="vip">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col-12 vip_heading">
                            <h2>VIP</h2>
                        </div>
                    </div>
                    <div class="row vip_details">
                        <div class="col-6 left_part">
                            <h3>BECOME AN ARTLINE VIP</h3>
                            <p>
                                Register to join the Artline VIP Club and you'll get advance notice of our promotions, enjoy exclusive giveaways and receive premium content before anyone else!
                            </p>
                            <p>Australia and New Zealand residents only.</p>
                        </div>
                        <div class="col-6 right_part">
                            @if($message = Session::get('success'))
                                <p class="success">{{$message}}</p>
                            @else
                                <form action="{{ route('send_vip') }}" method="post">
                                    @csrf
                                    <div class="form_control">
                                        <div class="form_group title_group">
                                            <label for="">Title</label>
                                            <input type="text" class="title @if ($errors->has('title')) error @endif" name="title" placeholder="Select" readonly/>
                                            <div class="title_dropdown">
                                                <ul>
                                                    <li>
                                                        <p>Mr</p>
                                                    </li>
                                                    <li>
                                                        <p>Mrs</p>
                                                    </li>
                                                    <li>
                                                        <p>Miss</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_control">
                                        <label for="">First Name</label>
                                        <input type="text" class="@if ($errors->has('firstname')) error @endif" name="firstname"/>
                                    </div>
                                    <div class="form_control">
                                        <label for="">Last Name</label>
                                        <input type="text" class="@if ($errors->has('lastname')) error @endif" name="lastname"/>
                                    </div>
                                    <div class="form_control">
                                        <label for="">Address</label>
                                        <input type="text" class="@if ($errors->has('address')) error @endif" name="address"/>
                                    </div>
                                    <div class="form_control">
                                        <label for="">Suburb</label>
                                        <input type="text" class="@if ($errors->has('suburb')) error @endif" name="suburb"/>
                                    </div>
                                    <div class="form_control">
                                        <div class="form_group">
                                            <label for="">Postcode</label>
                                            <input type="text" name="postcode" class="postcode @if ($errors->has('postcode')) error @endif"/>
                                        </div>
                                        <div class="form_group state_group">
                                            <label for="">State</label>
                                            <input type="text" name="state" class="state @if ($errors->has('state')) error @endif"  placeholder="Select" readonly/>
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
                                        </div>
                                    </div>
                                    <div class="form_control country_group">
                                        <label for="">Country</label>
                                        <input type="text" name="country" class="country @if ($errors->has('country')) error @endif" placeholder="Please choose" readonly/>
                                        <div class="country_dropdown">
                                            <ul>
                                                <li><p>Australia</p></li>
                                                <li><p>New Zealand</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form_control">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="@if ($errors->has('email')) error @endif"/>
                                    </div>
                                    <div class="form_control">
                                        <div class="form_group occupation_group">
                                            <label for="">Occupation</label>
                                            <input type="text" name="occupation" class="@if ($errors->has('occupation')) error @endif"/>
                                        </div>
                                        <div class="form_group age_group">
                                            <label for="">Age</label>
                                            <input type="text" name="age" class="age @if ($errors->has('state')) error @endif"/>
                                        </div>
                                    </div>
                                    <div class="form_control full">
                                        <label for="">For what purpose do you purchase pens and markers?</label>
                                        <input type="text" name="full1" class="full1 @if ($errors->has('full1')) error @endif" placeholder="Please choose" readonly/>
                                        <div class="full1_dropdown">
                                            <ul>
                                                <li><p>Home</p></li>
                                                <li><p>School</p></li>
                                                <li><p>Small office (1 – 10)</p></li>
                                                <li><p>Medium office (11 – 100)</p></li>
                                                <li><p>Large office (101+)</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form_control full">
                                        <label for="">What influences your purchase of pens and markers?</label>
                                        <input type="text" name="full2" class="full2 @if ($errors->has('full2')) error @endif" placeholder="Please choose" readonly/>
                                        <div class="full2_dropdown">
                                            <ul>
                                                <li><p>Comfort</p></li>
                                                <li><p>Style</p></li>
                                                <li><p>Quality</p></li>
                                                <li><p>Brand</p></li>
                                                <li><p>Price</p></li>
                                                <li><p>Colours</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form_control full">
                                        <label for="">Where do you usually purchase pens and markers?</label>
                                        <input type="text" name="full3" class="full3 @if ($errors->has('full3')) error @endif" placeholder="Please choose" readonly/>
                                        <div class="full3_dropdown">
                                            <ul>
                                                <li><p>Supermarket</p></li>
                                                <li><p>Officeworks</p></li>
                                                <li><p>Warehouse Stationery</p></li>
                                                <li><p>Office Products Dealer</p></li>
                                                <li><p>Newsagent</p></li>
                                                <li><p>Big W</p></li>
                                                <li><p>K Mart</p></li>
                                                <li><p>Corporate Express</p></li>
                                                <li><p>Office Max</p></li>
                                                <li><p>Other</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form_control agree">
                                        <div class="check_agree">
                                            <input type="checkbox" name="agree"/>
                                            <span class="checkmark @if ($errors->has('agree')) error @endif"></span>
                                        </div>
                                        <span>I have read the Artline privacy policy</span>
                                    </div>
                                    <button name="submit">submit</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
