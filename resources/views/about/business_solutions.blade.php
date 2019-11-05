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
                                <li><a href="{{ route('about') }}">About</a><span>/</span></li>
                                <li><a href="{{ route('business_solutions') }}" class="active_about">Business Solutions</a></li>
                            </ul>
                        </div>
                        <div class="col-12 img_about">
                            <img src="{{ asset('images/business_solutions1.jpg') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row business_solutions_detail_intro">
                        <div class="col">
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
