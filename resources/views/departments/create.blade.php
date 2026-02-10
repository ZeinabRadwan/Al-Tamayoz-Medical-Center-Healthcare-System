@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>إضافة قسم جديد</h1>
    </header>

    <!-- Department Form -->
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم القسم</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="أدخل اسم القسم">
        </div>

        <div class="form-actions d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-submit">إنشاء</button>
            <a href="{{ route('departments.index') }}" class="btn btn-back">
                الرجوع إلي الخلف
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </form>
</div>

<style>
    .container {
        padding: 20px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-out;
        color: #333;
    }

    .page-title {
        font-size: 2.5rem;
        color: #2C6E49;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 1rem;
        color: #567357;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #567357;
        border-radius: 5px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #4a6b4a;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
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

    @media (max-width: 768px) {
        .container {
            margin: 2% auto;
            max-width: 94%;
            margin-right: 6%;
        }

        .page-title {
            font-size: 1.8rem;
        }

        .form-group input {
            font-size: 14px;
            padding: 8px;
        }

        .form-actions {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-submit,
        .btn-back {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>
@endsection
