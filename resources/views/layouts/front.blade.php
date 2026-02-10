<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Almotamez Med') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">




    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css ')}}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.min.css" rel="stylesheet">

    @yield('styles')

</head>


<body>

    <header id="header" class="header sticky-top">


        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center me-auto">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1 class="sitename">
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="w-100">
                    </h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="active">
                                الرئيسية
                                <br></a>
                        </li>
                        <li><a href="{{ route('dashboard') }}">دخول الموطفين</a></li>
                        <li><a href="{{ route('blogs.aboutUs') }}">عن المجمع</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

        <a class="cta-btn d-none d-sm-block" href="{{   route('appointments.createForClient') }}
">حجز موعد</a>


            </div>

        </div>

    </header>


    @yield('content')



    <footer id="footer" class="footer mt-5" style="background-color: #D5E9CAFF;">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about offset-3">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="sitename">مجمع التميز الشامل للتأهيل الطبي
                        </span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p class="text-muted">هو مجمع طبي متخصص ، يقدم خدمات عالية الجودة وفق معايير مهنية عالمية وأسس حديثة في مجال التأهيل الطبي للأطفال على وجه الخصوص ولغيرهم على وجه العموم ، ويعتبر المجمع مكاناً متخصصاً لتقديم الرعاية الصحية المتكاملة في مجال خدمات العلاج الطبيعي والعلاج الوظيفي وعلاج أمراض النطق والتخاطب ، وبرامج تحليل السلوك التطبيقي (ABA)</p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>


                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>
                        القائمة
                    </h4>
                    <ul>
                        <li><a href="
                            {{ route('home') }}
                        ">
                                الرئيسية
                            </a></li>
                        <li><a href="
                            {{ route('dashboard') }}
                        ">
                                دخول الموطفين
                            </a></li>
                        <li><a href="
                            {{ route('blogs.aboutUs') }}
                        ">
                                عن المجمع
                            </a></li>
                        <li><a href="#">

                                حجز المواعيد
                            </a></li>
                        <li><a href="
                            {{ route('contact') }}
                        ">
                                تواصل معنا
                            </a></li>
                    </ul>
                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p> <span class="text-muted">
                        مجمع التميز الشامل للتأهيل الطبي
                    </span></p>
            </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>



    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js (optional, for Bootstrap tooltips and popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>

</html>