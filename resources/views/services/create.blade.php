@extends('layouts.app')

@section('content')
<div class="container">
    <header class="text-center mb-5">
        <h1>إضافة خدمة جديدة</h1>
    </header>

    <form action="{{ route('services.store') }}" method="POST" class="service-form">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">اسم الخدمة</label>
            <input type="text" name="name" class="form-control" placeholder="ادخل اسم الخدمة" required>
        </div>

        <div class="form-group">
            <label for="price" class="form-label">سعر الخدمة</label>
            <input type="number" step="0.01" name="price" class="form-control" placeholder="ادخل سعر الخدمة" required>
        </div>

        <div class="form-group">
            <label for="department_id" class="form-label">اختر القسم</label>
            <select name="department_id" id="department_id" class="form-control" required>
                <option value="">اختر القسم</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-actions d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-submit">إضافة</button>
            <a href="{{ route('services.index') }}" class="btn btn-back">
                الرجوع إلي الخلف
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </form>
</div>

<style>
    .container {
        padding: 40px;
        margin: 0 auto;
    }

    .page-title {
        font-size: 2.5rem;
        color: #2C6E49;
        margin-bottom: 20px;
        text-align: center;
    }

    .service-form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        font-size: 1rem;
        font-weight: 500;
        color: #333;
    }

    .form-control {
        padding: 14px;
        font-size: 1rem;
        border-radius: 8px;
        border: 1px solid #ddd;
        width: 100%;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #2C6E49;
        outline: none;
    }

    .btn-submit {
        background-color: #2C6E49;
        color: white;
        padding: 12px 35px;
        border: none;
        border-radius: 15px;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .btn-back {
        color: #2C6E49;
        background-color: transparent;
        border: 2px solid #2C6E49;
        padding: 10px 35px;
        border-radius: 15px;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-back i {
        margin-right: 8px;
    }

    .form-actions {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        .page-title {
            font-size: 2rem;
        }

        .btn-submit,
        .btn-back {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .form-control {
            padding: 12px;
        }
    }
</style>
@endsection