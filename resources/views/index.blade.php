@extends('layouts.main')

@section('content')
    <section class="home">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('images/home_slider/img_1.jpg') }}" alt="slide image">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/home_slider/img_2.jpg') }}" alt="slide image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="row categories_line">
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_1.jpg') }}" class="img-fluid" alt="category">
                            </a>
                        </div>
                        @foreach($category_data as $key => $value)
                            @if($key < 8)
                                @php
                                    if($key > 0){
                                        $prev_key = $key - 1;
                                    }

                                    $url = strtolower($value->category);
                                    if($explode_url = explode(" ",$url)){
                                        $url1 = $explode_url[0];
                                        if(isset($explode_url[1])){
                                            $url2 = $explode_url[1];
                                            $new_url = $url1."_".$url2;
                                        }else{
                                            $new_url = $url1;
                                        }
                                    }else{
                                        $new_url = $url;
                                    }

                                    $count = count($category_data);
                                    $balance = $count % 3;
                                    $key_new = $count - $balance;
                                @endphp
                                @if($key % 3 == 2)
                                    <div class="row categories_line">
                                @endif
                                        <div class="col categories_box">
                                            <a href='{{ route("$new_url") }}'>
                                                <img src="{{ asset('images/categories/') }}/{{$value->img_name}}" class="img-fluid" alt="category">
                                                <div class="text_box">
                                                    <p>{{$value->category}}</p>
                                                </div>
                                            </a>
                                        </div>
                                        @if($key == $key_new)
                                            @if($balance == 2)
                                                <div class="col categories_box"></div>
                                            @elseif($balance == 1)
                                                <div class="col categories_box"></div>
                                                <div class="col categories_box"></div>
                                            @endif
                                        @endif
                                @if($key % 3 == 1)
                                    </div>
                                @endif
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="sliders">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <h3>GALLERIES</h3>
                    <div class="owl-carousel owl-theme galleries_slide">
                        @foreach($galleries as $flow_key => $flow)
                            <div class="item">
                                <a href="{{ route('single_flow') }}?id={{$flow->id}}">
                                    <img src="{{ asset('images/the_flow/') }}/{{$flow->image_path}}/{{$flow->image}}" alt="slide image">
                                    <div class="text_box">
                                        <p>{{$flow->name}}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach()
                    </div>
                    <a href="{{ route('galleries') }}" class="more">more</a>
                </div>
                <div class="w-100"></div>
                <div class="col cont">
                    <h3>MY PEN & I</h3>
                    <div class="owl-carousel owl-theme pen_slide">
                        @foreach($my_pen as $flow_key => $flow)
                            <div class="item">
                                <a href="{{ route('single_flow') }}?id={{$flow->id}}">
                                    <img src="{{ asset('images/the_flow/') }}/{{$flow->image_path}}/{{$flow->image}}" alt="slide image">
                                    <div class="text_box">
                                        <p>{{$flow->name}}</p>
                                    </div>
                                    @if(!empty($flow->url))
                                        <button class="play">
                                            <img src="{{ asset('images/play_btn.png') }}" alt="play">
                                        </button>
                                    @endif
                                </a>
                            </div>
                        @endforeach()
                    </div>
                    <a href="{{ route('my_pen') }}" class="more">more</a>
                </div>
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col info_cont">
                    <h2>Buy Stationery, Permanent Markers, Fineline Pens Online In Australia</h2>
                    <p>You have important ideas to share with the world.</p>
                    <p>But not just any message will do.</p>
                    <p>You need something that will get attention, help others realize your potential and portray the standards you live by.</p>
                    <p>Our mission at Artline is to help you make your world flow better. Through the use of bold markers that demand attention, fine-tipped pens that pay attention to every detail, highlighters to show you mean business and specialty markers that help you create just about anything you can imagine, you can create your space, your message and more. You can create your world.</p>
                    <p>We carry a complete line of pens and markers. We supply whiteboard markers, everyday pens, permanent markers, specialty markers, fineliners, and even correction options just in case. Our products range from everyday ballpoint and gel pens, to pens that will write on just about any surface you need it to.</p>
                    <p>We have been helping creatives and businesses like you for nearly 50 years. And we care about quality and standards just as much as you do. No matter the message, idea or occasion, we pride ourselves in helping things flow better.</p>
                    <p>Artline was originally created by a Japanese organization called Shachihata. Shachihata focuses on the idea that high standards should be commonplace, while the products that get you there should not be. All our products are not only perfect for helping you make a bold statement, but they are also environmentally friendly and manufactured responsibly.</p>
                    <p>Artline is for powerful, imaginative and forward-thinking dreamers and do-ers.</p>
                    <p>Things just flow better with Artline.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
