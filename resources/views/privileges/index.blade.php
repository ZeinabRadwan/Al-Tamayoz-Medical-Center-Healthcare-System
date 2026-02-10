@extends('layouts.app')
@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>
                إدارة الصلاحيات
            </h1>
        </header>
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

    <table class="items-table">
        <thead>
            <tr>
                <th>المستخدمين</th>
                <th>إدارة الصلاحيات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="fade-in">
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ route('manage.privileges', $user->id) }}" class="btn btn-primary">إدارة</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

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
    }, 2000);
</script>