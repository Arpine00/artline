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
                                <li><a href="{{ route('about_us') }}">All</a><span>/</span></li>
                                <li><a href="{{ route('about') }}" class="active_about">About</a><span>/</span></li>
                                <li><a href="{{ route('business_solutions') }}">Business Solutions</a></li>
                            </ul>
                        </div>
                        <div class="col-12 img_about">
                            <img src="{{ asset('images/about1.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row about_detail_intro">
                        <div class="col">
                            <p>
                                At Artline, we are helping your world flow better!! From bringing ideas to life to helping you realise your potential; letting your messages be heard or articulating your memories, things simply flow better with Artline.
                            </p>
                            <p>
                                For nearly 50 years, no matter what the occasion, message or idea, Artline has been helping things flow better.
                            </p>
                            <p>
                                Artline was created by Japanese organisation Shachihata, which has always sought to set the highest standard for its products while maintaining its concern for the environment. In fact, Shachihata has obtained ISO certification for both its Quality Assurance and Environmental Management Systems.
                            </p>
                            <p>
                                The result is a vast range of pens and markers for all purposes, manufactured responsibly to the highest quality standards and renowned the world over.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
