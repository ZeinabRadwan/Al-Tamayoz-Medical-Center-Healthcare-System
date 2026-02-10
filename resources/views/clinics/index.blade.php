@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>قائمة العيادات</h1>
        </header>

        <div class="search-bar">
            <form action="{{ route('clinics.index') }}" method="GET" class="max-w-md mx-auto">
                <label for="default-search" class="sr-only">ابحث عن عيادة...</label>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    </div>
                    <input type="search" id="default-search" name="search"
                        class="search-input block w-full p-3 text-sm border rounded-lg" placeholder="ابحث عن عيادة..."
                        value="{{ request('search') }}" required />
                    <button type="submit"
                        class="search-btn absolute end-2.5 bottom-2.5 text-white bg-green-700 rounded-lg text-sm px-5 py-2."
                        5>
                        ابحث
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/clinics/create';" />
                <label class="tab" for="radio-1">إضافة عيادة جديدة</label>
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/clinics';" />
                <label class="tab" for="radio-2"><span class="notification">{{ $totalClinics }}</span>إجمالي
                    العيادات</label>
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
                    <th>الاسم</th>
                    <th>مدة الجلسة</th>
                    <th>القسم</th>
                    <th>سعر الزيارة</th>
                    <th>أيام العمل</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clinics as $clinic)
                <tr class="fade-in">
                    <td>{{ $clinic->name }}</td>
                    <td>{{ $clinic->session_duration }} دقائق</td>
                    <td>{{ $clinic->department->name }}</td>
                    <td>{{ number_format($clinic->visit_price, 2) }} ريال</td>
                    <td>
                        @if($clinic->work_days)
                        {{ implode(', ', json_decode($clinic->work_days, true)) }}
                        @else
                        No work days available
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('clinics.show', $clinic->id) }}" class="action-icon">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('clinics.edit', $clinic->id) }}" class="action-icon">
                            <i class="fa-solid fa-pencil-alt"></i>
                        </a>
                        <a href="{{ route('clinics.showstaff', $clinic->id) }}" class="action-icon"><i class="fa-solid fa-user-doctor"></i></a>
                        <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST" class="delete-form">
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
        {{ $clinics->links() }}
    </div>

    <div class="statistics">
        <div class="stat-item">
            <ul class="department-stats">
                <li>عدد العيادات حسب القسم:</li>
                @foreach($clinicsPerDepartment as $index => $department)
                <li>
                    <span class="color-box" style="background-color: 
                                                                    @if ($index % 4 == 0) #f09d8d
                                                                    @elseif ($index % 4 == 1) #a1ddff
                                                                    @elseif ($index % 4 == 2) #ffe27b
                                                                    @elseif ($index % 4 == 3) #c1ffab
                                                                    @endif;">
                    </span>
                    {{ $department->name }}: {{ $department->clinics_count }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

<style>
    .statistics .stat-item.center {
        text-align: center;
    }

    .department-stats {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .department-stats li {
        margin: 5px 15px;
        display: inline-block;
        font-size: 0.9rem;
        text-align: center;
    }

    .department-stats .color-box {
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 4px;
        margin-right: 8px;
    }

    .statistics .stat-title {
        font-weight: bold;
        font-size: 1.1rem;
        color: #333;
    }

    .statistics .stat-value {
        font-size: 1.2rem;
        color: #2C6E49;
        font-weight: bold;
    }
</style>

@endsection
