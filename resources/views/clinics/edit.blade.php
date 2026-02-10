@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>تعديل العيادة</h1>
    </header>

    <form action="{{ route('clinics.update', $clinic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label for="name">اسم العيادة</label>
                <input type="text" name="name" class="form-control" value="{{ $clinic->name }}" required placeholder="أدخل اسم العيادة">
            </div>
            <div class="form-group">
                <label for="session_duration">مدة الجلسة (دقائق)</label>
                <input type="number" name="session_duration" class="form-control" value="{{ $clinic->session_duration }}" required placeholder="أدخل مدة الجلسة">
            </div>
            <div class="form-group">
                <label for="department_id">القسم</label>
                <div class="custom-select-container">
                    <select name="department_id" class="form-control" required>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $clinic->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="visit_price">سعر الزيارة</label>
                <input type="number" step="0.01" name="visit_price" class="form-control" value="{{ $clinic->visit_price }}" required placeholder="أدخل سعر الزيارة">
            </div>
        </div>
        
        <div class="form-group">
            <label for="work_days">أيام العمل</label>
            <div class="work-days">
                @php
                    $days = ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'];
                    $selectedDays = json_decode($clinic->work_days, true) ?? [];
                @endphp
                @foreach($days as $day)
                    <label class="work-day">
                        <input type="checkbox" name="work_days[]" value="{{ $day }}"
                            @if(in_array($day, $selectedDays)) checked @endif>
                        <span>{{ $day }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        
        <button type="submit">تحديث العيادة</button>
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

    .work-days {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
    }

    .work-day {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
        color: #567357;
    }

    .work-day input {
        width: auto;
        margin-right: 8px;
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

    .custom-select-container {
        position: relative;
    }

    .form-group select {
        appearance: none;
        padding-right: 30px; 
    }

    .form-group select:after {
        content: '▲'; 
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 12px;
        color: #567357;
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
