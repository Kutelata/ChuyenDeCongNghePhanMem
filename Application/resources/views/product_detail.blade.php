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
                                <div class="item">
                                    <img src="{{asset('resources/images/shoe')}}/{{$product->image}}.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(1).jpg" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(2).jpg" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(3).jpg" alt="">
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
                        <div class="ps-product__main-img">
                            <img src="{{asset('resources/images/shoe')}}/{{$product->image}}.jpg" alt="">
                        </div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true"
                             data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false"
                             data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                             data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(1).jpg" alt="">
                            <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(2).jpg" alt="">
                            <img src="{{asset('resources/images/shoe')}}/{{$product->image}}(3).jpg" alt="">
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>{{$product->name}}</h1>
                        <p class="ps-product__category">
                            <a href="#"> {{$product->category->name}}</a>,
                            <a href="#"> {{$product->brand->name}}</a>
                        </p>
                        <h3 class="ps-product__price">
                            @if($product->sale != null)
                                $ {{$product->price*$product->sale}}
                                <del>$ {{$product->price}}</del>
                            @else
                                $ {{$product->price}}
                            @endif
                        </h3>
                        <div class="ps-product__block ps-product__quickview">
                            <h4>QUICK REVIEW</h4>
                            <p>The Nike Free RN 2017 Men's Running Shoe weighs less than previous versions and features
                                an updated knit material…</p>
                        </div>
                        <div class="ps-product__block ps-product__size">
                            <h4>CHOOSE SIZE</h4>
                            <select class="ps-select selectpicker">
                                @foreach($psize as $item)
                                    <option value="{{$item->sizeId}}"
                                            data-id="{{$item->sizeId}}">{{$item->number}}</option>
                                @endforeach

                            </select>
                            <div class="form-group">
                                <input class="form-control" type="number" value="1">
                            </div>
                        </div>
                        <div class="ps-product__shopping" id="add-to-cart">
                            <a id="change-size-id" class="ps-btn mb-10" data-id="0"
                               data-productid="{{$product->productId}}" href="javascript:">
                                Add to cart <i class="ps-icon-next"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="row">
                        <h3 class="ps-section__title">YOU MIGHT ALSO LIKE</h3>
                        <div class="ps-owl-actions">
                            <a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a>
                            <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="ps-section__content">
                    <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                         data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                         data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3"
                         data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach($discountProduct as $p)
                            <div class="ps-shoes--carousel">
                                <div class="ps-shoe">
                                    <div class="ps-shoe__thumbnail">
                                        @if(now()->diffInDays($p->createdAt) <= 30)
                                            <div class="ps-badge"><span>New</span></div>
                                        @endif
                                        @if($p->discount != null)
                                            <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                                <span>-{{$p->discount*100}}%</span>
                                            </div>
                                        @endif
                                        <img src="{{asset('resources/images/shoe/')}}/{{$p->image}}.jpg" alt="">
                                        <a class="ps-shoe__overlay"
                                           href="{{route('product_detail')}}?productId={{$p->productId}}"></a>
                                    </div>

                                    <div class="ps-shoe__content">
                                        <div class="ps-shoe__detail">
                                            <a class="ps-shoe__name"
                                               href="{{route('product_detail')}}?productId={{$p->productId}}">{{$p->name}}</a>

                                            <p class="ps-shoe__categories">
                                                <a href="{{route('product_list')}}?categoryId={{$p->categoryId}}">{{$p->category->name}}</a>,
                                                <a href="{{route('product_list')}}?categoryId=1&brandId={{$p->brandId}}">{{$p->brand->name}}</a>
                                            </p>
                                            @if($p->discount != null)
                                                <span class="ps-shoe__price"><del>$ {{$p->price}}</del> $ {{$p->salePrice}}</span>
                                            @else
                                                <span class="ps-shoe__price">$ {{$p->price}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Java Script -->
    <script>
        $('select').change(function () {
            var $id = $(this).find(':selected').data('id');
            $('#change-size-id').attr('data-id', $id);
        });


        $("#change-size-id").on("click", function () {
            $.ajax({
                url: 'Add-Cart/' + $(this).data("productid") + '/' + $(this).data("id"),
                type: 'GET',

            }).done(function (response) {
                RenderCart(response)
                alertify.success('Added product to your cart');
            });
        });

        $("#change-item-cart").on("click", ".ps-cart-item__close", function () {
            $.ajax({
                url: 'Delete-Item-Cart/' + $(this).data("id"),
                type: 'GET',

            }).done(function (response) {
                RenderCart(response)
                alertify.success('Removed product from your cart');
            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quantity").text($("#total-quantity-cart").val());
        }
    </script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@endsection
