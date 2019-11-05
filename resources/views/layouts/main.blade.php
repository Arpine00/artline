<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Artline | Permanent Markers, Fineline Pens & Stationery</title>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container-fluid fl">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="soc_links">
                        <a href="#" target="_blank"><img src="{{ asset('images/soc/instagram.png') }}" alt="instagram"></a>
                        <a href="#" target="_blank"><img src="{{ asset('images/soc/facebook.png') }}" alt="facebook"></a>
                    </div>
                </div>
            </div>
            <div class="row no-gutters justify-content-center logo_block">
                <div class="col cont">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
            </div>
            <div class="row no-gutters justify-content-center menu_bar">
                <div class="col cont">
                    <nav class="navbar navbar-expand-lg justify-content-between">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav menu">
                                <li class="nav-item">
                                    <a class="nav-link scrollable" href="/">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('products') }}">
                                        Products
                                    </a>
                                    <div class="dropdown-menu first_dropdown">
                                        <ul>
                                            @foreach($categories as $key => $value)
                                                <li class="dropdown-item dropdown">
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
                                                    @endphp

                                                    @if(empty($value->sub_category) && !empty($value->category) )
                                                        @if(isset($prev_key) && $prev_key >= 0)
                                                            @if($categories[$prev_key]->category == $value->category)
                                                            @else
                                                                <a class="dropdown-item dropdown-toggle" href='{{ route("$new_url") }}'>{{ $value->category }}</a>
                                                            @endif
                                                        @else
                                                            <a class="dropdown-item dropdown-toggle" href='{{ route("$new_url") }}'>{{ $value->category }}</a>
                                                        @endif
                                                    @endif
                                                    @if(!empty($categories[$key + 1]->sub_category))
                                                        <div class="dropdown-menu right_dropdown">
                                                            <ul>
                                                                @for($i = $key; $i < count($categories) ; $i ++)
                                                                    @if($categories[$i]->category == $value->category && !empty($categories[$i]->sub_category))
                                                                        @php
                                                                            $sub_url = strtolower($categories[$i]->sub_category);
                                                                            if($explode_url_sub = explode(" ",$sub_url)){
                                                                                $sub_url1 = $explode_url_sub[0];
                                                                                if(isset($explode_url_sub[1]) && $explode_url_sub[1] !== "&"){
                                                                                    $sub_url2 = $explode_url_sub[1];
                                                                                    $new_sub_url = $sub_url1."_".$sub_url2;
                                                                                }else{
                                                                                    $new_sub_url = $sub_url1;
                                                                                }
                                                                            }else{
                                                                                $new_sub_url = $sub_url;
                                                                            }
                                                                        @endphp
                                                                        @if(isset($new_sub_url))
                                                                            <li class="dropdown-item dropdown">
                                                                                <a class="dropdown-item" href='{{ route("$new_url".'_'."$new_sub_url") }}'>{{$categories[$i]->sub_category}}</a>
                                                                            </li>
                                                                        @endif
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scrollable" href="{{ route('stockists') }}">Stockists</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('the_flow') }}">
                                        THE FLOW
                                    </a>
                                    <div class="dropdown-menu first_dropdown" aria-labelledby="navbarDropdown2">
                                        <ul>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('galleries') }}">Galleries</a>
                                            </li>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('my_pen') }}">My Pen & I</a>
                                            </li>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('lessons') }}">Lessons</a>
                                            </li>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('videos') }}">Videos</a>
                                            </li>
                                        </ul>
                                     </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('about_us') }}">
                                        ABOUT
                                    </a>
                                    <div class="dropdown-menu first_dropdown">
                                        <ul>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('about') }}">About</a>
                                            </li>
                                            <li class="dropdown-item dropdown">
                                                <a class="dropdown-item" href="{{ route('business_solutions') }}">Business Solutions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scrollable" href="{{ route('vip') }}">VIP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scrollable" href="{{ route('contact') }}">CONTACT US</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <div class="space"></div>

    <footer>
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col cont">
                    <div class="row">
                        <div class="col-8">
                            <ul class="footer_menu">
                                <li><a href="#">PRODUCTS</a></li>
                                <li><a href="#">Stockists</a></li>
                                <li><a href="#">THE FLOW</a></li>
                                <li><a href="#">ABOUT</a></li>
                                <li><a href="#">VIP</a></li>
                                <li><a href="#">CONTACT US</a></li>
                            </ul>
                            <ul class="footer_submenu">
                                <li><a href="#">MSDS</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <div class="copyright">
                                <p>&#169; 2012 Copyright ACCO BRANDS Australia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.matchHeight.js') }}"></script>
    <script src="{{ asset('js/match_height.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
