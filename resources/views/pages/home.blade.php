@extends('layout')
@section('content')
    <div class="container-layout">
        <div class="left-column">
            <div class="brand-product-selection">
                <div class="brand-selection">
                    <h2>Dòng máy</h2>
                    <ul>
                        @foreach ($all_category as $category)
                            <li><a href="{{URL::to('/category/'.$category->category_name)}}">{{$category->category_name}}</a></li>
                        @endforeach
                      
                    </ul>
                </div>
                <div class="product-type-selection">
                    <h2>Loại sản phẩm</h2>
                    <ul>
                        <li><a href="#">Loại sản phẩm 1</a></li>
                        <li><a href="#">Loại sản phẩm 2</a></li>
                        <li><a href="#">Loại sản phẩm 3</a></li>
                    </ul>
                </div>
            </div>
           
        </div>
            <div class="right-column">
                <div class="container_home">

                    @foreach ($all_product as $all)
                    <form action="{{URL::to('/add-cart/'.$all->product_id)}}" method="post">
                        <a href="{{URL::to('/moreinfor/'.$all->product_id)}}">
                            <div class="product-card">
                                <img src="{{ asset('public/img_upload/product/' . $all->product_img) }}" alt="" width="150px">
                                <h3>{{$all ->product_name}}</h3>
                                <p>{{$all ->product_type}}</p>
                                <span>${{$all ->product_price}}</span>
                                <button type="submit" name="add_cart" >Add to Cart</button>
                            </div>
                        </a>
                        <input type="hidden" value="{{$all ->product_name}}" name="name">
                        <input type="hidden" value="{{$all ->product_price}}" name="price">
                        <input type="hidden" value="{{$all ->product_img}}" name="img">
                        <input type="hidden" value="{{$all ->product_id}}" name="id">
                        {{ csrf_field() }}

                    </form>
                        
                    @endforeach

                  
                </div>
                @if ($all_product->isEmpty())
                    <div class="empty-message">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($all_product->hasPages())
                    <div class="page-number">
                        @if (!$all_product->onFirstPage())
                            <a href="{{ $all_product->previousPageUrl() }}"><<</a>
                        @endif
                
                        @for ($i = 1; $i <= $all_product->lastPage(); $i++)
                            @if ($i == $all_product->currentPage())
                                <span>{{ $i }}</span>
                            @else
                                <a href="{{ $all_product->url($i) }}">{{ $i }}</a>
                            @endif
                        @endfor
                
                        @if ($all_product->hasMorePages())
                            <a href="{{ $all_product->nextPageUrl() }}">>></a>
                        @endif
                    </div>
                @endif
            </div>
    </div>
@endsection