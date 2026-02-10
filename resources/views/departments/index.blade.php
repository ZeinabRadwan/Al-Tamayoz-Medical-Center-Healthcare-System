@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>إدارة الأقسام</h1>
        </header>

        <div class="search-bar">
            <form action="{{ route('departments.index') }}" method="GET" class="max-w-md mx-auto">
                <label for="default-search" class="sr-only">ابحث عن قسم...</label>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"></div>
                    <input type="search" id="default-search" name="search"
                        class="search-input block w-full p-3 text-sm border rounded-lg" placeholder="ابحث عن قسم..."
                        value="{{ request('search') }}" />
                    <button type="submit"
                        class="search-btn absolute end-2.5 bottom-2.5 text-white bg-green-700 rounded-lg text-sm px-5 py-2.5">
                        ابحث
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/departments/create';" />
                <label class="tab" for="radio-1">إضافة قسم جديد</label>
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/departments';" />
                <label class="tab" for="radio-2"><span class="notification">4</span>إجمالي
                    الأقسام</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success slide-in">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger slide-in">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table class="items-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr class="fade-in">
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td class="actions">
                            <a href="{{ route('departments.edit', $department->id) }}" class="action-icon">
                                <i class="fa-solid fa-pencil-alt"></i>
                            </a>

                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-icon">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $departments->links() }}
    </div>

</div>

<script>
    document.querySelectorAll('.editBtn').forEach(function (button) {
        button.addEventListener('click', function () {
            const departmentId = button.getAttribute('data-id');
            const departmentName = button.getAttribute('data-name');
            const editForm = document.getElementById('editForm');
            editForm.action = '/departments/' + departmentId;
            document.getElementById('editName').value = departmentName;
            document.getElementById('editDepartmentForm').style.display = 'block';
        });
    });

    document.getElementById('cancelEditBtn').addEventListener('click', function () {
        document.getElementById('editDepartmentForm').style.display = 'none';
    });
</script>
@endsection