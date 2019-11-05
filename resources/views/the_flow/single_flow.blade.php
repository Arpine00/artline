@extends('layouts.main')

@section('content')
    <section class="the_flow_content single_flow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col-12 single_flow_heading">
                            <a href="{{ route('the_flow') }}">THE FLOW</a>
                            <span>/</span>
                            @php
                                $route = $the_flow[0]->image_path;
                            @endphp
                            <a href='{{ route("$route") }}'>{{$the_flow[0]->category}}</a>
                            <span>/</span>
                        </div>
                        <div class="col-12 the_flow_heading">
                            <h2>{{$the_flow[0]->name}}</h2>
                            <ul>
                                <li><a href="{{ route('the_flow') }}">All</a><span>/</span></li>
                                <li><a href="{{ route('galleries') }}" @if($the_flow[0]->category == "Galleries") class="active_flow" @endif>Galleries</a><span>/</span></li>
                                <li><a href="{{ route('my_pen') }}" @if($the_flow[0]->category == "My Pen & I") class="active_flow" @endif>My Pen & I</a><span>/</span></li>
                                <li><a href="{{ route('lessons') }}" @if($the_flow[0]->category == "Lessons") class="active_flow" @endif>Lessons</a><span>/</span></li>
                                <li><a href="{{ route('videos') }}" @if($the_flow[0]->category == "Videos") class="active_flow" @endif>Videos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if($the_flow[0]->category == "Videos")
                                <iframe width="100%" height="470" src="{{$the_flow[0]->url}}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <img src="{{ asset('images/the_flow/') }}/{{$the_flow[0]->image_path}}/{{$the_flow[0]->image}}" class="img-fluid image_flow" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="row single_flow_details">
                        <div class="col-12 p-0">
                            <p class="by">{{$the_flow[0]->description}}</p>
                            @if(!empty($the_flow[0]->artist_uses))
                                <h6>Pens this artist uses – Like this drawing? Check out the pens the artist uses in this tutorial</h6>
                            @endif
                        </div>
                        @if(!empty($the_flow[0]->artist_uses))
                            @php
                                $artist_uses_arr = [];
                                $artist_uses = $the_flow[0]->artist_uses;
                                if($artist_uses_arr = (explode(",",$artist_uses))){
                                }else{
                                    $artist_uses_arr[] += $artist_uses;
                                }
                            @endphp
                            @foreach($category_data as $category_key => $category_item)
                                @php
                                    $url = strtolower($category_item->category);
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
                                @endphp
                                @foreach($artist_uses_arr as $artist_uses)
                                    @if($category_item->category == $artist_uses)
                                        <div class="col-6 p-0 flex-row">
                                            <div class="col-6 p-0 left_part">
                                                <a href='{{ route("$new_url") }}'>
                                                    <img src="{{ asset('images/categories') }}/{{$category_item->img_name}}" alt="">
                                                    <div class="overlay_main_flow">
                                                        <h4>{{$category_item->category}}</h4>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6 right_part">
                                                <p>
                                                    {{$category_item->description}}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                    <div class="row other_posts">
                        <div class="col-12">
                            <h3>Other posts in this category</h3>
                        </div>
                        @php
                            $new_arr = [];
                            foreach ($all_flow as $flow_value){
                                if ($flow_value->category == $the_flow[0]->category){
                                    $new_arr[] += $flow_value->id;
                                }
                            }
                            $count = count($new_arr);
                            $random_key_arr = [];
                            if($count > 0){
                                if ($count == 1){
                                    $new_count = 1;
                                }elseif ($count == 2){
                                    $new_count = 2;
                                }else{
                                    $new_count = 3;
                                }

                                for ($i = 0;$i < 100000;$i ++){
                                    $random = rand(0,2);
                                    if(!in_array($new_arr[$random],$random_key_arr)){
                                        $random_key_arr[] += $new_arr[$random];
                                    }
                                    if(count($random_key_arr) == $new_count){
                                        break;
                                    }
                                }
                            }
                        @endphp
                        @foreach($random_key_arr as $one_flow)
                            @foreach($all_flow as $flow_item)
                                @if($flow_item->id == $one_flow)
                                    @php
                                        $new_route = $flow_item->image_path;
                                    @endphp
                                    <div class="col other_posts_1">
                                        <a href='{{ route("$new_route") }}?id={{$flow_item->id}}'>
                                            <img src="{{ asset('images/the_flow/') }}/{{$flow_item->image_path}}/{{$flow_item->image}}" alt="">
                                            <div class="overlay_flow">
                                                <h4>{{$flow_item->name}}</h4>
                                                <p>In: {{$flow_item->category}}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
