@extends('layouts.app')

@section('content')
<div class="container">
    <header class="mb-4">
        <h1>
            إدارة الصلاحيات للمستخدم {{ $user->name }}
        </h1>
    </header>

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

    <form action="{{ route('update.privileges', ['user' => $user->id]) }}" method="POST">
        @csrf
        <table class="table mt-5 table-striped w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th>الصلاحية</th>
                    <th>تمكين</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $permission->name }}</td>
                    <td class="px-6 py-4">
                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->name }}"
                            {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn">حفظ الصلاحيات</button>
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        border: 2px dashed #365741;
    }

    th,
    td {
        vertical-align: middle;
        text-align: center;
        border-bottom: none;
        background-image: none !important;
        color: #567357;
    }

    .actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
    }

    .action-icon {
        color: #567357;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e1e1e1;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .action-icon i {
        font-size: 20px;
    }

    .action-icon:hover {
        background-color: #c0e1c0;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #c3e6cb;
        font-size: 1rem;
        text-align: center;
    }

    .btn {
        display: inline-block;
        color: #fff;
        background-color: #567357;
        border: 1px solid #567357;
        padding: 10px 25px;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        text-decoration: none;
        text-align: center;
    }

    .btn:hover {
        background-color: #4a6b4a;
    }

    .add-vacation {
        display: inline-block;
        color: #567357;
        padding: 10px 25px;
        border-radius: 25px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s;
        text-align: center;
        border: 1px solid #567357;
    }

    .add-vacation:hover {
        background-color: #4a6b4a;
        color: #fff;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
    }

    .badge-warning {
        background-color: #f39c12;
        color: #fff;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    @media (max-width: 768px) {
        .container {
            margin: 2% auto;
            max-width: 94%;
            margin-right: 6%;
        }

        table {
            font-size: 14px;
            width: 90%;
            margin-right: 8%;
        }

        header h1 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

<script>
    setTimeout(function() {
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