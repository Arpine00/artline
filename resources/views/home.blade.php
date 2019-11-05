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
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_2.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>PERMANENT MARKERS</p>
                                </div>
                            </a>
                        </div>
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_3.png') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>HIGHLIGHTERS</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row categories_line">
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_4.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>CORRECTION TAPE & FLUID</p>
                                </div>
                            </a>
                        </div>
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_5.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>WHITEBOARD MARKERS</p>
                                </div>
                            </a>
                        </div>
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_6.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>GENERAL PENS</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row categories_line">
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_7.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>FINELINERS</p>
                                </div>
                            </a>
                        </div>
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_8.jpg') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>SPECIALTY MARKERS</p>
                                </div>
                            </a>
                        </div>
                        <div class="col categories_box">
                            <a href="#">
                                <img src="{{ asset('images/categories/img_9.png') }}" class="img-fluid" alt="category">
                                <div class="text_box">
                                    <p>ARTLINE STIX</p>
                                </div>
                            </a>
                        </div>
                    </div>
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
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_1.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Doodle</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_2.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Line Drawing</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_3.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Koi Fish</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_4.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Hope</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_5.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>667Fineline</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_6.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>664Shocktrooper</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_7.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>658Fairy</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/galleries/img_8.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>655Doodle</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="more">more</a>
                </div>
                <div class="w-100"></div>
                <div class="col cont">
                    <h3>MY PEN & I</h3>
                    <div class="owl-carousel owl-theme pen_slide">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_1.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Doodle</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_2.png') }}" alt="slide image">
                                <div class="text_box">
                                    <p>Flying Monkey - Line Drawing Doodle</p>
                                </div>
                                {{--if video--}}
                                <button class="play">
                                    <img src="{{ asset('images/play_btn.png') }}" alt="play">
                                </button>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_3.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>John Lennon</p>
                                </div>
                            </a>
                        </div>
                        <div class="item" hidden>
                            <a href="#">
                                <img src="{{ asset('images/pens/img_3.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>John Lennon</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_5.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>1734ARMSTRONG WINS BY A NOSE!!</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_6.jpg') }}" alt="slide image">
                                <div class="text_box">
                                    <p>802Bearded Man - Interpretation of Jack O'Neill</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_7.png') }}" alt="slide image">
                                <div class="text_box">
                                    <p>798Evolution</p>
                                </div>
                                {{--if video--}}
                                <button class="play">
                                    <img src="{{ asset('images/play_btn.png') }}" alt="play">
                                </button>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('images/pens/img_8.png') }}" alt="slide image">
                                <div class="text_box">
                                    <p>792Fire Fighters</p>
                                </div>
                                {{--if video--}}
                                <button class="play">
                                    <img src="{{ asset('images/play_btn.png') }}" alt="play">
                                </button>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="more">more</a>
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
