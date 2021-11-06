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
                    <select class="ps-select selectpicker">
                        <option value="1">Shortby</option>
                        <option value="2">Name</option>
                        <option value="3">Price (Low to High)</option>
                        <option value="3">Price (High to Low)</option>
                    </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        @if($product->count() > 0)
                            @if($product->currentPage() > 1)
                                <li><a href="{{route('product_list')}}?page={{$product->currentPage()-1}}"><i
                                            class="fa fa-angle-left"></i></a></li>
                            @endif

                            @for($i = 0 ; $i < $product->lastPage();$i++)
                                <li><a href="{{route('product_list')}}?page={{$i+1}}">{{$i+1}}</a></li>
                            @endfor

                            @if($product->currentPage() < $product->lastPage())
                                <li><a href="{{route('product_list')}}?page={{$product->currentPage()+1}}"><i
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
                                    @if(now()->diffInDays($p->createAt) <= 5)
                                        <div class="ps-badge"><span>New</span></div>
                                    @endif
                                    @if($p->salePrice != null)
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                            <span>-{{$p->salePrice*100}}%</span>
                                        </div>
                                    @endif
                                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                                    <img src="{{asset('resources/images/shoe/')}}/{{$p->image}}" alt="">
                                    <a class="ps-shoe__overlay" href="product-detail.html"></a>
                                </div>
                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">{{$p->name}}</a>
                                        <p class="ps-shoe__categories">
                                            <a href="#">{{$p->category->name}}</a>,
                                            <a href="#">{{$p->brand->name}}</a>
                                        </p>
                                        @if($p->salePrice != null)
                                            <span class="ps-shoe__price"><del>{{$p->price}} &#8363;</del> {{$p->price*$p->salePrice}}
                            &#8363;</span>
                                        @else
                                            <span class="ps-shoe__price">{{$p->price}} &#8363;</span>
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
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        @foreach($category as $c)
                            <li class="current"><a href="product-listing.html">{{$c->name}}</a></li>
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
                    <div class="ac-slider" data-default-min="0" data-default-max="{{$max_price}}" data-max="{{$max_price}}" data-step="500000"
                         data-unit="vnd"></div>
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
                                <li style=""><a style="border: 1px solid black ;background-color: {{$c->code}}" href="#"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
