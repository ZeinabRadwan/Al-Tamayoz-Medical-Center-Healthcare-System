@extends('layouts.app')


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

    .btn-success {
        background-color: #28a745;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #c3e6cb;
        font-size: 1rem;
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

    .btn {
        display: inline-block;
        margin-bottom: 20px;
        color: #567357;
        background-color: transparent;
        border: 1px solid #567357;
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn:hover {
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
            padding: 10px 15px;
        }

        .form-container {
            padding: 30px 25px;
        }

        .btn {
            width: 100%;
            padding: 15px 25px;
        }

        .form-label {
            font-size: 14px;
        }
    }
</style>
@endsection


@section('content')
<div class="container ">
    <header class="mb-4">
        <h1 class="page-title">
            إضافة موظف
        </h1>
    </header>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="form-container mx-auto">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="ادخل الاسم">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">الصلاحية <span class="text-danger">*</span></label>
                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}" placeholder="اختر الصلاحية">
                            <option selected>اختر الصلاحية</option>
                            @foreach( $roles as $role)
                            <option value="{{  $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_number" class="form-label">رقم الهوية</label>
                        <input type="text" class="form-control @error('id_number') is-invalid @enderror" id="id_number" name="id_number" value="{{ old('id_number') }}" placeholder="ادخل رقم الهوية">
                        @error('id_number')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">تاريخ الميلاد</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                        @error('dob')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">العنوان</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="ادخل العنوان">
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="qualification" class="form-label">المؤهل</label>
                        <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" value="{{ old('qualification') }}" placeholder="ادخل المؤهل">
                        @error('qualification')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">التخصص</label>
                        <input type="text" class="form-control @error('major') is-invalid @enderror" id="major" name="major" value="{{ old('major') }}" placeholder="ادخل التخصص">
                        @error('major')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="clinic_id" class="form-label">العيادة</label>
                        <select class="form-select @error('clinic_id') is-invalid @enderror" id="clinic_id" name="clinic_id">
                            <option selected>اختر العيادة</option>
                            @foreach( $clinics as $clinic)
                            <option value="{{  $clinic->id }}">{{ $clinic->name }}</option>
                            @endforeach
                        </select>
                        @error('clinic_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="job_title" class="form-label">الوظيفة </label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{ old('job_title') }}" placeholder="ادخل الوظيفة">
                        @error('job_title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">تاريخ المباشرة </label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">رقم الجوال <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="ادخل رقم الجوال">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salary_rate" class="form-label">نسبة الأجر</label>
                        <input type="number" class="form-control @error('salary_rate') is-invalid @enderror" id="salary_rate" name="salary_rate" value="{{ old('salary_rate') }}" placeholder="ادخل سعر الراتب">
                        @error('salary_rate')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="ادخل البريد الإلكتروني">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="ادخل كلمة المرور">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="department_id" class="form-label">القسم</label>
                        <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                            <option selected>اختر القسم</option>
                            @foreach( $departments as $department)
                            <option value="{{  $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>



                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn">إنشاء</button>
                </div>
        </form>
    </div>
</div>
@endsection