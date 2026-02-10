@extends('layouts.app')

@section('content')
<div class="container">
    <header class="mb-5">
        <h1>
            طلب إجازة
        </h1>
    </header>

    <form method="POST" action="{{ route('vacations.store') }}">
        @csrf

        <div class="form-grid mt-5">
            <div class="form-group">

                <label for="start_date" class="form-label">تاريخ البدء</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" required>
                @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date" class="form-label">تاريخ الانتهاء</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" required>
                @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn">إرسال</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    .container {
        direction: rtl;
        text-align: right;
        margin: 0 auto;
        max-width: 94%;
        margin-right: 5%;
    }

    header {
        text-align: center;
        padding: 10px 20px;
        margin-top: 0;
        margin-bottom: 20px;
        border-radius: 0 0 15px 15px;
        background-image: linear-gradient(to right, #cbe4c7, #a3d8a1);
    }

    header h1 {
        color: #567357;
        font-size: 2rem;
        margin: 0;
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

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #567357;
        border-radius: 5px;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #4a6b4a;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-grid .form-group {
        width: 100%;
    }

    .btn {
        margin-top: 20px;
        color: #567357;
        background-color: transparent;
        border: 1px solid #567357;
        padding: 10px 25px;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 16px;
    }

    button:hover {
        background-color: #4a6b4a;
        color: #fff;
    }

    @media (max-width: 768px) {
        .container {
            margin: 2% auto;
            max-width: 94%;
            margin-right: 6%;
        }

        header {
            margin-right: 8%;
        }

        header h1 {
            font-size: 1.5rem;
        }

        .form-group input,
        .form-group select {
            font-size: 14px;
            padding: 8px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
        }

        .back-btn {
            padding: 8px 12px;
            font-size: 14px;
            margin-bottom: 10px;
        }
    }
</style>
@endsection