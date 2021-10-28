@extends('layouts.master')
@section('title','Shoe - Homepage')
@section('main')
    <div class="ps-banner">
        <div class="rev_slider fullscreenbanner" id="home-banner">
            <ul>
                <li class="ps-banner" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-2972"
                    data-rotate="0" data-slotamount="default" data-transition="random"><img alt="" class="rev-slidebg"
                                                                                            data-bgfit="cover"
                                                                                            data-bgparallax="5"
                                                                                            data-bgposition="center center"
                                                                                            data-bgrepeat="no-repeat"
                                                                                            data-no-retina=""
                                                                                            src="{{asset('resources/images/slider/3.jpg')}}"/>
                    <div class="tp-caption ps-banner__header"
                         data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on" data-type="text"
                         data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']"
                         data-x="left"
                         data-y="['middle','middle','middle','middle']" id="layer-1">
                        <p>March 2002<br/> Nike SB Dunk Low Pro</p>
                    </div>

                    <div class="tp-caption ps-banner__title"
                         data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                         data-textalign="['center','center','center','center']" data-type="text"
                         data-voffset="['-60','-40','-50','-70']" data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']" id="layer21">
                        <p class="text-uppercase">SUBA</p>
                    </div>

                    <div class="tp-caption ps-banner__description"
                         data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                         data-textalign="['center','center','center','center']" data-type="text"
                         data-voffset="['30','50','50','50']" data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']" id="layer211">
                        <p>Supa wanted something that was going to rep his East Coast<br/> roots and, more specifically,
                            his hometown of<br/> New York City in a big way.</p>
                    </div>
                    <a class="tp-caption ps-btn"
                       data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                       data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                       data-textalign="['center','center','center','center']" data-type="text"
                       data-voffset="['120','140','200','200']" data-x="['left','left','left','left']"
                       data-y="['middle','middle','middle','middle']" href="#" id="layer31">Purchase Now<i
                            class="ps-icon-next"></i></a>
                </li>
                <li class="ps-banner ps-banner--white" data-hideafterloop="0" data-hideslideonmobile="off"
                    data-index="rs-100" data-rotate="0" data-slotamount="default" data-transition="random"><img alt=""
                                                                                                                class="rev-slidebg"
                                                                                                                data-bgfit="cover"
                                                                                                                data-bgparallax="5"
                                                                                                                data-bgposition="center center"
                                                                                                                data-bgrepeat="no-repeat"
                                                                                                                data-no-retina=""
                                                                                                                src="{{asset('resources/images/slider/2.jpg')}}"/>
                    <div class="tp-caption ps-banner__header"
                         data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on" data-type="text"
                         data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']"
                         data-x="left"
                         data-y="['middle','middle','middle','middle']" id="layer20">
                        <p>BEST ITEM<br/> THIS SUMMER</p>
                    </div>

                    <div class="tp-caption ps-banner__title"
                         data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                         data-textalign="['center','center','center','center']" data-type="text"
                         data-voffset="['-60','-40','-50','-70']" data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']" id="layer339">
                        <p class="text-uppercase">Recovery</p>
                    </div>

                    <div class="tp-caption ps-banner__description"
                         data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                         data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                         data-textalign="['center','center','center','center']" data-type="text"
                         data-voffset="['30','50','50','50']" data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']" id="layer2-14">
                        <p>Supa wanted something that was going to rep his East Coast<br/> roots and, more specifically,
                            his hometown of<br/> New York City in a big way.</p>
                    </div>
                    <a class="tp-caption ps-btn"
                       data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                       data-hoffset="['-60','15','15','15']" data-responsive_offset="on"
                       data-textalign="['center','center','center','center']" data-type="text"
                       data-voffset="['120','140','200','200']" data-x="['left','left','left','left']"
                       data-y="['middle','middle','middle','middle']" href="#" id="layer364">Purchase Now<i
                            class="ps-icon-next"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="ps-section--features-product ps-owl-root ps-section">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3 class="ps-section__title">New Products</h3>

                <div class="ps-owl-actions">
                    <a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a>
                    <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a>
                </div>
            </div>

            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-dots="false"
                     data-owl-duration="1000" data-owl-gap="30" data-owl-item="4" data-owl-item-lg="4"
                     data-owl-item-md="3"
                     data-owl-item-sm="2" data-owl-item-xs="1" data-owl-loop="true" data-owl-mousedrag="on"
                     data-owl-nav="false" data-owl-speed="5000">
                    @foreach($product as $p)
                        <div class="ps-shoes--carousel">
                            <div class="ps-shoe">
                                <div class="ps-shoe__thumbnail">
                                    <div class="ps-badge"><span>New</span></div>
                                    <a class="ps-shoe__favorite" href="#">
                                        <i class="ps-icon-heart"></i></a><img src="resources/images/shoe/{{$p->image}}"
                                                                              alt="">
                                    <a class="ps-shoe__overlay" href="product-detail.html">
                                    </a>
                                </div>

                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                            Jordan 7 Retro</a>

                                        <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#">
                                                Nike</a>,<a href="#"> Jordan</a></p>
                                        <span class="ps-shoe__price"> &pound; 120</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="ps-section--offer">
        <div class="ps-column">
            <a class="ps-offer" href="product-listing.html"><img alt=""
                                                                 src="{{asset('resources/images/banner/hom')}}e-banner-1.png"/></a>
        </div>

        <div class="ps-column">
            <a class="ps-offer" href="product-listing.html"><img alt=""
                                                                 src="{{asset('resources/images/banner/hom')}}e-banner-2.png"/></a>
        </div>
    </div>

    <div class="ps-section ps-section--top-sales ps-owl-root pb-80">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3 class="ps-section__title">Top Sales</h3>

                <div class="ps-owl-actions">
                    <a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a>
                    <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a>
                </div>
            </div>

            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-dots="false"
                     data-owl-duration="1000" data-owl-gap="30" data-owl-item="4" data-owl-item-lg="4"
                     data-owl-item-md="3"
                     data-owl-item-sm="2" data-owl-item-xs="1" data-owl-loop="true" data-owl-mousedrag="on"
                     data-owl-nav="false" data-owl-speed="5000">
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#">
                                    <i class="ps-icon-heart"></i></a><img
                                    src="{{asset('resources/images/shoe/co_thap_forum/co_thap_forum.jpg')}}"
                                    alt="">
                                <a class="ps-shoe__overlay" href="product-detail.html">
                                </a>
                            </div>

                            <div class="ps-shoe__content">
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>

                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#">
                                            Nike</a>,<a href="#"> Jordan</a></p>
                                    <span class="ps-shoe__price"> &pound; 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-home-testimonial bg--parallax pb-80"
         data-background="{{asset('resources/images/background/parallax.jpg')}}">
        <div class="container">
            <div class="owl-slider" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut" data-owl-auto="true"
                 data-owl-dots="true" data-owl-duration="1000" data-owl-gap="0" data-owl-item="1" data-owl-item-lg="1"
                 data-owl-item-md="1" data-owl-item-sm="1" data-owl-item-xs="1" data-owl-loop="true"
                 data-owl-mousedrag="on"
                 data-owl-nav="false" data-owl-speed="5000">
                <div class="ps-testimonial">
                    <div class="ps-testimonial__thumbnail"><img alt=""
                                                                src="{{asset('resources/images/testimonia')}}l/1.jpg"/><i
                            class="fa fa-quote-left"></i></div>

                    <header><select class="ps-rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="5">5</option>
                        </select>

                        <p>Logan May - CEO &amp; Founder Invision</p>
                    </header>

                    <footer>
                        <p>&ldquo;Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake
                            biscuit
                            cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.
                            &ldquo;</p>
                    </footer>
                </div>

                <div class="ps-testimonial">
                    <div class="ps-testimonial__thumbnail"><img alt=""
                                                                src="{{asset('resources/images/testimonia')}}l/2.jpg"/><i
                            class="fa fa-quote-left"></i></div>

                    <header><select class="ps-rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="5">5</option>
                        </select>

                        <p>Logan May - CEO &amp; Founder Invision</p>
                    </header>

                    <footer>
                        <p>&ldquo;Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake
                            biscuit
                            cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.
                            &ldquo;</p>
                    </footer>
                </div>

                <div class="ps-testimonial">
                    <div class="ps-testimonial__thumbnail"><img alt=""
                                                                src="{{asset('resources/images/testimonia')}}l/3.jpg"/><i
                            class="fa fa-quote-left"></i></div>

                    <header><select class="ps-rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="5">5</option>
                        </select>

                        <p>Logan May - CEO &amp; Founder Invision</p>
                    </header>

                    <footer>
                        <p>&ldquo;Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake
                            biscuit
                            cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.
                            &ldquo;</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="ps-section ps-home-blog pt-80 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <h2 class="ps-section__title">Our Story</h2>

                    <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="#">View all post<i
								class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>

                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><img alt="" src="{{asset('resources/images/blog/1.jpg')}}" /></div>

                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">An
										Inside Look at the Breaking2 Kit</a>

                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
												Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>

                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further&hellip;
                                    </p>
                                    <a class="ps-morelink" href="blog-detail.html">Read more<i
											class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><img alt="" src="{{asset('resources/images/blog/2.jpg')}}" /></div>

                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Unpacking the Breaking2 Race Strategy</a>

                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
												Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>

                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further&hellip;
                                    </p>
                                    <a class="ps-morelink" href="blog-detail.html">Read more<i
											class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><img alt="" src="{{asset('resources/images/blog/3.jpg')}}" /></div>

                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Nike&rsquo;s Latest Football Cleat Breaks the Mold</a>

                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
												Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>

                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further&hellip;
                                    </p>
                                    <a class="ps-morelink" href="blog-detail.html">Read more<i
											class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    <div class="ps-home-partner">
        <div class="ps-container">
            <div class="owl-slider" data-owl-auto="true" data-owl-dots="false" data-owl-duration="1000"
                 data-owl-gap="40"
                 data-owl-item="6" data-owl-item-lg="6" data-owl-item-md="5" data-owl-item-sm="4" data-owl-item-xs="2"
                 data-owl-loop="true" data-owl-mousedrag="on" data-owl-nav="false" data-owl-speed="5000">
                <a href="#"><img alt="" src="{{asset('resources/images/partner/1.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/2.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/3.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/4.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/5.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/6.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/7.')}}png"/></a>
                <a href="#"><img alt="" src="{{asset('resources/images/partner/8.')}}png"/></a>
            </div>
        </div>
    </div>

    <div class="ps-home-contact">
        <div data-address="New York, NY" data-title="BAKERY LOCATION!" data-zoom="17" id="contact-map"></div>

        <div class="ps-home-contact__form">
            <header>
                <h3>Contact Us</h3>

                <p>Learn about our company profile, communityimpact, sustainable motivation, and more.</p>
            </header>

            <footer>
                <form action="https://nouthemes.net/html/trueshoes/product-listing.html" method="post">
                    <div class="form-group"><label>Name<span>*</span></label> <input class="form-control" type="text"/>
                    </div>

                    <div class="form-group"><label>Email<span>*</span></label> <input class="form-control"
                                                                                      type="email"/>
                    </div>

                    <div class="form-group"><label>Your message<span>*</span></label><textarea class="form-control"
                                                                                               rows="4"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button class="ps-btn">Send Message<i
                                class="ps-icon-next"></i></button>
                    </div>
                </form>
            </footer>
        </div>
    </div>
@endsection
