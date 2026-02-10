@extends('layouts.app2')
   <html lang="ar" dir="rtl">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
@section('content')
 <header id="header" class="header sticky-top">
<style>
#step-3 .appointment-picker {
    height: 300px; /* Allow the height to adjust based on content */
    overflow-y: auto; /* Enable vertical scrolling for overflowing content */
    font-size: 1rem; /* Make font more readable */
    padding: 0.75rem 1.25rem; /* Add padding for better spacing inside */
    border-radius: 0.375rem; /* Round the corners */
    background-color: #f8f9fa; /* Light background for contrast */
    transition: all 0.3s ease; /* Smooth transitions for hover/focus */
}

#step-3 .appointment-picker option {
    padding: 0.5rem; /* Add padding to options for better clickability */
    font-size: 1rem; /* Make the text a bit larger */
    color: #495057; /* Default text color */
    transition: all 0.3s ease; /* Smooth transition for hover/focus effects */
}

/* Highlight selected option */
#step-3 .appointment-picker option:checked {
    background-color: #28a745; /* Green background for selected option */
    color: #fff; /* White text on selected option */
}

/* Hover effect for options */
#step-3 .appointment-picker option:hover {
    background-color: #e9ecef; /* Light grey background on hover */
    cursor: pointer; /* Change the cursor to pointer to indicate interactivity */
}

/* Focus effect on the select box */
#step-3 .appointment-picker:focus {
    outline: none; /* Remove the default outline */
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); /* Add custom focus shadow */
}

/* Enhancing the overall container of the appointment section */
#appointment-section {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    padding: 1rem; /* Add padding for better spacing */
}

/* Add spacing and alignment for buttons */
.d-flex .btn {
    margin-top: 10px; /* Add margin between buttons */
}

/* Add smooth transitions on hover for buttons */
.d-flex .btn:hover {
    background-color: #218838; /* Darken the green on hover for buttons */
    border-color: #1e7e34;
}

/* Add border to the select box for a more defined look */
#step-3 .appointment-picker {
    border: 1px solid #ced4da;
    border-radius: 0.375rem; /* Rounded corners */
}

</style>
<div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center me-auto">
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

                <li><a href="{{ route('contact') }}">
                        تواصل معنا
                    </a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{   route('appointments.createForClient') }}
">حجز موعد</a>

    </div>

</div>

</header>

<div class="contact-container">
    <div class="contact-form">
        <h1>اتصل بنا</h1>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">اسمك</label>
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="أدخل الاسم" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">بريدك الإلكتروني</label>
                <div class="input-container">
                    <i class="fa-solid fa-at"></i>
                    <input type="email" name="email" id="email" placeholder="البريد الإلكتروني" required>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">رقم هاتفك</label>
                <div class="input-container">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text" name="phone" id="phone" placeholder="أدخل رقم الهاتف" required>
                </div>
            </div>

            <div class="form-group">
                <label for="subject">الموضوع</label>
                <div class="input-container">
                <select name="subject" id="subject" required>
                    <option value="thanks" {{ (old('subject', $selectedSubject) == 'thanks') ? 'selected' : '' }}>شكر</option>
                    <option value="complaint" {{ (old('subject', $selectedSubject) == 'complaint') ? 'selected' : '' }}>شكوى</option>
                    <option value="suggestion" {{ (old('subject', $selectedSubject) == 'suggestion') ? 'selected' : '' }}>اقتراح</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label for="message_content">رسالتك</label>
                <textarea name="message_content" id="message_content" rows="4" placeholder="اكتب تعليقًا..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">إرسال</button>
        </form>
    </div>
</div>

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


<style>
.contact-container {
    background-color: #f1f9f4;  /* Light greenish background */
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
    direction: rtl;
}

.contact-form h1 {
    color: #2c6e49;  /* Dark green for the header */
    font-size: 2rem;
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 1rem;
    color: #2c6e49;  /* Green color for labels */
    margin-bottom: 5px;
}

.input-container {
    display: flex;
    align-items: center;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 5px 15px;
    transition: border 0.3s ease;
}

.input-container input,
.input-container select,
.input-container textarea {
    border: none;
    outline: none;
    flex: 1;
    padding: 10px;
    font-size: 1rem;
    border-radius: 8px;
}

.input-container input:focus,
.input-container select:focus,
.input-container textarea:focus {
    border: 1px solid #2c6e49;
}

textarea {
    resize: vertical;
    width: 100%;  /* Full width for textarea */
}

.input-container i {
    font-size: 1.2rem;  /* Icon size */
    color: #2c6e49;  /* Icon color */
    margin-right: 10px;
}

button.submit-btn {
    background-color: #2c6e49;  /* Green background for button */
    color: #fff;
    font-size: 1.1rem;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

button.submit-btn:hover {
    background-color: #1e4f33;  /* Darker green on hover */
}
    
</style>

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

</html>

@endsection
