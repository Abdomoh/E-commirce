@extends('layouts.nav')
<title>الصفحة - الرئسية </title>


@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>كل الاقسام</span>
                    </div>
                    <ul>
                        @foreach($categoryies as $category)
                        <li><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach


                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{url('welcome')}}" dir="rtl" method="GET">
                            @csrf
                            <!--<div class="hero__search__categories">
                                   كل الاقسام
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                            <input type="search" placeholder="ابحث عن اي منتج تريد " name="search" value="{{request('search')}}" required="يجب ملئ الحقل">
                            <button type="submit" class="site-btn" style="text-align-last:right;" dir>بحث</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone" style="text-align-last: right;"></i>
                        </div>
                        <div class="hero__search__phone__text" dir="ltr">
                            <h5>+249928987662</h5>
                            <span>دعم فني 24/7 كل الوقت</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="web-site/img/ab1.jpg" dir="ltr">
                    <div class="hero__text">
                        <span>اسعارنا لاتنافس</span>
                        <h2>حصل العرض<br /> %30تخفيضات علي منتجاتنا </h2>
                        <p>خدمة توصيل مجانية</p>
                        <a href="{{route('shoping')}}" class="primary-btn">اتسوق الان</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section Begin -->
<section class="categories" dir="ltr" style="background:#F3F6FA;">

    <div class="container">
        @if($products->count() > 0)
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($categoryies as $category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../uploads/{{$category->image}}" dir="ltr">
                        <h5><a href="../categoryies/{{$category->id}}">{{$category->name}}</a></h5>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>

</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>جميع منتجاتنا</h2>
                </div>

            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="uploads/{{$product->img1}}"></div>
                    <div class="featured__item__text">
                        <h5>{{$product->category->name}}</h5>
                        <h6><a href="../products/{{$product->id}}">{{$product->name}} </a></h6>
                        <h5>${{$product->price}}</h5>
                    </div>
                    <div class="featured__item__text">
                        <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <input type="hidden" value="1" name="quantity">
                            <input type="hidden" value="{{$product->price}}" name="price">
                            <button class="btn btn-sm"><i class="fa fa-shopping-cart" style="color:#F9A826 ;  width: 50px;"></i></button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->



<!-- Latest Product Section Begin -->
<section class="latest-product spad" dir="ltr">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>المنتجات ذات صلة</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($products as $product)
                        <div class="latest-prdouct__slider__item">

                            <a href="../products/{{$product->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="../uploads/{{$product->img1}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product->name}}</h6>
                                    <span>${{$product->price}}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4> المنتجات القديمة </h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($products_old as $product_old)
                        <div class="latest-prdouct__slider__item">
                            <a href="../products/{{$product->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="../uploads/{{$product_old->img1}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product_old->name}}</h6>
                                    <span>${{$product_old->price}}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>المنتجات الحديثة</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($products_modern as $product_modern)
                        <div class="latest-prdouct__slider__item">

                            <a href="../products/{{$product->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="../uploads/{{$product_modern->img1}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product_modern->name}}</h6>
                                    <span>${{$product_modern->price}}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- Latest Product Section End -->
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
<!-- Blog Section Begin -->
<!--<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>المدونة</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="../uploads/{{$post->url}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{$post->created_at}}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="../post/{{$post->id}}">{{$post->title}}</a></h5>
                        <p>{{$post->post}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
          
           
        </div>
    </div>
</section> -->
<!-- Blog Section End -->
@stop