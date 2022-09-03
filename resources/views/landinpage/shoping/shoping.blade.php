@extends('layouts.nav',['title' => 'تفاصيل المنتج '])
<title> -التسوق </title>
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
                    <h2>التسوق</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <a href="{{url('shoping')}}">التسوق</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>الاقسام</h4>
                        <ul dir="">
                            @foreach($categoryies as $category)
                            <li><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7" dir="ltr">

                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">

                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$product_count}}</span> منتج</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($product_list as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="../uploads/{{$product->img1}}">

                            </div>
                            <div class="product__item__text">
                                <h5>{{$product->category->name}}</h5>
                                <h6><a href="../products/{{$product->id}}">{{$product->name}}</a></h6>
                                <h5>${{$product->price}}</h5>
                            </div>
                            <div class="featured__item__text">
                                <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <input type="hidden" value="1" name="quantity">
                                    <input type="hidden" value="{{$product->price}}" name="price">
                                    <button class="btn btn-sm"><i class="fa fa-shopping-cart" style="color:#F9A826 ; width: 50px;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{ $product_list->render('pagination::bootstrap-4')}}

            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection