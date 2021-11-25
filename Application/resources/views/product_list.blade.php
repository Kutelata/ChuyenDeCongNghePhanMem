@extends('layouts.master')
@section('title','Shoe - Product List')

@section('css')
    <style>
        @media (max-width: 1199px){
            .ps-products-wrap .ps-sidebar {
                max-width: none;
                width: auto;
            }
        }
        #searchAll{
            width: 100%;
            text-align: center;
            padding: 10px 30px;
        }
        .changeSearchColor{
            background-color: #50CF96;
        }
    </style>
@endsection

@section('main')
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-section--offer mb-40">
                <div class="ps-column"><a class="ps-offer" href="{{route('product_list')}}"><img
                            src="{{asset('resources/images/banner/banner-1.jpg')}}" alt=""></a></div>
                <div class="ps-column"><a class="ps-offer" href="{{route('product_list')}}"><img
                            src="{{asset('resources/images/banner/banner-2.jpg')}}" alt=""></a></div>
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select id="sortProduct" class="ps-select selectpicker">
                        <option value="name">Name</option>
                        <option value="salePrice">Price</option>
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
            <a class="ps-btn" id="searchAll" href="#">Filter</a>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                <div class="row">
                    <aside class="ps-widget--sidebar ps-widget--category">
                        <div class="ps-widget__header">
                            <h3>Category</h3>
                        </div>
                        <div class="ps-widget__content">
                            <ul class="ps-list--checked">
                                @foreach($category as $c)
                                    <li class=""><a class="searchCate" data-cate="{{$c->categoryId}}"
                                                    href="#">{{$c->name}}</a></li>
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
                                    <li class=""><a class="searchBrand" data-brand="{{$b->brandId}}"
                                                    href="#">{{$b->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                <div class="row">
{{--                    <aside class="ps-widget--sidebar ps-widget--filter">--}}
{{--                        <div class="ps-widget__header">--}}
{{--                            <h3>Price</h3>--}}

{{--                        </div>--}}
{{--                        <div class="ps-widget__content">--}}
{{--                            <div class="ac-slider" data-default-min="0" data-default-max="{{$max_price}}"--}}
{{--                                 data-max="{{$max_price}}" data-step="2"--}}
{{--                                 data-unit="$"></div>--}}
{{--                            <p class="ac-slider__meta">--}}
{{--                                Price:<span class="minPrice ac-slider__value ac-slider__min"></span>-<span--}}
{{--                                    class="maxPrice ac-slider__value ac-slider__max"></span></p>--}}
{{--                        </div>--}}
{{--                    </aside>--}}
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
                                                    <td class="searchSize"
                                                        data-size="{{$size[$countSize]['sizeId']}}">{{$size[$countSize]['number']}}</td>
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
                                        <li style=""><a class="searchColor" data-color="{{$c->colorId}}" style="border: 1px solid black ;background-color: {{$c->code}}"
                                                        href="#"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
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
        ;
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
        ;
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
                    listSearchCate.splice(listSearchCate.indexOf($(this).data("cate")), 1);
                }
            }
        });

        var cateParam = queryParams.get('categoryId');
        if (cateParam) {
            var cate = $(".searchCate");
            $.each(cate, function () {
                if (cateParam.includes($(this).data('cate'))) {
                    $(this).parent().addClass("current");
                    if (!listSearchCate.includes($(this).data("cate"))) {
                        listSearchCate.push($(this).data("cate"));
                    }
                }
            });
        } else {
            cateParam = 1;
            var cate = $(".searchCate");
            $.each(cate, function () {
                if (cateParam == $(this).data('cate')) {
                    $(this).parent().addClass("current");
                    if (!listSearchCate.includes($(this).data("cate"))) {
                        listSearchCate.push($(this).data("cate"));
                    }
                }
            });
        }
        ;
        const listSearchBrand = new Array();
        $(".searchBrand").click(function (e) {
            e.preventDefault();
            if (!$(this).parent().hasClass("current")) {
                $(this).parent().addClass("current");
                if (!listSearchBrand.includes($(this).data("brand"))) {
                    listSearchBrand.push($(this).data("brand"));
                }
            } else {
                $(this).parent().removeClass("current");
                if (listSearchBrand.includes($(this).data("brand"))) {
                    listSearchBrand.splice(listSearchBrand.indexOf($(this).data("brand")), 1);
                }
            }
        });

        var brandParam = queryParams.get('brandId');
        if (brandParam) {
            var brand = $(".searchBrand");
            $.each(brand, function () {
                if (brandParam.includes($(this).data('brand'))) {
                    $(this).parent().addClass("current");
                    if (!listSearchBrand.includes($(this).data("brand"))) {
                        listSearchBrand.push($(this).data("brand"));
                    }
                }
            });
        }
        ;

        const listSearchSize = new Array();
        $(".searchSize").click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass("active")) {
                $(this).addClass("active");
                if (!listSearchSize.includes($(this).data("size"))) {
                    listSearchSize.push($(this).data("size"));
                }
            } else {
                $(this).removeClass("active");
                if (listSearchSize.includes($(this).data("size"))) {
                    listSearchSize.splice(listSearchSize.indexOf($(this).data("size")), 1);
                }
            }
        });

        var sizeParam = queryParams.get('sizeId');
        if (sizeParam) {
            var size = $(".searchSize");
            $.each(size, function () {
                if (sizeParam.includes($(this).data('size'))) {
                    $(this).addClass("active");
                    if (!listSearchSize.includes($(this).data("size"))) {
                        listSearchSize.push($(this).data("size"));
                    }
                }
            });
        }
        ;

        const listSearchColor = new Array();
        $(".searchColor").click(function (e) {
            e.preventDefault();
            if (!$(this).parent().hasClass("changeSearchColor")) {
                $(this).parent().addClass("changeSearchColor");
                if (!listSearchColor.includes($(this).data("color"))) {
                    listSearchColor.push($(this).data("color"));
                }
            } else {
                $(this).parent().removeClass("changeSearchColor");
                if (listSearchColor.includes($(this).data("color"))) {
                    listSearchColor.splice(listSearchColor.indexOf($(this).data("color")), 1);
                }
            }
        });

        var colorParam = queryParams.get('colorId');
        if (colorParam) {
            var color = $(".searchColor");
            $.each(color, function () {
                if (colorParam.includes($(this).data('color'))) {
                    $(this).parent().addClass("changeSearchColor");
                    if (!listSearchColor.includes($(this).data("color"))) {
                        listSearchColor.push($(this).data("color"));
                    }
                }
            });
        }
        ;

        $("#searchAll").click(function (e) {
            e.preventDefault();
            queryParams.set("page", 1);
            queryParams.set("categoryId", listSearchCate);
            queryParams.set("brandId", listSearchBrand);
            queryParams.set("sizeId", listSearchSize);
            queryParams.set("colorId", listSearchColor);
            history.replaceState(null, null, "?" + queryParams.toString());
            window.location.href = window.location.href;
        });
    </script>
@endsection
