<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نجاح الحجز</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
    <style>
        body {
            background-color: #f7f8f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 100px;
        }

        .alert-success {
            border-radius: 12px;
            padding: 20px;
            font-size: 1.1rem;
            text-align: center;
        }

        .success-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3c763d;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-primary {
            padding: 15px 30px;
            font-size: 1.2rem;
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 30px;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }


        .footer {
            background-color: #D5E9CAFF;
            padding: 50px 0;
        }

        .footer .social-links a {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #555;
        }

        .footer .social-links a:hover {
            color: #28a745;
        }

        .cta-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 25px;
            font-size: 1.2rem;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .cta-btn:hover {
            background-color: #218838;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .success-message {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header id="header" class="header sticky-top">
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center me-auto">
                    <h1 class="sitename">
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="w-100">
                    </h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="active">الرئيسية</a></li>
                        <li><a href="{{ route('dashboard') }}">دخول الموطفين</a></li>
                        <li><a href="{{ route('blogs.aboutUs') }}">عن المجمع</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="cta-btn d-none d-sm-block" href="{{ route('appointments.createForClient') }}">حجز موعد</a>
            </div>
        </div>
    </header>

    <!-- Success Message Content -->
    <div class="container text-center success-message">
        @if (session('success'))
            <div class="alert alert-success">
                <div class="success-icon">✔️</div>
                {{ session('success') }}
            </div>
        @endif
        <h2>تم حجزك بنجاح!</h2>
        <p>نشكرك على اختيارك لنا. نحن هنا لتقديم أفضل خدمة لك.</p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg">الرجوع إلى الصفحة الرئيسية</a>
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer mt-5">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about offset-3">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="sitename">مجمع التميز الشامل للتأهيل الطبي</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p class="text-muted">هو مجمع طبي متخصص ، يقدم خدمات عالية الجودة وفق معايير مهنية عالمية وأسس حديثة في مجال التأهيل الطبي للأطفال على وجه الخصوص ولغيرهم على وجه العموم ...</p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>القائمة</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li><a href="{{ route('dashboard') }}">دخول الموطفين</a></li>
                        <li><a href="{{ route('blogs.aboutUs') }}">عن المجمع</a></li>
                        <li><a href="#">حجز المواعيد</a></li>
                        <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
                    </ul>
                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p><span class="text-muted">مجمع التميز الشامل للتأهيل الطبي</span></p>
            </div>
        </div>
    </footer>

</body>
</html>
