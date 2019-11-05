@extends('layouts.main')

@section('content')
    <section class="products_list">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="top_part">
                        <a href="{{ route('products') }}">PRODUCTS</a><span>/</span><a href="{{ route('permanent_markers') }}">PERMANENT MARKERS </a><span>/</span>
                    </div>
                    <h2>Various</h2>
                    @foreach ($products as $product)
                        <div class="row product_block">
                            <div class="col-5 left_content">
                                <img src="{{ asset('images/products/images_products/') }}/{{$product->product_img}}" alt="product">
                                <div class="overlay">
                                    <h4>{{$product->name}}</h4>
                                    <p>NIB TYPE: {{$product->nib_type}}</p>
                                    <p>LINE WIDTH: {{$product->line_width}}</p>
                                </div>
                            </div>
                            <div class="col-7 right_content">
                                <div class="row">
                                    <div class="col">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col colors_block">
                                        <img src="{{ asset('images/products/products_style/') }}/{{$product->style_img}}" alt="color">
                                        @php
                                            if(!empty($product->colors)){
                                                $colors_arr = explode(",",$product->colors);
                                            }
                                        @endphp
                                        @if($colors_arr)
                                            <div class="colors_box">
                                                @foreach($colors_arr as $color_key => $color)
                                                    <span style="background: {{$color}}"></span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col buttons_block">
                                        <button class="buy" data-toggle="modal" data-target="#myModal{{$product->id}}">Where to buy</button>
                                    {{--<a href="#" class="msds">Product MSDS</a>--}}

                                    <!-- The Modal -->
                                        <div class="modal" id="myModal{{$product->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">AVAILABLE TO PURCHASE IN-STORE AND ONLINE AT</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @php
                                                                $where_to_buy_arr = explode(",",$product->where_to_buy);
                                                            @endphp
                                                            @foreach($where_to_buy_arr as $key_stockist => $where_to_buy)
                                                                @foreach($stockists as $stockist)
                                                                    @if(($stockist->name == $where_to_buy) && $key_stockist <= 3)
                                                                        <div class="col-3">
                                                                            <a href="{{$stockist->link}}" target="_blank" class="modal_stockists">
                                                                                @if($stockist->country == "Australia")
                                                                                    <img src="{{ asset('images/stockists/australia/') }}/{{$stockist->img_name}}" class="img-fluid" alt="">
                                                                                @elseif($stockist->country == "New Zealand")
                                                                                    <img src="{{ asset('images/stockists/new_zealand/') }}/{{$stockist->img_name}}" class="img-fluid" alt="">
                                                                                @endif
                                                                            </a>
                                                                            <a href="{{$stockist->link}}" target="_blank" class="shop_now">shop now</a>
                                                                        </div>
                                                                        @php
                                                                            break;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <p>LOOKING FOR MORE? <a href="{{ route('stockists') }}">CHECK HERE</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
