@extends('layouts.nav',['title' => 'تفاصيل الطلب '])
<title> - تفاصيل الطلب</title>
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../web-site/img/hotdeal.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2> تفاصيل الطلب</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('welcome')}}">الرئسية</a>
                        <span> تفاصيل الطلب</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="checkout spad">
<div id="printableArea">

    <div class="container ">

        <center>
            <div class="col-lg-8 col-md-4">

                <div class="checkout__order">
                <h5 style="float:left;">{{date('Y-m-d')}}</h5>
                    <h4 style="float:right;">رقم الفاتورة :{{$order->order_no}}</h4>
                    <h4>تفاصيل العميل</h4>

                    <div class="shoping__cart__table">

                        <table class="table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th> العميل</th>
                                    <th>الهاتف</th>
                                    <th>العنوان</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <h5>{{Auth::user()->name ?? ''}}</h5>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <h5>{{Auth::user()->phone ?? ''}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <h5>{{Auth::user()->adress ?? ''}}</h5>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <h4>تفاصيل الفاتورة</h4>
                    <div class="shoping__cart__table">
                        <table class="table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th> المنتج</th>
                                    <th>السعر</th>
                                    <th>الكمية</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderProducts as $item)
                                <tr>
                                    <td>
                                        <h5>{{$item->product->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <h5>{{$item->price}}</h5>
                                    </td>
                                    <td class=" shoping__cart__quantity">
                                        <h5>{{$item->quantity}}</h5>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="checkout__order__total float-end">المجموع <span style="float:left">{{number_format($subtotal,2)}}ج</span></div>
                    <div class=" fa fa-print" onclick="printDiv('printableArea')"></div>
                    <!-- <input type="button" onclick="printDiv('printableArea')" value="طباعة" /> -->


                </div>

            </div>
        </center>
    </div><!-- End .container -->
    </div><!-- End .print -->
</section> <!-- End section -->
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    @endsection