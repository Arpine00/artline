@extends('layouts.main')

@section('content')
    <section class="stockists">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <h2>Stockists</h2>
                    <div class="row stockists_block">
                        <div class="col-12">
                            <h5>Looking to grow your Artline Collection? Check out our stockists across Australia and New Zealand below!</h5>
                        </div>
                        <div class="col-7">
                            <p>Australia</p>
                            <div class="row australia">
                                @foreach($stockists_australia as $stockist_australia)
                                    <div class="col-4">
                                        <a href="{{$stockist_australia->link}}">
                                            <img src="{{ asset('images/stockists/australia/') }}/{{$stockist_australia->img_name}}" class="img-fluid" alt="{{$stockist_australia->name}}">
                                            <span>{{$stockist_australia->name}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <h6>...and leading<br>newsagents!</h6>
                            <p>New Zealand</p>
                            <div class="row new_zealand">
                                @foreach($stockists_new_zealand as $stockist_new_zealand)
                                    <div class="col-4">
                                        <a href="{{$stockist_australia->link}}">
                                            <img src="{{ asset('images/stockists/new_zealand/') }}/{{$stockist_new_zealand->img_name}}" class="img-fluid" alt="{{$stockist_new_zealand->name}}">
                                            <span>{{$stockist_new_zealand->name}}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <h6>...and leading<br>newsagents!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
