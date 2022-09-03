@extends('layouts.nav',['title' => 'تاكيد الدفع '])
<title> -تاكيد الدفع </title>
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../web-site/img/img/ab2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>تاكيد الدفع</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <span>تاكيد الدفع</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

@if(count($errors) > 0)
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Errors</strong>
                    <ul>

                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>تفاصيل الدفع</h4>
            <form action="{{route('checkout.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>الاسم الاول<span>*</span></p>
                                    <input type="text" name="name" value="{{Auth::user()->name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>الاسم الثاني<span>*</span></p>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name ?? ''}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>الدولة<span>*</span></p>
                            <input type="text" name="countriy" value="{{Auth::user()->countriy ?? ''}}" required>
                        </div>
                        <div class="checkout__input">
                            <p>العنوان<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="adress" value="{{Auth::user()->adress ?? ''}}">
                        </div>
                        <div class="checkout__input">
                            <p>المدينة<span>*</span></p>
                            <input type="text" name="city" value="{{Auth::user()->city ?? ''}} " required>
                        </div>
                        <div class="checkout__input">
                            <p>الولاية<span>*</span></p>
                            <input type="text" name="state" value="{{Auth::user()->state ?? ''}}" required>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>الهاتف <span>*</span></p>
                                    <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>الايميل<span>*</span></p>
                                    <input type="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>تفاصيل الطلب</h4>
                            <div class="shoping__cart__table">
                                <table class="table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>المنتج</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <h5>{{$product->product->name}}</h5>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                {{$product->quantity}}
                                            </td>
                                            <td class="shoping__cart__price">

                                                {{$product->product->price}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout__order__total float-end">المجموع <span style="float:left">{{$subtotal}}ج</span></div>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    كاش
                                    <input type="checkbox" name="paid_way" value="0" id="payment" data-toggle="collapse" href="#collapseExample-1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="collapse" id="collapseExample-1">
                                <span>يتم الدفع بعد الاستلام</span>
                            </div>
                            <div class="checkout__input__checkbox">

                                <label for="paypal">
                                    بنكك
                                    <input type="checkbox" name="paid_way" value="1" id="paypal" data-toggle="collapse" href="#collapseExample" role="button"  aria-expanded="false" aria-controls="collapseExample">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="collapse" id="collapseExample">
                            <span style="font-size: 46px;">  2633635</span> <span> رقم الحساب </span>
                         
                                <form action="{{route('checkout.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p> ارفق الاشعار البنكي<span>*</span></p>
                                                <input type="file" name="image" value="" >
                                            </div>
                                        </div>
                                    </div>



                            </div>
                            <button type="submit" class="site-btn btn-block">انشاء الطلب</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection