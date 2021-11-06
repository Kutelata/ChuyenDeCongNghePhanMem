<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{asset('resources/apple-touch-icon.png')}}" rel="apple-touch-icon" />
    <link href="{{asset('resources/favicon.png')}}" rel="icon" />

    <title>@yield('title')</title>

    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="{{asset('resources/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/ps-icon/style.css')}}" rel="stylesheet" />

    <!-- CSS Library-->
    <link href="{{asset('resources/plugins/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/slick/slick/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/Magnific-Popup/dist/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/revolution/css/settings.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/revolution/css/layers.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/plugins/revolution/css/navigation.css')}}" rel="stylesheet" />

    <!-- Custom-->
    <link href="{{asset('resources/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('resources/css/myConfig.css')}}" rel="stylesheet" />
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    @yield('css')
</head>


<body class="ps-loading">
    <div class="header--sidebar"></div>

    <header class="header">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                        <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions">
                            @if(Session::has('user'))
                            <div class="btn-group ps-dropdown"><a aria-expanded="false" aria-haspopup="true"
                                    class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{Session::get('user')->name}}
                                    <i class="fa fa-angle-down"></i></a></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('selectid')}}">Change Password</a></li>
                                    <li><a href="{{route('logout')}}">Log out</a></li>
                                </ul>
                            </div>

                            @else
                            <a href="{{route('login')}}"> Login &amp; Register</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo">
                        <a class="ps-logo" href="{{route('index')}}"><img alt=""
                                src="{{asset('resources/images/logo.png')}}" /></a>
                    </div>
                </div>

                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item">
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        @foreach($category as $c)
                        @if($c->description == 'root')
                        <li class="menu-item">
                            <a href="{{route('product_list')}}">{{$c->name}}</a>
                        </li>
                        @else
                        <li class="menu-item menu-item-has-children has-mega-menu">
                            <a href="{{route('product_list')}}?categoryId={{$c->categoryId}}">{{$c->name}}</a>
                            <div class="mega-menu">
                                <div class="mega-wrap">
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Brand</h4>

                                        <ul class="mega-item">
                                            @foreach($brand as $b)
                                            <li>
                                                <a href="{{route('product_list')}}?categoryId={{$c->categoryId}}&brandId={{$b->brandId}}">{{$b->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Color</h4>

                                        <ul class="mega-item">
                                            @foreach($color as $co)
                                            <li>
                                                <a href="{{route('product_list')}}?categoryId={{$c->categoryId}}&colorId={{$co->colorId}}">{{$co->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        <li class="menu-item">
                            <a href="contact-us.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="navigation__column right">
                    <form class="ps-search--header" action="{{route('searchProductByName')}}" method="POST">
                        @csrf
                        @isset($productName)
                            <input class="form-control" type="text" name="productName" value="{{$productName}}" placeholder="Search Product…">
                        @else
                            <input class="form-control" type="text" name="productName" value="" placeholder="Search Product…">
                        @endisset
                        <button><i class="ps-icon-search"></i></button>
                    </form>

                    <div class="ps-cart">
                        <a class="ps-cart__toggle" href="#"><span><i>20</i></span><i
                                class="ps-icon-shopping-cart"></i></a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img
                                            src="{{asset('resources/images/cart-preview/1.jpg')}}" alt="">
                                    </div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                            href="product-detail.html">Amazin’ Glazin’</a>
                                        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img
                                            src="{{asset('resources/images/cart-preview/2.jpg')}}" alt="">
                                    </div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                            href="product-detail.html">The Crusty Croissant</a>
                                        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img
                                            src="{{asset('resources/images/cart-preview/3.jpg')}}" alt="">
                                    </div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                            href="product-detail.html">The Rolling Pin</a>
                                        <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__total">
                                <p>Number of items:<span>36</span></p>
                                <p>Item Total:<span>£528.00</span></p>
                            </div>
                            <div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out<i
                                        class="ps-icon-arrow-left"></i></a></div>
                        </div>
                    </div>

                    <div class="menu-toggle"></div>
                </div>
            </div>
        </nav>
    </header>

    <div class="header-services">
        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
            data-owl-mousedrag="on">
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
                delivery on every order with Shoe Store</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
                delivery on every order with Shoe Store</p>
            <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
                delivery on every order with Shoe Store</p>
        </div>
    </div>

    <main class="ps-main">
        @yield('main')

        <div class="ps-subscribe">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                        <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                        <form class="ps-subscribe__form" action="https://nouthemes.net/html/trueshoes/do_action"
                            method="post">
                            <input class="form-control" type="text" placeholder="">
                            <button>Sign up now</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                        <p>...and receive <span>$20</span> coupon for first shopping.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ps-footer bg--cover" data-background="{{asset('resources/images/background/parallax.jpg')}}">
            <div class="ps-footer__content">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info">
                                <header>
                                    <a class="ps-logo" href="{{route('index')}}"><img
                                            src="{{asset('resources/images/logo-white.png')}}" alt=""></a>
                                    <h3 class="ps-widget__title">Address Office 1</h3>
                                </header>
                                <footer>
                                    <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                    <p>Email: <a
                                            href="https://nouthemes.net/cdn-cgi/l/email-protection#a0d3d5d0d0cfd2d4e0d3d4cfd2c58ec3cfcd"><span
                                                class="__cf_email__"
                                                data-cfemail="6c1f191c1c031e182c1f18031e09420f0301">[email&#160;protected]</span></a>
                                    </p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info second">
                                <header>
                                    <h3 class="ps-widget__title">Address Office 2</h3>
                                </header>
                                <footer>
                                    <p><strong>PO Box 16122 Collins Victoria 3000 Australia</strong></p>
                                    <p>Email: <a
                                            href="https://nouthemes.net/cdn-cgi/l/email-protection#b0c3c5c0c0dfc2c4f0c3c4dfc2d59ed3dfdd"><span
                                                class="__cf_email__"
                                                data-cfemail="681b1d1818071a1c281b1c071a">[email&#160;protected]</span>e.com</a>
                                    </p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Find Our store</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--link">
                                        <li><a href="#">Coupon Code</a></li>
                                        <li><a href="#">SignUp For Email</a></li>
                                        <li><a href="#">Site Feedback</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Get Help</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Shipping and Delivery</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Payment Options</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Products</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Accessries</a></li>
                                        <li><a href="#">Football Boots</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer__copyright">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <p>&copy; <a href="#">NOUTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> Alena
                                    Studio</a></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <ul class="ps-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS Library-->
    <script data-cfasync="false" src="{{asset('resources/plugins/email/email-decode.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('resources/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/gmap3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/imagesloaded.pkgd.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/jquery.matchHeight-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/slick/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/elevatezoom/jquery.elevatezoom.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQDEK_bp8E3TJz1Sg1VMqF7jn8J3Z7Haw&amp;region=GB">
    </script>
    <script type="text/javascript" src="{{asset('resources/plugins/revolution/js/jquery.themepunch.tools.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('resources/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{asset('resources/js/main.js')}}"></script>
    @yield('js')
</body>

</html>
