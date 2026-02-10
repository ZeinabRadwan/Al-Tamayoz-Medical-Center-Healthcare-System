<html>

<body>
    <nav class="main-menu">
        <ul style="margin-bottom: 15px;">
            <div class="flex items-center gap-6">
                @if (auth()->user()->image)
                <img
                    class="w-14 h-14 rounded-full"
                    src="{{ asset('storage/' . auth()->user()->image) }}"
                    alt="User profile">
                @else
                <img
                    class="w-14 h-14 rounded-full"
                    src="https://img.freepik.com/premium-vector/avatar-profile-icon-flat-style-female-user-profile-vector-illustration-isolated-background-women-profile-msign-business-concept_157943-38866.jpg?semt=ais_hybrid"
                    alt="User profile">
                @endif
                <div class="font-medium text-white">
                    <div>
                        {{ auth()->user()->name }}
                    </div>
                    <div class="text-sm text-white">
                        {{ auth()->user()->roles->pluck('name')->first() ?? 'User' }}
                    </div>
                </div>
            </div>
        </ul>
        <ul>
            @can('عرض لوحة التحكم')
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-solid fa-chart-simple" style="margin-top:10px;"></i>
                    <span class="nav-text">
                        لوحة التحكم
                    </span>
                </a>
            </li>
            @endcan
            @can('عرض قائمة الموظفين')
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">
                        الموظفين
                    </span>
                </a>
            </li>
            @endcan
            @role('ادمن')
            <li>
                <a href="{{ route('vacations.admin') }}">
                    <i class="fa fa-solid fa-person-walking-arrow-right"></i>
                    <span class="nav-text">
                        طلبات الاجازة
                    </span>
                </a>
            </li>
            @endrole
            @unlessrole('ادمن')
            <li>
                <a href="{{ route('vacations.index') }}">
                    <i class="fa fa-solid fa-person-walking-arrow-right"></i>
                    <span class="nav-text">
                        طلب أجازة
                    </span>
                </a>
            </li>
            @endunlessrole
            @can('عرض قائمة المرضى')
            <li>
                <a href="{{ route('patients.index') }}">
                    <i class="fa fa-wheelchair"></i>
                    <span class="nav-text">
                        المرضى
                    </span>
                </a>
            </li>
            @endcan
            @can('إدارة الفواتير')
            <li>
                <a href="/billing">
                    <i class="fa-solid fa-receipt fa"></i>
                    <span class="nav-text">
                        الفواتير
                    </span>
                </a>
            </li>
            @endcan
            @can('إدارة المواعيد')
            <li>
                <a href="/appointments">
                    <i class="fa fa-solid fa-calendar-check"></i>
                    <span class="nav-text">
                        المواعيد
                    </span>
                </a>
            </li>
            @endcan
            @can('إضافة عيادة')
            <li>
                <!-- <a href="/clinics"> -->
                <a href="{{ auth()->user()->hasRole('أخصائي') ? route('clinics.showstaff', auth()->user()->clinic_id) : route('clinics.index') }}">
                    <i class="fa fa-solid fa-house-chimney-medical"></i>
                    <span class="nav-text">
                        العيادات
                    </span>
                </a>
            </li>
            @endcan
            @can('إدارة الاقسام')
            <li>
                <a href="/departments">
                    <i class="fa fa-regular fa-hospital"></i>
                    <span class="nav-text">
                        الأقسام
                    </span>
                </a>
            </li>
            @endcan
            @can('إدارة الخدمات')
            <li>
                <a href="/services">
                    <i class="fa-solid fa-hospital-user fa"></i>
                    <span class="nav-text">
                        الخدمات
                    </span>
                </a>
            </li>
            @endcan
            @can('رسائل التواصل')
            <li>
                <a href="/contacts">
                    <i class="fa-solid fa-comment-medical fa"></i>
                    <span class="nav-text">
                        رسائل التواصل
                    </span>
                </a>
            </li>
            @endcan
            @can('إدارة الصلاحيات')
            <li>
                <a href="{{ route('manage.privileges.index') }}">
                    <i class="fa-solid fa-user-lock fa"></i>
                    <span class="nav-text">
                        صلاحيات المستخدم
                    </span>
                </a>
            </li>
            @endcan
            @role('ادمن')
            <li>
                <a href="{{ route('roles.index') }}">
                    <i class="fa-solid fa-users-gear fa"></i>
                    <span class="nav-text">
                        صلاحيات الأدوار
                    </span>
                </a>
            </li>
            @endrole
            @can('التحكم بالموقع')
            <li>
                <a href="{{ route('blogs.index') }}">
                    <i class="fa-solid fa-laptop-code fa"></i>
                    <span class="nav-text">
                        التحكم بالويبسايت
                    </span>
                </a>
            </li>
            @endcan
        </ul>
        <ul class="logout">
            <li>
                <form action="{{ route('logout') }}" method="POST"
                    style="display: flex; align-items: center; gap: 8px; color: white;">
                    @csrf
                    <i class="fa fa-power-off" style="margin-top:10px;"></i>
                    <button type="submit"
                        style="background: none; border: none; font-size: 16px; color: inherit; cursor: pointer;         font-family: 'Titillium Web', sans-serif;">
                        تسجيل الخروج
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</body>

<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css);
    @import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

    .fa {
        position: relative;
        display: table-cell;
        width: 60px;
        height: 30px;
        text-align: center;
        vertical-align: middle;
        font-size: 1.2em;
    }

    .main-menu:hover,
    nav.main-menu.expanded {
        width: 250px;
        overflow: visible;
    }

    .main-menu {
        background: #1d5c14;
        top: 0;
        position: fixed;
        bottom: 0;
        height: 100%;
        right: 0;
        width: 60px;
        overflow: hidden;
        -webkit-transition: width .05s linear;
        transition: width .05s linear;
        -webkit-transform: translateZ(0) scale(1, 1);
        z-index: 100;
    }

    .main-menu>ul {
        margin: 5px 0;
    }

    .main-menu li {
        position: relative;
        display: block;
        width: 250px;
        margin: 10px 0;
        height: 37px;
    }

    .main-menu li>a {
        position: relative;
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
        color: rgba(255, 255, 255, 0.5);
        font-family: arial;
        font-size: 17px;
        text-decoration: none;
        -webkit-transition: all .1s linear;
        transition: all .1s linear;
    }

    .main-menu ul li:hover {
        background-color: #1a700e;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        transition: background-color 0.3s ease;
    }

    .main-menu .nav-text {
        position: relative;
        display: table-cell;
        vertical-align: middle;
        width: 190px;
        font-family: 'Titillium Web', sans-serif;
    }

    .main-menu>ul.logout {
        position: absolute;
        left: 0;
        bottom: 0;
    }

    nav ul,
    nav li {
        outline: 0;
        margin: 0;
        padding: 0;
    }

    .main-menu li.active>a {
        color: #1d5c14;
        height: 40px;
        background-color: #fff;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        transition-duration: 0.3s;
        transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .main-menu li.active {
        transition: background-color 0.3s ease;
    }
    @media print {
        .main-menu {
            display: none !important;
        }
        
        nav {
            display: none !important;
        }
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.main-menu li');
        const currentUrl = window.location.href;
        menuItems.forEach(item => {
            const link = item.querySelector('a');
            if (link && link.href === currentUrl) {
                item.classList.add('active');
            }
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
    });
</script>

</html>
