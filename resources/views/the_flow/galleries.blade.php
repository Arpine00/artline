@extends('layouts.main')

@section('content')
    <section class="the_flow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col the_flow_heading">
                            <h2>THE FLOW</h2>
                            <ul>
                                <li><a href="{{ route('the_flow') }}" class="all">All</a></li>
                                <li><a href="{{ route('galleries') }}" class="galleries current">Galleries</a></li>
                                <li><a href="{{ route('my_pen') }}" class="my_pen">My Pen & I</a></li>
                                <li><a href="{{ route('lessons') }}" class="lessons">Lessons</a></li>
                                <li><a href="{{ route('videos') }}" class="videos">Videos</a></li>
                            </ul>
                        </div>
                    </div>
                    @foreach($main_flow as $key => $value)
                        @if($key == 0)
                            <div class="row top_flow">
                                <div class="col left_part">
                                    <a href="{{ route('single_flow') }}?id={{$value->id}}">
                                        <img src="{{ asset('images/the_flow/') }}/{{$value->image_path}}/{{$value->image}}" alt="">
                                        <div class="overlay_main_flow">
                                            <h4>{{$value->name}}</h4>
                                            <p>In: {{$value->category}}</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col right_part">
                                    <p>smArtline</p>
                                    <p>
                                        {{$value->description}}
                                    </p>
                                    <a href="{{ route('single_flow') }}?id={{$value->id}}">more</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="the_flow_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col cont">
                    @foreach($the_flow as $flow_key => $flow)
                        <div class="row the_flow_blocks @if($flow_key >= 3) hidden_block @endif @if($flow_key % 2 == 1) flex-row-reverse @endif">
                            <div class="col-4 left_part">
                                <a href="{{ route('single_flow') }}?id={{$flow->id}}">
                                    <img src="{{ asset('images/the_flow/') }}/{{$flow->image_path}}/{{$flow->image}}" alt="">
                                    <div class="overlay_main_flow">
                                        <h4>{{$flow->name}}</h4>
                                        <p>In: {{$flow->category}}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col right_part">
                                <p>
                                    {{$flow->description}}
                                </p>
                                <a href="{{ route('single_flow') }}?id={{$flow->id}}">more</a>
                            </div>
                        </div>
                    @endforeach()
                    @if(count($the_flow) > 3)
                        <input type="hidden" class="pagination_count" value="{{$pagination_count}}">
                        <button class="load_more">load more</button>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
