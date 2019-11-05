@extends('layouts.main')

@section('content')
    <section class="products">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <h2>PRODUCTS</h2>
                        @foreach($category_data as $key => $value)
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
                            @if($key % 3 == 0)
                                <div class="row categories_line">
                            @endif
                            <div class="col categories_box">
                                <a href='{{ route("$new_url") }}'>
                                    <img src="{{ asset('images/categories/') }}/{{$value->img_name}}" class="img-fluid" alt="category">
                                    <div class="text_box">
                                        <p>{{$value->category}}</p>
                                    </div>
                                </a>
                                <div class="bottom_box">
                                    <p>{{$value->description}}</p>
                                </div>
                            </div>
                            @if($key == $key_new)
                                @if($balance == 2)
                                    <div class="col categories_box"></div>
                                @elseif($balance == 1)
                                    <div class="col categories_box"></div>
                                    <div class="col categories_box"></div>
                                @endif
                            @endif
                        @if($key % 3 == 2)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row no-gutters justify-content-center">
                <div class="cont">
                    <div class="seo_content"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
