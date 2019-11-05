@extends('layouts.main')

@section('content')
    <section class="products">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="col-12 categories_heading">
                        <a href="{{ route('products') }}">Products</a>
                        <span>/</span>
                    </div>
                    <h2>Artline Supreme</h2>
                    @foreach($sub_categories as $key_sub => $value_sub)
                        @php
                            $explode_first = explode("/",$value_sub->category);
                            $sub = $explode_first[1];
                            $url_sub = strtolower($sub);
                            $url = strtolower($value_sub->parent);
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
                            if($explode_sub_url = explode(" ",$url_sub)){
                                $url_sub1 = $explode_sub_url[0];
                                if(isset($explode_sub_url[1])){
                                    $url_sub2 = $explode_sub_url[1];
                                    $new_sub_url = $url_sub1."_".$url_sub2;
                                }else{
                                    $new_sub_url = $url_sub1;
                                }
                            }else{
                                $new_sub_url = $url_sub;
                            }

                            $count = count($sub_categories);
                            $balance = $count % 3;
                            $key_new = $count - 1;
                        @endphp
                        @if($key_sub % 3 == 0)
                            <div class="row categories_line">
                                @endif
                                <div class="col categories_box">
                                    <a href='{{ route("$new_url".'_'."$new_sub_url") }}'>
                                        <img src="{{ asset('images/categories/sub/') }}/{{$value_sub->img_name}}" class="img-fluid" alt="category">
                                        <div class="text_box">
                                            <p>{{$sub}}</p>
                                        </div>
                                    </a>
                                    <div class="bottom_box">
                                        <p>{{$value_sub->description}}</p>
                                    </div>
                                </div>
                                @if($key_sub == $key_new)
                                    @if($balance == 2)
                                        <div class="col categories_box"></div>
                                    @elseif($balance == 1)
                                        <div class="col categories_box"></div>
                                        <div class="col categories_box"></div>
                                    @endif
                                @endif
                                @if($key_sub % 3 == 2)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row no-gutters justify-content-center">
                <div class="cont">
                    <div class="seo_content">
                        <p>{{$category_description[0]->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
