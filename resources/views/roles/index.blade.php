@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>الأدوار</h1>
        </header>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/roles/create';" />
                <label class="tab" for="radio-1">إضافة دور جديد</label>
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/roles';" />
                <label class="tab" for="radio-2">جميع
                    الأدوار</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    <div class="role-statistics" style="margin-bottom: 30px;">
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-users-line"></i>
            </div>
            <div class="stat-details">
                <strong>إجمالي الأدوار:</strong>
                <span>{{ $roles->count() }}</span>
            </div>
        </div>

        <div class="stat-item">
            <div class="stat-icon">
                <i class="fa-solid fa-gears"></i>
            </div>
            <div class="stat-details">
                <strong>إجمالي الصلاحيات:</strong>
                <span>{{ $permissions->count() }}</span>
            </div>
        </div>
    </div>


    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif


    <div class="roles-cards-container">
        @foreach($roles as $role)
            <div class="role-card">
                <div class="role-card-header">
                    <h3>{{ $role->name }}</h3>
                </div>

                <div
                    class="role-card-body @if($role->name === 'ادمن') admin-role @elseif($role->name === 'مفصول') suspended-role @endif">
                    @if($role->name === 'ادمن')
                        <div class="role-permission-info admin-permission">
                            <i class="fa-solid fa-user-check"></i>
                            <p>هذا الدور لديه جميع الصلاحيات</p>
                        </div>
                    @elseif($role->name === 'مفصول')
                        <div class="role-permission-info suspended-permission">
                            <i class="fa-solid fa-user-xmark"></i>
                            <p>هذا الشخص ليس لديه أي صلاحيات</p>
                        </div>
                    @else
                        <ul class="permissions-list">
                            @foreach($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="role-card-footer">
                    <div class="btn-group">
                        <a href="{{ route('roles.show', $role->id) }}" class="action-icon" title="عرض الدور">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="action-icon" title="تعديل الدور">
                            <i class="fa-solid fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="delete-form"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-icon" title="حذف الدور">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    setTimeout(function () {
        let successAlert = document.getElementById('success-alert');
        let errorAlert = document.getElementById('error-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000);
</script>

@endsection

@section('styles')
<style>
    .role-statistics {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .stat-item {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        min-width: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .stat-icon {
        font-size: 32px;
        color: #2C6E49;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 45px;
        height: 45px;
        background-color: rgb(187, 223, 190);
        border-radius: 50%;
    }

    .stat-details {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stat-details strong {
        font-size: 17px;
        color: #555;
        margin-bottom: 5px;
    }

    .stat-details span {
        font-size: 28px;
        font-weight: bold;
        color: #218838;
        text-align: center;
    }

    .roles-cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
    }

    .role-card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        flex: 1 1 calc(33.33% - 20px);
        display: flex;
        flex-direction: column;
        transition: transform 0.2s;
    }

    .role-card:hover {
        transform: translateY(-5px);
    }

    .role-card-header {
        background-color: #2C6E49;
        color: white;
        padding: 15px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        text-align: center;
    }

    .role-card-body {
        padding: 15px;
        flex-grow: 1;
    }

    .role-permission-info {
        font-size: 20px;
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .role-permission-info i {
        font-size: 34px;
    }

    .admin-role {
        background-color: rgb(190, 248, 203);
    }

    .admin-permission {
        color: #2C6E49;
    }

    .suspended-role {
        background-color: rgba(255, 87, 34, 0.1);
    }

    .suspended-permission {
        color: red;
    }

    .permissions-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        font-size: 1rem;
        color: #333;
    }

    .permissions-list li {
        background-color: #f4f4f4;
        border-radius: 5px;
        margin-bottom: 8px;
        padding: 8px;
        font-size: 0.95rem;
        transition: background-color 0.3s ease-in-out;
    }

    .permissions-list li:hover {
        background-color: #e9e9e9;
    }

    .role-card-footer {
        padding: 10px;
        text-align: center;
        border-top: 1px solid #e0e0e0;
    }

    .btn-group {
        display: flex;
        justify-content: space-evenly;
        gap: 10px;
    }

    .action-icon {
        background: none;
        border: none;
        color: #28a745;
        font-size: 18px;
        cursor: pointer;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .action-icon:hover {
        color: #218838;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .role-card {
            flex: 1 1 calc(50% - 20px);
        }
    }

    @media (max-width: 480px) {
        .role-card {
            flex: 1 1 100%;
        }
    }
</style>
@endsection