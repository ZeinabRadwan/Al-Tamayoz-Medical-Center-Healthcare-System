@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>تعديل الموظف {{ old('name', $user->name) }}</h1>
        </header>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-2" name="tabs" onclick="window.location.href='/users/create';" />
                <label class="tab" for="radio-2">تعديل الموظف</label>
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/users';" />
                <label class="tab" for="radio-1">إجمالي
                    الموظفين</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="name">الاسم</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}"
                        required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="first_name">الاسم الأول</label>
                    <input type="text" name="first_name" class="form-control" id="first_name"
                        value="{{ old('first_name', $user->first_name) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="last_name">اسم العائلة</label>
                    <input type="text" name="last_name" class="form-control" id="last_name"
                        value="{{ old('last_name', $user->last_name) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="id_number">رقم الهوية</label>
                    <input type="text" name="id_number" class="form-control" id="id_number"
                        value="{{ old('id_number', $user->id_number) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="dob">تاريخ الميلاد</label>
                    <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $user->dob) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="address">العنوان</label>
                    <input type="text" name="address" class="form-control" id="address"
                        value="{{ old('address', $user->address) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="qualification">المؤهل</label>
                    <input type="text" name="qualification" class="form-control" id="qualification"
                        value="{{ old('qualification', $user->qualification) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="job_title">المسمى الوظيفي</label>
                    <input type="text" name="job_title" class="form-control" id="job_title"
                        value="{{ old('job_title', $user->job_title) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="start_date">تاريخ البدء</label>
                    <input type="date" name="start_date" class="form-control" id="start_date"
                        value="{{ old('start_date', $user->start_date) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="phone">الهاتف</label>
                    <input type="text" name="phone" class="form-control" id="phone"
                        value="{{ old('phone', $user->phone) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="salary_rate">معدل الراتب</label>
                    <input type="number" name="salary_rate" class="form-control" id="salary_rate"
                        value="{{ old('salary_rate', $user->salary_rate) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>
            </div>
        </div>
        
        <div class="row">
    <div class="col-md-6">
        <div class="form-group mb-4">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="اترك الحقل فارغاً إذا لم ترغب في تغيير كلمة المرور">
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="department_id">القسم</label>
                    <select name="department_id" class="form-control" id="department_id">
                        <option value="">اختر القسم</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="clinic_id">العيادة</label>
                    <select name="clinic_id" class="form-control" id="clinic_id">
                        <option value="">اختر العيادة</option>
                        @foreach($clinics as $clinic)
                            <option value="{{ $clinic->id }}" {{ old('clinic_id', $user->clinic_id) == $clinic->id ? 'selected' : '' }}>
                                {{ $clinic->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="image">صورة الملف الشخصي</label>
                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                </div>
            </div>
        </div>

        <div class="form-group mb-4 text-center mt-4">
            <button type="submit" class="btn">تعديل </button>
        </div>
    </form>
</div>
@endsection