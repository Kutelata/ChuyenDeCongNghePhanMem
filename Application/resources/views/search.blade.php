@extends('layouts.master')
@section('title','Shoe - Product search')

@section('main')
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products custom-ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div class="ps-pagination">
                    <ul class="pagination">
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
                                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-shopping-cart"></i></a>
                                    <img src="{{asset('resources/images/shoe/')}}/{{$p->image}}.jpg" alt="">
                                    <a class="ps-shoe__overlay"
                                       href="{{route('product_detail')}}?productId={{$p->productId}}"></a>
                                </div>
                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                    href="{{route('product_detail')}}?productId={{$p->productId}}">{{$p->name}}</a>
                                        <p class="ps-shoe__categories">
                                            <a href="{{route('product_list')}}?categoryId={{$p->categoryId}}">{{$p->categoryName}}</a>,
                                            <a href="{{route('product_list')}}?categoryId=1&brandId={{$p->brandId}}">{{$p->brandName}}</a>
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
    </div>
@endsection

@section('js')
    <script>
        var queryParams = new URLSearchParams(window.location.search);

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
    </script>
@endsection
