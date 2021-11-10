@extends('layouts.master')
@section('title','Shoe - Product Detail')

@section('main')
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                <div class="item"><img src="{{asset('resources/images/shoe')}}/{{$product->image}}.jpg"
                                                       alt=""></div>
                                <div class="item"><img
                                        src="{{asset('resources/images/shoe')}}/{{$product->image}}(1).jpg" alt="">
                                </div>
                                <div class="item"><img
                                        src="{{asset('resources/images/shoe')}}/{{$product->image}}(2).jpg" alt="">
                                </div>
                                <div class="item"><img
                                        src="{{asset('resources/images/shoe')}}/{{$product->image}}(3).jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__image">
                            <div class="item"><img class="zoom"
                                                   src="{{asset('resources/images/shoe')}}/{{$product->image}}.jpg"
                                                   alt=""
                                                   data-zoom-image="{{asset('resources/images/shoe')}}/{{$product->image}}.jpg">
                            </div>
                            <div class="item"><img class="zoom"
                                                   src="{{asset('resources/images/shoe')}}/{{$product->image}}(1).jpg"
                                                   alt=""
                                                   data-zoom-image="{{asset('resources/images/shoe')}}/{{$product->image}}(1).jpg">
                            </div>
                            <div class="item"><img class="zoom"
                                                   src="{{asset('resources/images/shoe')}}/{{$product->image}}(2).jpg"
                                                   alt=""
                                                   data-zoom-image="{{asset('resources/images/shoe')}}/{{$product->image}}(2).jpg">
                            </div>
                            <div class="item"><img class="zoom"
                                                   src="{{asset('resources/images/shoe')}}/{{$product->image}}(3).jpg"
                                                   alt=""
                                                   data-zoom-image="{{asset('resources/images/shoe')}}/{{$product->image}}(3).jpg">
                            </div>
                        </div>
                    </div>
                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img src="images/shoe-detail/1.jpg" alt=""></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true"
                             data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false"
                             data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                             data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img
                                src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img
                                src="images/shoe-detail/3.jpg" alt=""></div>
                    </div>
                    <div class="ps-product__info">
                        <h1>{{$product->name}}</h1>
                        <p class="ps-product__category">
                            <a href="#"> {{$product->category->name}}</a>,
                            <a href="#"> {{$product->brand->name}}</a>
                        </p>
                        <h3 class="ps-product__price">
                            @if($product->sale != null)
                                $ {{$product->price*$product->sale}}<del>$ {{$product->price}}</del>
                            @else
                                $ {{$product->price}}
                            @endif
                        </h3>
                        <div class="ps-product__block ps-product__quickview">
                            <h4>QUICK REVIEW</h4>
                            <p>The Nike Free RN 2017 Men's Running Shoe weighs less than previous versions and features
                                an updated knit material…</p>
                        </div>
                        <div class="ps-product__block ps-product__style">
                            <h4>CHOOSE YOUR STYLE</h4>
                            <ul>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/1.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/3.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__block ps-product__size">
                            <h4>CHOOSE SIZE</h4>
                            <select class="ps-select selectpicker">
                                <option value="1">Select Size</option>
                                <option value="2">4</option>
                                <option value="3">4.5</option>
                                <option value="3">5</option>
                                <option value="3">6</option>
                                <option value="3">6.5</option>
                                <option value="3">7</option>
                                <option value="3">7.5</option>
                                <option value="3">8</option>
                                <option value="3">8.5</option>
                                <option value="3">9</option>
                                <option value="3">9.5</option>
                                <option value="3">10</option>
                            </select>
                            <div class="form-group">
                                <input class="form-control" type="number" value="1">
                            </div>
                        </div>
                        <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">Add to cart<i
                                    class="ps-icon-next"></i></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a
                                class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                     data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                     data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3"
                     data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price">
                        <del>£220</del> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a
                                    class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a
                                    class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
