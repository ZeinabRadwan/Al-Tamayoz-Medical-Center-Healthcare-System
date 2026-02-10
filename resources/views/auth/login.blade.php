<x-guest-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/css/swiper.min.css">
        <script src="https://cdn.tailwindcss.com"></script>


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap");

        :root {
            --bodybg: #cee4cfaf;
            --primary-color: #108a10;
            --grey: #d6d6d6;
            --placeholder: #969696;
            --white: #fff;
            --text: #333;
            --slider-bg:rgb(241, 241, 241);
            --login-cta-hover: #009821;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--bodybg);
            height: 100vh;
            display: flex;
            direction: rtl;
        }

        .login-container {
            display: flex;
            background: var(--white);
            margin: auto;
            width: 100%;
            min-width: 320px;
            height: 100%;
        }

        .login-container .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container .logo img {
            height: 120px;
            width: 120px;
            margin-bottom: 5%;
            fill: var(--primary-color);
        }


        .login-container .login-form {
            width: 50%;
            box-sizing: border-box;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            justify-content: center;
            height: 100vh;
        }

        .login-container .login-form .login-form-inner {
            max-width: 380px;
            width: 100%;
        }

        .login-container .login-form .google-login-button {
            color: var(--text);
            border: 1px solid var(--grey);
            margin: 40px 0 20px;
        }

        .login-container .login-form .sign-in-seperator {
            text-align: center;
            color: var(--placeholder);
            position: relative;
            margin: 30px 0 20px;
        }

        .login-container .login-form .sign-in-seperator span {
            background: var(--white);
            z-index: 1;
            position: relative;
            padding: 0 10px;
            font-size: 14px;
        }

        .login-container .login-form .sign-in-seperator:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 1px;
            background: var(--grey);
            left: 0;
            top: 50%;
            z-index: 0;
        }

        .login-container .login-form .login-form-group {
            position: relative;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .login-container .login-form .login-form-group label {
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 10px;
        }

        .login-container .login-form .login-form-group input {
            padding: 13px 20px;
            box-sizing: border-box;
            border: 1px solid var(--grey);
            border-radius: 50px;
            font-family: "Raleway", sans-serif;
            font-weight: 600;
            font-size: 14px;
            color: var(--text);
            transition: linear 0.2s;
        }

        .login-container .login-form .login-form-group input:focus {
            outline: none;
            border: 1px solid var(--primary-color);
        }

        .login-container .login-form .login-form-group input::-webkit-input-placeholder {
            color: var(--placeholder);
            font-weight: 300;
            font-size: 14px;
        }

        .login-container .login-form .login-form-group.single-row {
            flex-direction: row;
            justify-content: space-between;
            padding-top: 5px;
        }

        .login-container .login-form .custom-check input[type="checkbox"] {
            height: 23px;
            width: 23px;
            margin: 0;
            padding: 0;
            opacity: 1;
            appearance: none;
            border: 2px solid var(--primary-color);
            border-radius: 3px;
            background: var(--white);
            position: relative;
            margin-left: 10px;
            cursor: pointer;
        }

        .login-container .login-form .custom-check input[type="checkbox"]:checked {
            border: 2px solid var(--primary-color);
            background: var(--primary-color);
        }

        .login-container .login-form .custom-check input[type="checkbox"]:checked:before,
        .login-container .login-form .custom-check input[type="checkbox"]:checked:after {
            content: "";
            position: absolute;
            height: 2px;
            background: var(--white);
        }

        .login-container .login-form .custom-check input[type="checkbox"]:checked:before {
            width: 8px;
            top: 11px;
            left: 2px;
            transform: rotate(44deg);
        }

        .login-container .login-form .custom-check input[type="checkbox"]:checked:after {
            width: 14px;
            top: 8px;
            left: 5px;
            transform: rotate(-55deg);
        }

        .login-container .login-form .custom-check input[type="checkbox"]:focus {
            outline: none;
        }

        .login-container .login-form .custom-check {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container .login-form .custom-check label {
            margin: 0;
            color: var(--text);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .login-container .login-form .link {
            color: var(--primary-color);
            font-weight: 700;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container .login-form .link:hover {
            text-decoration: underline;
        }

        .login-container .login-form .login-cta {
            color: var(--white);
            text-decoration: none;
            border: 1px solid var(--primary-color);
            margin: 25px 0 35px;
            background: var(--primary-color);
        }

        .login-container .login-form .login-cta:hover {
            background: var(--login-cta-hover);
        }

        .login-container .onboarding {
            flex: 1;
            background: var(--slider-bg);
            display: none;
            width: 50%;
        }

        .login-container .login-form .login-form-group label .required-star {
            color: var(--primary-color);
            font-size: 18px;
            line-height: 10px;
        }

        .login-container .rounded-button {
            display: flex;
            width: 100%;
            text-decoration: none;
            border-radius: 50px;
            padding: 13px 20px;
            box-sizing: border-box;
            justify-content: center;
            font-size: 14px;
            font-weight: 500;
            align-items: center;
            transition: linear 0.2s;
        }

        .login-container .rounded-button:hover {
            box-shadow: 0px 0px 4px 0px var(--grey);
        }

        .login-container .body-text {
            font-size: 16.7px;
            font-weight: 500;
            color: var(--text);
        }

        .login-container .onboarding .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .login-container .onboarding .swiper-slide {
            text-align: center;
            font-size: 18px;
            font-weight: 400;
            color: var(--text);
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .login-container .onboarding .swiper-pagination-bullet-active {
            background-color: var(--primary-color);
        }

        .login-container .onboarding .swiper-slide {
            flex-direction: column;
            display: flex;
        }

        .login-container .onboarding .swiper-slide .slide-image img {
            width: 100%;
            height: 100%;
        }

        .login-container .onboarding .slide-content {
            width: 60%;
        }

        .login-container .onboarding .slide-content h2 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .login-container .onboarding .slide-content p {
            line-height: 22px;
            font-size: 16px;
            font-weight: 300;
        }

        .swiper-pagination-fraction,
        .swiper-pagination-custom,
        .swiper-container-horizontal>.swiper-pagination-bullets {
            bottom: 30px;
        }

        .login-container .login-form .login-form-inner h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 500;
            margin-top: 10px;
            color: var(--primary-color);
        }

        @media screen and (min-width: 768px) {
            .login-container .onboarding {
                display: flex;
            }
        }

        @media screen and (max-width: 767px) {
            .login-container {
                height: 100vh;
            }
        }

        @media screen and (width: 768px) {
            .login-container .onboarding {
                order: 0;
            }

            .login-container .login-form {
                order: 1;
            }

            .login-container {
                height: 100vh;
            }
        }

        @media screen and (max-width: 420px) {
            .login-container .login-form {
                padding: 20px;
            }

            .login-container .login-form-group {
                margin-bottom: 16px;
            }

            .login-container {
                margin: 0;
            }
        }
    </style>

    <body>
        <div class="login-container">
            <div class="login-form">
                <div class="login-form-inner">
                    <div class="logo">
                        <img src="{{ asset('img/finallogo.png') }}" alt="Logo">
                    </div>
                    <h1>تسجيل الدخول</h1>
                    <p class="body-text">ابدأ رحلتك في تقديم رعاية صحية استثنائية لتحقيق التميز.</p>
                    <div class="sign-in-seperator">
                        <span>تسجيل الدخول عبر البريد الإلكتروني</span>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login-form-group">
                            <label for="email">البريد الإلكتروني <span class="required-star">*</span></label>
                            <x-text-input id="email"
                                class="block mt-1 w-full focus:ring-2 focus:ring-green-500 focus:outline-none transition-all duration-300 ease-in-out"
                                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" dir="ltr" />
                            <x-input-error :messages=" $errors->get('email')" class="mt-2" />
                        </div>

                        <div class="login-form-group">
                            <label for="password">كلمة المرور <span class="required-star">*</span></label>
                            <x-text-input id="password"
                                class="block mt-1 w-full focus:ring-2 focus:ring-green-500 focus:outline-none transition-all duration-300 ease-in-out"
                                type="password" name="password" required autocomplete="current-password" dir="ltr" />
                            <x-input-error :messages=" $errors->get('password')" class="mt-2" />
                        </div>

                        <div class="login-form-group single-row">
                            <div class="custom-check">
                                <input autocomplete="off" type="checkbox" id="remember" name="remember">
                                <label for="remember">تذكرني</label>
                            </div>
                        </div>

                        <div class="login-form-group">
                            <x-primary-button
                                class="w-full px-6 py-2 bg-green-600 text-white hover:bg-green-500 focus:bg-green-500 active:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 rounded-md">
                                {{ __('تسجيل الدخول') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="onboarding">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/1.png') }}" alt="Slide 1" />
                            </div>
                            <div class="slide-content">
                                <h2>لوحة التحكم الشاملة</h2>
                                <p>إدارة جميع العمليات المتعلقة بالمجمع من مكان واحد. توفر لك تحليلات حية وإحصائيات دقيقة للمساعدة في اتخاذ القرارات.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/3.png') }}" alt="Slide 3" />
                            </div>
                            <div class="slide-content">
                                <h2>إدارة المواعيد</h2>
                                <p>إدارة المواعيد المحجوزة، متابعة تفاصيل المرضى وحالتهم، وإمكانية التواصل معهم عبر الهاتف أو الواتساب. حجز مواعيد جديدة بكل سهولة.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/5.png') }}" alt="Slide 5" />
                            </div>
                            <div class="slide-content">
                                <h2>إدارة المرضى</h2>
                                <p>عرض قائمة المرضى، إضافة مرضى جدد، وتقييم حالتهم. كما يمكن تحديث بياناتهم وإدارة المواعيد الخاصة بهم.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/2.png') }}" alt="Slide 2" />
                            </div>
                            <div class="slide-content">
                                <h2>إدارة الموظفين</h2>
                                <p>عرض قائمة الموظفين، إضافة موظفين جدد، وتخصيص الأذونات لهم. سهولة في تحديث بياناتهم وتتبع أنشطتهم.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/6.png') }}" alt="Slide 6" />
                            </div>
                            <div class="slide-content">
                                <h2>إدارة رسائل التواصل من العملاء</h2>
                                <p>إدارة رسائل العملاء بخصوص الشكر والشكاوى والاقتراحات. متابعة الطلبات والرد عليها بسهولة وسرعة.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/4.png') }}" alt="Slide 4" />
                            </div>
                            <div class="slide-content">
                                <h2>إدارة الفواتير</h2>
                                <p>عرض الفواتير السابقة، إحصائيات شاملة عن المدفوعات وطرق الدفع، وإمكانية إنشاء رمز QR لكل فاتورة لتحسين الوصول والدفع.</p>
                            </div>
                        </div>
                        <div class="swiper-slide color-1">
                            <div class="slide-image">
                                <img src="{{ asset('img/7.png') }}" alt="Slide 7" />
                            </div>
                            <div class="slide-content">
                                <h2>لوحة تحكم متكاملة للصفحة الرئيسية</h2>
                                <p>تمكنك هذه اللوحة من إدارة محتوى الصفحة الرئيسية بشكل كامل، حيث يمكنك إضافة المدونات والصور والمقالات بسهولة، مما يتيح لك تخصيص الصفحة بما يتناسب مع احتياجاتك وزيادة تفاعل المستخدمين.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/js/swiper.min.js"></script>

        <script>
            var swiper = new Swiper(".swiper-container", {
                pagination: ".swiper-pagination",
                paginationClickable: true,
                parallax: true,
                speed: 600,
                autoplay: 3500,
                loop: true,
                grabCursor: true
            });
        </script>
    </body>
</x-guest-layout>