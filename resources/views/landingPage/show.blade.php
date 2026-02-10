@extends('layouts.front')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>
                            {{ $blog->title }}
                        </h1>
                        <p class="mb-0">O
                            {{ $blog->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="
                        {{ route('blogs.showAll') }}
                    ">
                            الرئيسية
                        </a></li>
                    <li class="current">
                        {{ $blog->title }}
                    </li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <section id="starter-section" class="starter-section section">
        <!-- Section Title -->
        <!-- <div class="container section-title" data-aos="fade-up">
            <h2>Starter Section</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12">
                    @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}"
                        alt="{{ $blog->title }}"
                        class="img-fluid rounded shadow"
                        style="width: 100%; max-height: 300px; object-fit: cover;">
                    @else
                    <div class="placeholder-image d-flex align-items-center justify-content-center"
                        style="width: 100%; height: 300px; background-color: #f0f0f0; border-radius: 8px;">
                        <span style="color: #999; font-size: 1.2rem;">No Image Available</span>
                    </div>
                    @endif
                </div>
                <div class="col-lg-12 mt-5">
                    <h3 class="text-center">{{ $blog->title }}</h3>
                    <p>
                        {!! $blog->content !!}
                    </p>
                </div>
            </div>
        </div>
    </section>


</main>



@endsection