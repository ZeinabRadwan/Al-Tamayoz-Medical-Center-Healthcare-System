@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>عرض الموظف {{ $user->name }}</h1>
        </header>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-2" name="tabs" onclick="window.location.href='/users/create';" />
                <label class="tab" for="radio-2">عرض موظف {{ $user->name }}</label>
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/users';" />
                <label class="tab" for="radio-1">إجمالي
                    الموظفين</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="user-info">
    <h2>تفاصيل المستخدم</h2>
    <div class="row">
        <div class="col-md-6">
            <p><strong>الاسم الكامل:</strong> <span>{{ $user->name }}</span></p>
            <p><strong>رقم الهوية:</strong> <span>{{ $user->id_number }}</span></p>
            <p><strong>العمر:</strong> <span>{{ $user->age }}</span></p>
            <p><strong>البريد الإلكتروني:</strong> <span>{{ $user->email }}</span></p>
            <p><strong>رقم الهاتف:</strong> <span>{{ $user->phone }}</span></p>
            <p><strong>المسمى الوظيفي:</strong> <span>{{ $user->job_title }}</span></p>
        </div>
        <div class="col-md-6">
            <p><strong>تاريخ الميلاد:</strong> <span>{{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') }}</span></p>
            <p><strong>المؤهل:</strong> <span>{{ $user->qualification }}</span></p>
            <p><strong>التخصص:</strong> <span>{{ $user->major }}</span></p>
            <p><strong>القسم:</strong> <span>{{ $user->department ? $user->department->name : 'غير متاح' }}</span></p>
            <p><strong>العيادة:</strong> <span>{{ $user->clinic ? $user->clinic->name : 'غير متاح' }}</span></p>
            <p><strong>الدور:</strong> 
                <span>
                    @foreach($user->roles as $role)
                        {{ $role->name }}@if(!$loop->last), @endif
                    @endforeach
                </span>
            </p>
            <p><strong>الحالة:</strong> <span>{{ $user->is_active ? 'نشط' : 'غير نشط' }}</span></p>
        </div>
    </div>
</div>

<div class="actions">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit" title="تعديل المستخدم">
        <i class="fa-solid fa-pencil-alt"></i>
    </a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-form" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-delete" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')" title="حذف المستخدم">
            <i class="fa-solid fa-trash"></i> 
        </button>
    </form>
</div>

<style>
    .user-info {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: var(--primary-color);
        margin-bottom: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-6 {
        flex: 0 0 50%;
        padding: 10px;
    }

    p {
        margin: 10px 0;
        font-size: 18px;
        line-height: 1.6;
    }

    strong {
        color: var(--primary-color);
    }
</style>
</div>
@endsection