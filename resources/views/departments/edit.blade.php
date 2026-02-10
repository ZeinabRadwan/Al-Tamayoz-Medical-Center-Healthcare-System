@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>تعديل القسم</h1>
    </header>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">اسم القسم</label>
            <input type="text" id="name" name="name" value="{{ old('name', $department->name) }}" required placeholder="أدخل اسم القسم" class="form-control">
        </div>
        <div class="form-actions d-flex justify-content-between mt-4">

            <button type="submit" class="btn btn-submit">تحديث</button>
            <a href="{{ route('departments.index') }}" class="btn btn-back">
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

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        font-size: 1.1rem;
        font-weight: 500;
        color: #333;
    }

    .form-control {
        padding: 14px;
        font-size: 1rem;
        border-radius: 8px;
        border: 1px solid #ddd;
        width: 100%;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #2C6E49;
        box-shadow: 0 0 5px rgba(44, 110, 73, 0.5);
        outline: none;
    }

    .btn-submit {
        background-color: #2C6E49;
        color: white;
        padding: 10px 35px;
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

    /* Accessibility and mobile responsiveness improvements */
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

    /* Error messages styling */
    .text-danger {
        font-size: 0.9rem;
    }
</style>
@endsection