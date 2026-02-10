@extends('layouts.app')
<style>
    :root {
        --green: #73C36A;
        --purple: #9C80D7;
        --gray: #C0C0C0;
        --white: #FFF;
    }

    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .settings-card {
        background: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-top: 2rem;
    }

    .page-title {
        color: var(--purple);
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        border-right: 4px solid var(--green);
        padding-right: 1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #333;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid var(--gray);
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--purple);
        box-shadow: 0 0 0 3px rgba(156, 128, 215, 0.2);
    }

    .file-upload-wrapper {
        position: relative;
        margin-bottom: 1rem;
    }

    .custom-file-upload {
        border: 2px dashed var(--gray);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .custom-file-upload:hover {
        border-color: var(--green);
        background-color: rgba(115, 195, 106, 0.1);
    }

    .btn-submit {
        background-color: var(--green) !important;
        color: var(--white) !important;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #5fa357;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(115, 195, 106, 0.3);
    }

    .upload-icon {
        color: var(--gray);
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .settings-card {
            padding: 1.5rem;
        }
    }
</style>
@section('content')

<div class="container">
    <div class="settings-card">
        <h3 class="page-title">الصورة الرئيسية</h3>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('settings.main_image.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="main_image" class="form-label">تحديث الصورة الرئيسية:</label>
                <div class="custom-file-upload">
                    <div class="upload-icon">📁</div>
                    <p>اسحب وأفلت الملف هنا أو انقر للاختيار</p>
                    <input type="file" name="main_image" id="main_image" class="form-control" style="display: none;">
                </div>
            </div>

            <button type="submit" class="btn-submit">تحديث الصورة الرئيسية</button>
        </form>
    </div>
</div>

<script>
    document.querySelector('.custom-file-upload').addEventListener('click', function() {
        document.querySelector('#main_image').click();
    });

    document.querySelector('#main_image').addEventListener('change', function() {
        const fileName = this.files[0]?.name;
        if (fileName) {
            document.querySelector('.custom-file-upload p').textContent = fileName;
        }
    });
    setTimeout(function() {
        const alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 2000);
</script>
@endsection