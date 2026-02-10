@extends('layouts.front')
@section('content')

<main class="main">

    <section id="hero" class="hero section light-background" style="position: relative; overflow: hidden;">

        @if($mainImage && file_exists(storage_path('app/public/' . $mainImage)))
        <img src="{{ asset('storage/' . $mainImage) }}" alt="Main Image" style="width: 100%; height: auto; display: block;">
        @else
        <img src="{{ asset('storage/images/main1.jpeg') }}" alt="Main Image" style="width: 100%; height: auto; display: block;">
        @endif
        <div class="container position-relative">

            <div class="welcome" data-aos="fade-up">
                <h2>يداً بيد لنصنع لهم مستقبلاً مشرقاً</h2>
                <p style="margin-top: 30px; margin-bottom: 50px;">يقدم المجمع خدماته للإناث تحت أي سن، وللذكور حتى عمر 15 سنة</p>
                <a href="{{  route('blogs.aboutUs') }}" class="btn-submit mt-5">استكشاف المزيد</a>
            </div>
        </div>

    </section>

    <section id="stats" class="stats-section">
        <div class="container" data-aos="fade-up">
            <div class="blog-slider">
                @foreach ($blogs as $blog)
                <div class="blog-card">
                    <div class="blog-image">
                        @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        @else
                        <img src="{{ asset('storage/images/blog1.jpg') }}" alt="Main Image" style="width: 100%; height: auto; display: block;">
                        @endif
                        <div class="blog-overlay"></div>
                    </div>
                    <div class="blog-content">
                        <h3>{{ $blog->title }}</h3>
                        <a href="{{ route('blogs.showBlog', $blog->id) }}" class="read-more">اقرأ المزيد</a>
                    </div>
                </div>
                @endforeach
                @if($blogs->isEmpty())
                @foreach (['blog1.jpg', 'blog2.jpg', 'blog3.jpg', 'blog4.jpg'] as $image)
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('storage/images/' . $image) }}" alt="Main Blog Image">
                        <div class="blog-overlay"></div>
                    </div>
                    <div class="blog-content">
                        <h3>عنوان المدونة الرئيسية</h3>
                        <a href="{{ route('blogs.aboutUs') }}" class="read-more">اقرأ المزيد</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="slider-nav">
                <button class="prev-btn" aria-label="Previous slide">❮</button>
                <button class="next-btn" aria-label="Next slide">❯</button>
            </div>
        </div>

        <style>

        </style>

    </section>



    <section id="about" class="about-section">
        <div class="container">
            <div class="about-wrapper">
                <div class="about-card vision">
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor">
                                <path d="M12 6C7 6 2.73 9.11 1 13.5 2.73 17.89 7 21 12 21s9.27-3.11 11-7.5C21.27 9.11 17 6 12 6zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" stroke-width="1.5" />
                            </svg>
                        </div>
                        <h3>رؤيتنا</h3>
                        <div class="content-area">
                            {!! $aboutUsSections['vision'] !!}
                        </div>
                        <a href="{{ route('blogs.aboutUs') }}" class="more-btn">المزيد</a>
                    </div>
                    <div class="card-decoration"></div>
                </div>

                <div class="about-card who-we-are">
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" stroke-width="1.5" />
                            </svg>
                        </div>
                        <h3>من نحن</h3>
                        <div class="content-area">
                            {!! $aboutUsSections['who_we_are'] !!}
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
        </div>
    </section>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($galleryImages as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <a
                    href="{{ route('blogs.showGallery') }}">

                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Gallery Image">
                </a>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <section id="contact" class="contact-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>تواصل معنا</h2>
                <div class="title-decoration"></div>
            </div>

            <div class="contact-wrapper">
                <div class="contact-card main-card" data-aos="fade-up">
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>مجمع التميز الشامل للتأهيل الطبي</h3>
                        <div class="contact-details">
                            {!! $contactUs !!}
                        </div>
                    </div>
                </div>

                <div class="options-grid">
                    <div class="option-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-wrapper">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>شكر</h4>
                        <a href="{{ route('contact', ['type' => 'thanks']) }}" class="action-btn">تقديم شكر</a>
                    </div>

                    <div class="option-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-wrapper">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <h4>شكاوى</h4>
                        <a href="{{ route('contact', ['type' => 'complaints']) }}" class="action-btn">تقديم شكوى</a>
                    </div>

                    <div class="option-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-wrapper">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>مقترحات</h4>
                        <a href="{{ route('contact', ['type' => 'suggestions']) }}" class="action-btn">تقديم اقتراح</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    :root {
        --green: #73C36A;
        --purple: #9C80D7;
        --gray: #C0C0C0;
        --white: #FFF;
    }

    #hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.4));
        z-index: 1;
    }

    #hero .welcome h2 {
        animation: fadeInDown 1.5s ease-in-out;
        font-size: 2.5rem;
    }

    #hero .welcome p {
        animation: fadeInUp 1.5s ease-in-out;
    }

    #hero .welcome a {
        transition: all 0.3s ease;
    }

    #hero .welcome a:hover {
        transform: translateY(-2px) !important;
    }

    .welcome {
        background: rgba(255, 255, 255, 0.95);
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        text-align: center;
        transform: translateY(0);
        transition: all 0.3s ease !important;
        backdrop-filter: blur(10px);
    }

    h2 {
        color: #9C80D7;
        margin-bottom: 1.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    p {
        color: #666;
        font-size: 1.25rem;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    img {
        height: 100vh;
    }

    .btn-submit {
        background-color: var(--green) !important;
        color: var(--white) !important;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 20px !important;
        transition: all 0.3s ease !important;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 1200px) {
        #hero .welcome {
            padding: 2rem;
        }

        h2 {
            font-size: 2.25rem;
        }

        p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 992px) {
        #hero .welcome {
            padding: 1.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        p {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        #hero .welcome {
            padding: 1rem;
        }

        h2 {
            font-size: 1.75rem;
        }

        p {
            font-size: 0.9rem;
        }

        .btn-submit {
            padding: 0.5rem 1.5rem;
        }
    }

    @media (max-width: 576px) {
        #hero .welcome {
            padding: 0.75rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        p {
            font-size: 0.8rem;
        }

        .btn-submit {
            font-size: 0.85rem;
        }
    }

    .stats-section {
        background: linear-gradient(135deg, #73C36A20, #9C80D720);
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #73C36A, #9C80D7);
    }

    .container {
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
    }

    .blog-slider {
        display: flex;
        gap: 2rem;
        overflow-x: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
        -ms-overflow-style: none;
        padding: 1rem;
    }

    .blog-slider::-webkit-scrollbar {
        display: none;
    }

    .blog-card {
        flex: 0 0 300px;
        background: #FFF;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .blog-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.1);
    }

    .blog-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50%;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
    }

    .placeholder-image {
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #C0C0C0, #e0e0e0);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
    }

    .blog-content {
        padding: 1.5rem;
        text-align: center;
    }

    .blog-content h3 {
        color: #333;
        font-size: 1.2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .read-more {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: #73C36A;
        color: #FFF;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 500;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .read-more:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(115, 195, 106, 0.3);
    }

    .slider-nav {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
        padding: 0 1rem;
    }

    .slider-nav button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        color: #73C36A;
        font-size: 1.2rem;
        cursor: pointer;
        pointer-events: auto;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .slider-nav button:hover {
        background: #73C36A;
        color: #FFF;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .blog-card {
            flex: 0 0 280px;
        }

        .blog-content h3 {
            font-size: 1rem;
        }

        .read-more {
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }
    }

    .about-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(115, 195, 106, 0.1), rgba(156, 128, 215, 0.1));
        position: relative;
        overflow: hidden;
    }

    .about-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(115, 195, 106, 0.1) 0%, transparent 70%);
        transform: rotate(-45deg);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
    }

    .about-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        position: relative;
    }

    .about-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .about-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-decoration {
        position: absolute;
        top: 0;
        right: 0;
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #73C36A, #9C80D7);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(50%, -50%);
        transition: all 0.3s ease;
    }

    .about-card:hover .card-decoration {
        transform: translate(50%, -50%) scale(1.2);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #73C36A, #9C80D7);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        transform: rotate(-5deg);
        transition: all 0.3s ease;
    }

    .about-card:hover .icon-wrapper {
        transform: rotate(0deg) scale(1.1);
    }

    .icon {
        width: 30px;
        height: 30px;
        color: #FFF;
    }

    h3 {
        color: #333;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #73C36A, #9C80D7);
        border-radius: 2px;
    }

    .content-area {
        color: #666;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .content-area p {
        margin-bottom: 1rem;
    }

    .more-btn {
        display: inline-block;
        padding: 0.8rem 2rem;
        background: linear-gradient(45deg, #73C36A, #9C80D7);
        color: #FFF !important;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(115, 195, 106, 0.3);
        position: relative;
        overflow: hidden;
    }

    .more-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #9C80D7, #73C36A);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .more-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(156, 128, 215, 0.4);
    }

    .more-btn:hover::before {
        opacity: 1;
    }

    .more-btn span {
        position: relative;
        z-index: 1;
    }

    @media (max-width: 768px) {
        .about-section {
            padding: 3rem 0;
        }

        .about-card {
            padding: 1.5rem;
        }

        h3 {
            font-size: 1.5rem;
        }

        .icon-wrapper {
            width: 50px;
            height: 50px;
        }

        .icon {
            width: 25px;
            height: 25px;
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .about-card {
        animation: float 6s ease-in-out infinite;
    }

    .vision {
        animation-delay: 0s;
    }

    .who-we-are {
        animation-delay: -3s;
    }

    .carousel-inner img {
        max-height: 500px;
        object-fit: cover;
        width: 100%;
    }

    .contact-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(115, 195, 106, 0.1), rgba(156, 128, 215, 0.1));
        position: relative;
        overflow: hidden;
    }

    .contact-section::before,
    .contact-section::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(115, 195, 106, 0.1), rgba(156, 128, 215, 0.1));
        z-index: 0;
    }

    .contact-section::before {
        top: -150px;
        right: -150px;
    }

    .contact-section::after {
        bottom: -150px;
        left: -150px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .title-decoration {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #73C36A, #9C80D7);
        margin: 0 auto;
        border-radius: 2px;
        position: relative;
    }

    .title-decoration::before,
    .title-decoration::after {
        content: '';
        position: absolute;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        top: -2px;
        background: #73C36A;
    }

    .title-decoration::before {
        left: -4px;
    }

    .title-decoration::after {
        right: -4px;
        background: #9C80D7;
    }

    .contact-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        max-width: 800px;
        margin: 0 auto;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-inner {
        padding: 3rem;
        text-align: center;
        position: relative;
    }

    .icon-wrapper {
        width: 100px;
        height: 100px;
        margin: 0 auto 2rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(45deg, #73C36A, #9C80D7);
        opacity: 0.2;
        animation: pulse 2s infinite;
    }

    .fas.fa-heartbeat {
        font-size: 2.5rem;
        color: #9C80D7;
        position: relative;
        z-index: 1;
        animation: beat 1s infinite alternate;
    }

    .content {
        position: relative;
    }

    .content h3 {
        color: #333;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .content p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .contact-btn {
        display: inline-block;
        padding: 1rem 2.5rem;
        background: linear-gradient(45deg, #73C36A, #9C80D7);
        color: #FFF !important;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 500;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
    }

    .contact-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(115, 195, 106, 0.3);
    }

    .btn-decoration {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #9C80D7, #73C36A);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .contact-btn:hover .btn-decoration {
        opacity: 1;
    }

    .contact-btn span {
        position: relative;
        z-index: 1;
    }

    @keyframes pulse {
        0% {
            transform: scale(0.95);
            opacity: 0.5;
        }

        70% {
            transform: scale(1.1);
            opacity: 0.2;
        }

        100% {
            transform: scale(0.95);
            opacity: 0.5;
        }
    }

    @keyframes beat {
        from {
            transform: scale(1);
        }

        to {
            transform: scale(1.1);
        }
    }

    @media (max-width: 768px) {
        .contact-section {
            padding: 3rem 0;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .card-inner {
            padding: 2rem;
        }

        .content h3 {
            font-size: 1.5rem;
        }

        .content p {
            font-size: 1rem;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
        }

        .fas.fa-heartbeat {
            font-size: 2rem;
        }
    }

    .contact-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(115, 195, 106, 0.1), rgba(156, 128, 215, 0.1));
        position: relative;
        overflow: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title h2 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .title-decoration {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #73C36A, #9C80D7);
        margin: 0 auto;
        border-radius: 2px;
    }

    .contact-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    .main-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
    }

    .main-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 2rem;
        background: linear-gradient(45deg, #73C36A, #9C80D7);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .icon-wrapper i {
        font-size: 2rem;
        color: #FFF;
    }

    .contact-details {
        margin-top: 2rem;
        color: #666;
        line-height: 1.8;
    }

    .contact-details a {
        color: #73C36A;
        transition: color 0.3s ease;
    }

    .contact-details a:hover {
        color: #9C80D7;
    }

    .options-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .option-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .option-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .option-card .icon-wrapper {
        width: 60px;
        height: 60px;
        margin-bottom: 1.5rem;
    }

    .option-card .icon-wrapper i {
        font-size: 1.5rem;
    }

    h3 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    h4 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .action-btn {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: linear-gradient(45deg, #73C36A, #9C80D7);
        color: #FFF !important;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(115, 195, 106, 0.3);
        background: linear-gradient(45deg, #9C80D7, #73C36A);
    }

    @media (max-width: 768px) {
        .contact-section {
            padding: 3rem 0;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .main-card {
            padding: 2rem;
        }

        h3 {
            font-size: 1.5rem;
        }

        h4 {
            font-size: 1.2rem;
        }

        .option-card {
            padding: 1.5rem;
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .option-card {
        animation: float 6s ease-in-out infinite;
    }

    .option-card:nth-child(1) {
        animation-delay: 0s;
    }

    .option-card:nth-child(2) {
        animation-delay: -1.5s;
    }

    .option-card:nth-child(3) {
        animation-delay: -3s;
    }

    .option-card:nth-child(4) {
        animation-delay: -4.5s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.blog-slider');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const cardWidth = 320;

        if (slider.scrollWidth > slider.clientWidth) {
            document.querySelector('.slider-nav').style.display = 'flex';
        } else {
            document.querySelector('.slider-nav').style.display = 'none';
        }

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: cardWidth,
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: -cardWidth,
                behavior: 'smooth'
            });
        });
    });
</script>


@endsection