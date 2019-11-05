@extends('layouts.main')

@section('content')
    <section class="products_list">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="top_part">
                        <a href="#">PRODUCTS</a><span>/</span><a href="#">HIGHLIGHTERS </a><span>/</span>
                    </div>
                    <h2>HIGHLIGHTERS</h2>
                    <div class="row product_block">
                        <div class="col-5 left_content">
                            <img src="{{ asset('images/products/img_1.png') }}" alt="product">
                            <div class="overlay">
                                <h4>ARTLINE VIVIX</h4>
                                <p>NIB TYPE: CHISEL</p>
                                <p>LINE WIDTH: 2 - 5MM</p>
                            </div>
                        </div>
                        <div class="col-7 right_content">
                            <div class="row">
                                <div class="col">
                                    <p>Create the brightest mark with Artline Vivix Highlighters. Features include the brightest ink in the market, liquid ink, visible ink indicator and clear constant ink flow until the end, across 7 bright fresh colours.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col colors_block">
                                    <img src="{{ asset('images/color.png') }}" alt="color">
                                    <div class="colors_box">
                                        <span style="background: #FFF32B"></span>
                                        <span style="background: #F9A85F"></span>
                                        <span style="background: #F49AC1"></span>
                                        <span style="background: #BAD976"></span>
                                        <span style="background: #6ECFF6"></span>
                                        <span style="background: #A888BE"></span>
                                        <span style="background: #ED1846"></span>
                                    </div>
                                </div>
                                <div class="col buttons_block">
                                    <button class="buy" data-toggle="modal" data-target="#myModal">Where to buy</button>
                                    <a href="#" class="msds">Product MSDS</a>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
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
                                                        <div class="col-3">
                                                            <a href="#" class="modal_stockists">
                                                                <img src="{{ asset('images/stockists/australia/Officeworks-300x86.jpg') }}" class="img-fluid" alt="">
                                                            </a>
                                                            <a href="#" class="shop_now">shop now</a>
                                                        </div>
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

                    <div class="row product_block">
                        <div class="col-5 left_content">
                            <div class="overlay">
                                <h4>ARTLINE 660</h4>
                                <p>NIB TYPE: CHISEL</p>
                                <p>LINE WIDTH: 1 - 4MM</p>
                            </div>
                        </div>
                        <div class="col-7 right_content">
                            <div class="row">
                                <div class="col">
                                    <p>
                                        The fluorescent, water based ink in the Artline 660 is ideal for highlighting words, phrases, blocks of text, locations on maps, clauses in documents etc. The ink will not erase or fade messages on paper or change the colour of thermal fax paper.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col colors_block">
                                    <img src="{{ asset('images/color.png') }}" alt="color">
                                    <div class="colors_box">
                                        <span style="background: #F9A85F"></span>
                                        <span style="background: #F49AC1"></span>
                                        <span style="background: #BAD976"></span>
                                        <span style="background: #6ECFF6"></span>
                                        <span style="background: #A888BE"></span>
                                        <span style="background: #ED1846"></span>
                                    </div>
                                </div>
                                <div class="col buttons_block">
                                    <a href="#" class="msds">Product MSDS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product_block">
                        <div class="col-5 left_content">
                            <img src="{{ asset('images/products/img_2.png') }}" alt="product">
                            <div class="overlay">
                                <h4>ARTLINE 640</h4>
                                <p>ARTLINE 640</p>
                                <p>LINE WIDTH: 1 - 3.5MM</p>
                            </div>
                        </div>
                        <div class="col-7 right_content">
                            <div class="row">
                                <div class="col">
                                    <p>
                                        The fluorescent, water based ink in the Artline 640 is ideal for highlighting words, phrases, blocks of text, location on maps, clauses in documents etc. The ink will not erase or fade messages on paper or change the colour of thermal fax paper. Ink supply is visible so you will never run out of ink unexpectedly.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col colors_block">
                                    <img src="{{ asset('images/color.png') }}" alt="color">
                                    <div class="colors_box">
                                        <span style="background: #FFF32B"></span>
                                        <span style="background: #F9A85F"></span>
                                        <span style="background: #F49AC1"></span>
                                        <span style="background: #BAD976"></span>
                                        <span style="background: #6ECFF6"></span>
                                        <span style="background: #A888BE"></span>
                                        <span style="background: #ED1846"></span>
                                    </div>
                                </div>
                                <div class="col buttons_block">
                                    <a href="#" class="msds">Product MSDS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
