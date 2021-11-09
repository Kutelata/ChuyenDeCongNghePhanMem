@extends('layouts.master')
@section('title','Shoe - Product List')

@section('main')
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products custom-ps-products" data-mh="product-listing">
            <div class="ps-product-action">
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
                                    @if(now()->diffInDays($p->createdAt) <= 5)
                                        <div class="ps-badge"><span>New</span></div>
                                    @endif
                                    @if($p->salePrice != null)
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                            <span>-{{$p->salePrice*100}}%</span>
                                        </div>
                                    @endif
                                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                                    <img src="{{asset('resources/images/shoe/')}}/{{$p->image}}.jpg" alt="">
                                    <a class="ps-shoe__overlay" href="product-detail.html"></a>
                                </div>
                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">{{$p->name}}</a>
                                        <p class="ps-shoe__categories">
                                            <a href="#">{{$p->category->name}}</a>,
                                            <a href="#">{{$p->brand->name}}</a>
                                        </p>
                                        @if($p->salePrice != null)
                                            <span class="ps-shoe__price"><del>$ {{$p->price}}</del> $ {{$p->price*$p->salePrice}}</span>
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
