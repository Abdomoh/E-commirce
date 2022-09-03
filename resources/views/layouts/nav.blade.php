<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="متجر الكتروني" content="Ogani Template">
    <meta name="الكترونيك" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
        {{ $title }}
        @endif
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;700&family=Tajawal&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="icon" type="image" href="{{asset('web-site/img/undraw_deliveries.svg')}}">
    <link rel="stylesheet" href="{{asset('web-site/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/style.css')}}" type="text/css">
    @toastr_css
</head>


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{url('welcome')}}"><img src="../web-site/img/logo.svg" alt="" dir="ltr" class="rounded-circle"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>

                <li><a href="{{url('cart-products')}}"><i class="fa fa-shopping-bag"></i> <span>{{$count_cart}}</span></a></li>
            </ul>
            <div class="header__cart__price">منتج: <span>ج {{$sum_total}}</span></div>
        </div>
        <div class="header__top__right__language">
            <i class="fa fa-user"></i>
            <div>{{Auth::user()->name ?? ''}}</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                @Auth
                <li><a href="{{url('orders')}}">لوحة التحكم</a></li>
                <li><a href="{{url('logout')}}">تسجيل الخروج</a></li>
                @else
                <li><a href="{{url('login')}}">تسجيل دخول</a></li>
                @endAuth
            </ul>
        </div>
        <div class="header__top__right__language">
            <a href="{{url('login')}}" style="color:#000000;"> تسجيل دخول</a>
        </div>

        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('welcome')}}">الرئسية</a></li>
                <li><a href="{{url('shoping')}}">التسوق</a></li>
                <li><a href="{{url('cart-products')}}">السلة</a></li>
            
                <li><a href="{{url('contact')}}">تواصل معنا</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://web.facebook.com/profile.php?id=100009268532382"><i class="fa fa-facebook" style="color:#f8ab37;"></i></a>
            <a href="https://api.whatsapp.com/send?phone=0928987662&amp;text=Hi there! I have a question :)"><i class="fa fa-whatsapp fa-lg" style="color:#f8ab37;"></i></a>
            <a href="#"><i class="fa fa-twitter" style="color:#f8ab37;"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li style="color:#f8ab37 ;"><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li style="color:#f8ab37 ;">الكترونيك</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li style="color:#f8ab37 ;"><i class="fa fa-envelope"></i> elctronice@gmail.com</li>
                                <li style="color:#f8ab37 ;">رفاهية التسوق,اريحية الاسعار</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://web.facebook.com/profile.php?id=100009268532382"><i class="fa fa-facebook" style="color:#f8ab37;"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=0928987662&amp;text=Hi there! I have a question :)"><i class="fa fa-whatsapp fa-lg" style="color:#f8ab37;"></i></a>
                                <a href="#"><i class="fa fa-twitter" style="color:#f8ab37;"></i></a>
                            </div>

                            <div class="header__top__right__language">
                               @if(Auth::user()->url ?? '')
                               <img src="../uploads/{{Auth::user()->url}}" style="width:20px; height:1px;" >
                               @else
                                <i class="fa fa-user"></i>
                                @endif
                                <div>{{Auth::user()->name ?? '' }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    @Auth
                                    <li><a href="{{url('orders')}}">لوحة التحكم</a></li>
                                    <li><a href="{{url('logout')}}">تسجيل الخروج</a></li>
                                    @else
                                    <li><a href="{{url('login')}}">تسجيل دخول</a></li>
                                    @endAuth
                                </ul>
                            </div>

                            <div class="header__top__right__language">
                                <a href="{{url('login')}}" style="color:#000000;"> تسجيل دخول</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('welcome')}}"><img src="../web-site/img/logo.svg" alt="" width="50px" class="img-circle"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('welcome')}}">الرئسية</a></li>
                            <li><a href="{{url('shoping')}}">التسوق</a></li>
                            <li><a href="{{url('cart-products')}}">السلة</a></li>
                       
                            <li><a href="{{url('contact')}}">تواصل معنا</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!--<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="{{url('cart-products')}}"><i class="fa fa-shopping-bag"></i> <span>{{$count_cart}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">منتجاتي: <span>ج {{number_format($sum_total,2)}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section End -->
    @yield('content')
    <div class="whatsapp-icon">
        <a href="https://api.whatsapp.com/send?phone=455&amp;text=Hi there! I have a question :)"><i class="fa fa-whatsapp fa-lg" style="bottom: 20px;
        right: 20px;
     position: fixed;
     color: #f8ab37;
     width: 200px;"></i></a>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{url('welcome')}}"><img src="../web-site/img/logo.svg" width="50px" alt=""></a>
                        </div>
                        <ul>
                            <li>العنوان: الخرطوم -  شارع الستين</li>
                            <li>الهاتف: +0928987662</li>
                            <li>الايميل: elctronice@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>روابط سريعة</h6>
                        <ul>
                            <li><a href="{{url('welcome')}}">الرئسية</a></li>
                            <li><a href="{{url('shoping')}}">التسوق</a></li>

                        </ul>
                        <ul>
                            <li><a href="{{url('cart-products')}}">سلة التسوق</a></li>
                            <li><a href="{{url('contact')}}">اتواصل معنا</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>اشترك ليصلك الجديد</h6>
                        <p>يصلك كل جديد علي ايميلك.</p>
                        <form action="#">
                            <input type="text" placeholder="  ">
                            <button type="submit" class="site-btn">اشترك</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://web.facebook.com/profile.php?id=100009268532382"><i class="fa fa-facebook" style="color:#f8ab37;"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=0928987662&amp;text=Hi there! I have a question :)"><i class="fa fa-whatsapp fa-lg" style="color:#f8ab37;"></i></a>
                            <a href="#"><i class="fa fa-twitter" style="color:#f8ab37;"></i></a>
                            <a href="#"><i class="fa fa-pinterest" style="color:#f8ab37;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> جميع الحقوق محفوظة <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">a</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('web-site/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('web-site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('web-site/js/mixitup.min.js')}}"></script>
    <script src="{{asset('web-site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('web-site/js/main.js')}}"></script>
    @toastr_js
    @toastr_render



</body>

</html>