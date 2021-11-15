@extends('layouts.master')
@section('title','Shoe - Product List')

@section('main')
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-section--offer mb-40">
                <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img
                            src="{{asset('resources/images/banner/banner-1.jpg')}}" alt=""></a></div>
                <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img
                            src="{{asset('resources/images/banner/banner-2.jpg')}}" alt=""></a></div>
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select id="sortProduct" class="ps-select selectpicker">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>

                <div class="ps-pagination">
                    <ul class="pagination">
                        <li>
                            <a title="Set ascending direction" href="" class="orderBy" data-value="asc"
                               style="display: none">
                                <i class="glyphicon glyphicon-arrow-up"></i>
                            </a>
                            <a title="Set descending direction" href="" class="orderBy" data-value="desc">
                                <i class="glyphicon glyphicon-arrow-down"></i>
                            </a>
                        </li>
                        @if($product->count() > 0)
                            @if($product->currentPage() > 1)
                                <li><a class="previousPage" data-page="{{$product->currentPage()-1}}" href="#"><i
                                            class="fa fa-angle-left"></i></a></li>
                            @endif

                            @for($i = 0 ; $i < $product->lastPage();$i++)
                                @if($i == ($product->currentPage()-1))
                                    <li><a class="color_page pageDirect" style="color: white"
                                           data-page="{{$i+1}}" href="#">{{$i+1}}</a></li>
                                @else
                                    <li><a class="pageDirect" data-page="{{$i+1}}" href="#">{{$i+1}}</a></li>
                                @endif
                            @endfor

                            @if($product->currentPage() < $product->lastPage())
                                <li><a class="nextPage" data-page="{{$product->currentPage()+1}}" href="#"><i
                                            class="fa fa-angle-right"></i></a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
            <div class="ps-product__columns">
                @if($product->count() > 0)
                    @foreach($product as $p)
                        <div class="ps-product__column">
                            <div class="ps-shoe mb-30">
                                <div class="ps-shoe__thumbnail">
                                    @if(now()->diffInDays($p->createdAt) <= 5)
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
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name"
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
                @else
                    <div class="alert alert-danger" style="margin: 15px" role="alert">
                        We can't find products matching the selection.
                    </div>
                @endif
            </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                    <a href="#" id="searchAll">Filter</a>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        @foreach($category as $c)
                            <li class=""><a class="searchCate" data-cate="{{$c->categoryId}}" href="#">{{$c->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Brand</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        @foreach($brand as $b)
                            <li class="current"><a href="product-listing.html">{{$b->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                    <h3>Price</h3>

                </div>
                <div class="ps-widget__content">
                    <div class="ac-slider" data-default-min="0" data-default-max="{{$max_price}}"
                         data-max="{{$max_price}}" data-step="20"
                         data-unit="$"></div>
                    <p class="ac-slider__meta">
                        Price:<span class="ac-slider__value ac-slider__min"></span>-<span
                            class="ac-slider__value ac-slider__max"></span></p>
                    <a class="ac-slider__filter ps-btn" href="#">Filter</a>
                </div>
            </aside>
            <div class="ps-sticky desktop">
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Size</h3>
                    </div>
                    <div class="ps-widget__content">
                        <table class="table ps-table--size">
                            <tbody>
                            <?php $countSize = 0;?>
                            @for($i = 0;$i < ($size->count()/5);$i++)
                                <tr>
                                    @for($j = 0;$j < 5;$j++)
                                        @if($countSize < $size->count())
                                            <td class="active">{{$size[$countSize]['number']}}</td>
                                            <?php $countSize++;?>
                                        @endif
                                    @endfor
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Color</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--color">
                            @foreach($color as $c)
                                <li style=""><a style="border: 1px solid black ;background-color: {{$c->code}}"
                                                href="#"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var queryParams = new URLSearchParams(window.location.search),
            orderByParam = queryParams.get('orderBy'),
            sortOrderParam = queryParams.get('sortOrder');

        if (orderByParam) {
            var sortOptions = $("#sortProduct");
            $.each(sortOptions.children(), function (i, option) {
                if ($(option).val() == orderByParam) {
                    $(option).prop("selected", true);
                }
            });
        }

        if (sortOrderParam) {
            var orderBy = $(".orderBy");
            $.each(orderBy, function (i, option) {
                if ($(option).data('value') == sortOrderParam) {
                    $(option).css('display', 'none');
                } else {
                    $(option).css('display', 'block');
                }
            });
        }

        $(".previousPage").click(function (e) {
            e.preventDefault();
            var previousPage = $(this).data("page");
            queryParams.set("page", previousPage);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });

        $(".nextPage").click(function (e) {
            e.preventDefault();
            var nextPage = $(this).data("page");
            queryParams.set("page", nextPage);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });


        $(".pageDirect").click(function (e) {
            e.preventDefault();
            var pageDirect = $(this).data("page");
            queryParams.set("page", pageDirect);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });

        $("#sortProduct").change(function (e) {
            e.preventDefault();
            var value = $(this).val();
            queryParams.set("orderBy", value);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });

        $(".orderBy").click(function (e) {
            e.preventDefault();
            var value = $(this).data('value');
            queryParams.set("sortOrder", value);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });

        const listSearchCate = new Array();
        $(".searchCate").click(function (e) {
            e.preventDefault();
            if (!$(this).parent().hasClass("current")) {
                $(this).parent().addClass("current");
                if (!listSearchCate.includes($(this).data("cate"))) {
                    listSearchCate.push($(this).data("cate"));
                }
            } else {
                $(this).parent().removeClass("current");
                if (listSearchCate.includes($(this).data("cate"))) {
                    listSearchCate.splice(listSearchCate.indexOf($(this).data("cate")),1);
                }
            }
        })

        $("#searchAll").click(function (e) {
            e.preventDefault();
            queryParams.set("page", 1);
            queryParams.set("categoryId", listSearchCate);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });
    </script>
@endsection
