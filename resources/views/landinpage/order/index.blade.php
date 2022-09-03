@extends('layouts.nav',['title' => 'تفاصيل المنتج '])
<title> - اا </title>
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}" style="color:#000000">لوحة التحكم</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:#000000">{{Auth::user()->name ?? ''}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true" style="color:#000000">لوحة التحكم</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false" style="color:#000000">الطلبات</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('logout')}}" style="color:#000000">تسجيل خروج</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">

                                <p>مرحبا <span class="font-weight-normal text-dark">{{Auth::user()->name ?? ''}}(<a href="{{url('logout')}}" style="color:#f8ab37">تسجيل خروج</a>)


                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if($orders == null)
                                <p>لاتوجد طلبات.</p>
                                <a href="{{url('shoping')}}" class="btn btn-outline-primary-2"><span>التسوق</span><i class="icon-long-arrow-right"></i></a>
                                @else
                                <table class="table table">
                                    <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th> المجموع</th>
                                            <th>حالة الطلب</th>
                                            <th> تاريخ الطلب</th>
                                            <th> تفاصيل الطلب</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr style="font-size: 17px;">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->total}}

                                            </td>

                                            @if($order->status_id == 1)
                                            <td class="text-danger">{{$order->status->name ?? ''}}</td>
                                            @else
                                            <td class="text-success">{{$order->status->name ?? ''}}</td>
                                            @endif
                                            <td>{{$order->created_at}}</td>
                                            <td><a href="../order/{{$order->id}}"><span ><i class="fa fa-eye" title="  Show Order Details " style="color:#f8ab37;"></i></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- End .table table-summary -->
                           
                                <div class="col-lg-12">
                                    <div class="shoping__checkout">
                                        <ul>
                                            <li>المجموع<span>${{number_format($orders->sum('total'),2)}}</span></li>
                                   
                                        </ul>
                             
                                    </div>
                                </div>
                                <hr>
                                @endif
                            </div><!-- .End .tab-pane -->
                            

                        </div><!-- .End .tab-pane -->
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection