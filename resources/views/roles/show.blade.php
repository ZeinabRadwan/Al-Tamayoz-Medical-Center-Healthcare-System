@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-success">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">الدور: {{ $role->name }}</h2>
            <a href="{{ route('roles.index') }}" class="btn btn-light btn-sm">رجوع إلى قائمة الأدوار</a>
        </div>
        <div class="card-body">
            <h4 class="mb-3 text-success">الصلاحيات:</h4>
            @if($role->permissions->isEmpty())
            <p class="text-muted">لا توجد صلاحيات مخصصة لهذا الدور.</p>
            @else
            <ul class="list-group list-group-flush">
                @foreach($role->permissions as $permission)
                <li class="list-group-item list-group-item-success">{{ $permission->name }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>

<style>
    .card {
        background-color: #f9f9f9;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
    }

    .card-header {
        background-color: #28a745;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .btn {
        border-radius: 20px;
        color: #155724;
        font-size: 20px;
    }

    .list-group-item {
        font-size: 20px;
    }

    .list-group-item-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .text-muted {
        font-size: 1.1rem;
    }
</style>
@endsection