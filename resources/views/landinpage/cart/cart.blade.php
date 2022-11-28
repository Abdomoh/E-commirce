@extends('layouts.nav',['title' => 'عربة التسوق '])
<title> -عربة التسوق </title>
@section('content')
<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">

        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../web-site/img/img/ab2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>عربة</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <a href="{{url('cart-products')}}">عربة التسوق </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<!-- Shoping Cart Section Begin -->

<section class="shoping-cart spad">
    @if($products->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table class="table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>المنتج</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>المجموع</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)

                            <tr>

                                <td>
                                    <img src="../uploads/{{$product->product->img1}}" width="60" alt="">
                                    <h5>{{$product->product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$product->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">

                                        <form action="{{route('cart.update',$product->id)}}" method="POST" class='form-group'>
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="number" name="quantity" value="{{ $product->quantity }}">
                                                <input type="hidden" name="id" value="{{ $product->id}}">
                                            </div>
                                            <button type="submit" class="btn btn" style="width:80; height: 40px;margin-left:-4px;margin-top:-1px;min-height:20px;">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                        </form>
                                    </div>
                                </td>
                                @php
                                $quantity = $product->quantity;
                                $price =$product->product->price;
                                $sum_total = $quantity * $price;
                                @endphp
                                <td class="shoping__cart__total">
                                    ${{number_format($sum_total,2)}}
                                </td>

                                <td class="shoping__cart__item__close">
                                    <form action="{{ route('cart.remove',$product->product_id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <button class=" btn btn-default btn-sm "><span class="icon_close"></span></i></button>
                                    </form>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('shoping')}}" class="primary-btn ">مواصلة التسوق</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        تحديث السلة</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>المجموع</h5>
                    <ul>
                        <li>المجوع الفرعي <span>$${{number_format($sum_total,2)}}</span></li>
                        <li>الكلي <span>${{number_format($sum_total,2)}}</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">اتمام الطلب</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <center>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__checkout">
                    <h5>لاتوجد منتجات</h5>
                </div>
            </div>
        </div>
    </center>
    @endif
</section>
<!-- Shoping Cart Section End -->


@endsection