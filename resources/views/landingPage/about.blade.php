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
                            عن المجمع
                        </h1>

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
                        عن المجمع
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
                    <div class="row">
                        {!! $aboutUs !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>



@endsection