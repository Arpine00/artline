@extends('layouts.main')

@section('content')
    <section class="about_us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col-12 about_us_heading">
                            <h2>ABOUT US</h2>
                            <ul>
                                <li><a href="{{ route('about_us') }}" class="active_about">All</a><span>/</span></li>
                                <li><a href="{{ route('about') }}">About</a><span>/</span></li>
                                <li><a href="{{ route('business_solutions') }}">Business Solutions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row about_us_details">
                        <div class="col-12 top_part">
                            <a href="{{ route('about') }}">ABOUT</a>
                        </div>
                        <div class="col-4 left_part">
                            <a href="{{ route('about') }}">
                                <img src="{{ asset('images/about.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col right_part">
                            <p>
                                At Artline, we are helping your world flow better!! From bringing ideas to life to helping you realise your potential; letting your messages be heard or articulating your memories, things simply flow better with Artline.
                            </p>
                        </div>
                    </div>

                    <div class="row about_us_details">
                        <div class="col-12 top_part">
                            <a href="{{ route('business_solutions') }}">BUSINESS SOLUTIONS</a>
                        </div>
                        <div class="col-4 left_part">
                            <a href="{{ route('business_solutions') }}">
                                <img src="{{ asset('images/business_solutions.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col right_part">
                            <h6>SOLUTIONS FOR BUSINESSES BOTH LARGE AND SMALL</h6>
                            <p>
                                No matter what size your business is, our range of brands offer a wide range of products from pens to notepads and much more to suit all of your business needs.
                            </p>
                            <a href="http://www.pelikanartline.com.au/" class="pelikan">Visit Pelikan Artline website</a>
                            <a href="">
                                <img src="{{ asset('images/pelikan.gif') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
