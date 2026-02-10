@extends('layouts.app')

@section('content')
<div class="container">
<div class="top-controls">
    <header class="page-title">
        <h1>تعديل صلاحية {{ $role->name }}</h1>
    </header>
    <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-2" name="tabs" />
                <label class="tab" for="radio-2">تعديل صلاحيات الدور {{ $role->name }}</label>
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/roles';" />
                <label class="tab" for="radio-1">جميع
                    الأدوار</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    <div class="form-container">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">اسم صلاحية</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}" readonly class="form-input">
            </div>

            <div class="form-group">
                <label for="permissions" class="form-label">إضافة الصلاحيات</label>
                <div class="permissions-list">
                    @foreach($permissions as $permission)
                    <div class="permission-item">
                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            @if($role->permissions->contains($permission->id)) checked @endif
                        class="permission-checkbox"
                        >
                        <label class="permission-label">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="form-action">
                <button type="submit" class="btn">تحديث الصلاحيات</button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 16px;
        color: #333;
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f1f1f1;
        color: #333;
        cursor: not-allowed;
    }

    .permissions-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .permission-item {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 32%;
        margin-bottom: 15px;
    }

    .permission-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
        color: #2c6b2f;
        outline: none;
    }

    .permission-checkbox:focus {
        outline: 2px solid #2c6b2f;
        outline-offset: 2px;
    }

    .permission-label {
        font-size: 24px;
        color: #555;
    }

    .submit-btn {
        background-color: #2c6b2f;
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #245a23;
    }

    .btn {
        border-radius: 20px;
        color: #155724;
        border: #155724 1px solid;
        font-size: 20px;
    }

    .btn:hover {
        background-color: #155724;
        color: #fff;
    }
</style>
@endsection