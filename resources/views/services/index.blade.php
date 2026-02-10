@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>الخدمات</h1>
        </header>

        <form method="GET" action="{{ route('services.index') }}" class="filter-form">
            <label for="department">اختيار القسم:</label>
            <select name="department" id="department" class="form-select">
                <option value="">جميع الأقسام</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ request('department') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn">تصفية</button>
        </form>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/services/create';" />
                <label class="tab" for="radio-1">إضافة خدمة جديدة</label>
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/services';" />
<label class="tab" for="radio-2"><span class="notification">{{ $services->total() }}</span>إجمالي الخدمات</label>

                <span class="glider"></span>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success slide-in">
            {{ session('message') }}
        </div>
    @endif

    <div class="table-wrapper">
        @if($services->isEmpty())
            <p class="no-items">لا يوجد خدمات لعرضها</p>
        @else
            <table class="items-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الخدمة</th>
                        <th>سعر الخدمة</th>
                        <th>القسم</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $index => $service)
                        <tr class="fade-in">
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->price }} ريال</td>
                            <td>{{ $service->department ? $service->department->name : 'غير محدد' }}</td>
                            <td class="actions">
                                <a href="{{ route('services.edit', $service) }}" class="action-icon">
                                    <i class="fa-solid fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST" class="delete-form">
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
        @endif
    </div>

 <!-- Pagination Controls -->
    <div class="pagination-controls">
        <label for="perPage">عرض:</label>
        <select id="perPage" name="perPage" onchange="updatePerPage()">
            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            <option value="{{ $services->total() }}" {{ request('perPage') == $services->total() ? 'selected' : '' }}>الكل</option>
        </select>
    </div>

    <!-- Results Message -->
    <div class="results-message">
        <p>
            عرض 
            {{ $services->firstItem() }} 
            إلى 
            {{ $services->lastItem() }} 
            من أصل 
            {{ $services->total() }} 
            خدمة
        </p>
    </div>


    <!-- Pagination Container -->
    <div class="pagination-container">
        {{ $services->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function updatePerPage() {
        const perPage = document.getElementById('perPage').value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('perPage', perPage);
        window.location.search = urlParams.toString();
    }
</script>

    <div class="list-stats">
        <ul>
            <li>إحصائيات الأقسام :</li>
            @foreach ($departments as $index => $department)
                <li>
                    <span class="color-box" style="background-color: 
                                        @if ($index % 4 == 0) #f09d8d
                                        @elseif ($index % 4 == 1) #a1ddff
                                        @elseif ($index % 4 == 2) #ffe27b
                                        @elseif ($index % 4 == 3) #c1ffab
                                        @endif;"></span>
                    {{ $department->name }}:
                    <strong>{{ $department->services()->count() }}</strong>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection