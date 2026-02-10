@extends('layouts.app')

@section('content')
<div class="container">

    <div class="top-controls">
        <header class="page-title">
            <h1>المواعيد المحجوزة</h1>
        </header>
        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-3" name="tabs" onclick="window.location.href='/appointments/from-dashboard';" />
                <label class="tab" for="radio-3">حجز موعد جديد</label>
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/appointments/booked';" />
                <label class="tab" for="radio-1">المواعيد المحجوزة</label>
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/appointments';" />
                <label class="tab" for="radio-2">جميع المواعيد</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    <div class="filters-container">
        <form method="GET" action="{{ route('appointments.booked') }}" class="filter-form-container space-y-4 p-6">
            <h2 class="filter-form-title text-lg font-semibold text-gray-700">تصفية المواعيد</h2>
            <div class="filter-grid grid grid-cols-1 sm:grid-cols-1 gap-4">
                
                <div class="filter-item">
                    <label for="status" class="filter-label">اختيار الحالة:</label>
                    <div class="select-wrapper">
                        <select name="status" id="status" class="filter-select">
                            <option value="">جميع الحالات</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>معلق</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>ملغى</option>
                        </select>
                    </div>
                </div>

                <div class="filter-item">
                    <label for="clinic" class="filter-label">اختيار العيادة:</label>
                    <div class="select-wrapper">
                        <select name="clinic" id="clinic" class="filter-select">
                            <option value="">جميع العيادات</option>
                            @foreach($clinics as $clinic)
                                <option value="{{ $clinic->name }}" {{ request('clinic') == $clinic->name ? 'selected' : '' }}>
                                    {{ $clinic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="filter-item">
                    <label for="start_date" class="filter-label">من تاريخ:</label>
                    <div class="select-wrapper">
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="filter-input">
                    </div>
                </div>
                <div class="filter-item">
                    <label for="end_date" class="filter-label">إلى تاريخ:</label>
                    <div class="select-wrapper">
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="filter-input">
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="submit-button">
                    تصفية
                </button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($appointments->isEmpty())
        <p class="no-items">لا توجد مواعيد محجوزة حتى الآن.</p>
    @else
        <table class="items-table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>رقم الهوية</th>
                    <th>رقم الهاتف</th>
                    <th>الجنسية</th>
                    <th>العيادة</th>
                    <th>تاريخ الموعد</th>
                    <th>الوقت</th>
                    <th>الحالة</th>
                    <th>إجراء</th>
                    <th>التواصل عبر واتساب</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->id_number }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->nationality }}</td>
                        <td>{{ $appointment->clinicAppointment->clinic->name ?? 'غير متوفر' }}</td>
                        <td>{{ $appointment->clinicAppointment->date }}</td>
                        <td>{{ $appointment->clinicAppointment->start_time }} - {{ $appointment->clinicAppointment->end_time }}</td>
                        <td>
                            <span class="status {{ $appointment->status }}">
                                @if($appointment->status == 'pending') معلق
                                @elseif($appointment->status == 'confirmed') مؤكد
                                @elseif($appointment->status == 'cancelled') ملغى
                                @endif
                            </span>
                        </td>
                        <td>
                            @if($appointment->status == 'pending')
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" required class="status-select">
                                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>معلق</option>
                                        <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>ملغى</option>
                                    </select>
                                    <button type="submit" class="btn">تحديث</button>
                                </form>
                            @else
                                <span>{{ ucfirst($appointment->status) }}</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $clinicName = $appointment->clinicAppointment->clinic->name ?? 'غير متوفر';
                                $appointmentDate = $appointment->clinicAppointment->date;
                                $appointmentTime = $appointment->clinicAppointment->start_time;
                                $message = "بخصوص تأكيد حجز الموعد للعيادة $clinicName والميعاد المحدد: $appointmentDate $appointmentTime من مجمع التميز الشامل للتأهيل الطبي.";
                                $encodedMessage = urlencode($message);
                                $countryCode = '';
                                if ($appointment->nationality == 'السعودية') { $countryCode = '+966'; }
                                elseif ($appointment->nationality == 'مصر') { $countryCode = '+20'; }
                                $phoneNumberWithCountryCode = $countryCode . ltrim($appointment->phone, '0'); 
                            @endphp
                            <a href="https://wa.me/{{ $phoneNumberWithCountryCode }}?text={{ $encodedMessage }}" target="_blank" class="btn btn-success">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="conta">
        <button onclick="printAppointments()" class="dko">طباعة</button>
    </div>

    <div class="pagination-controls">
        <label for="perPage">عرض:</label>
        <select id="perPage" name="perPage" onchange="updatePerPage()">
            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            <option value="{{ $appointments->total() }}" {{ request('perPage') == $appointments->total() ? 'selected' : '' }}>الكل</option>
        </select>
    </div>

    <div class="pagination-container">
        {{ $appointments->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
        <div class="results-message">
            عرض {{ $appointments->firstItem() }} إلى {{ $appointments->lastItem() }} من أصل {{ $appointments->total() }} نتائج
        </div>
    </div>

</div>

<script>
    function updatePerPage() {
        const perPage = document.getElementById('perPage').value;
        const url = new URL(window.location.href);
        url.searchParams.set('perPage', perPage);
        window.location.href = url.toString();
    }

    function printAppointments() {
        var printWindow = window.open('', '', 'width=800,height=600');
        var printContent = document.querySelector('.container').innerHTML; 
        printWindow.document.write('<html><head><title>طباعة المواعيد المحجوزة</title>');
        printWindow.document.write('<style>body{font-family: Arial, sans-serif; padding: 20px; direction: rtl;} table{width: 100%; border-collapse: collapse;} th, td{padding: 8px; border: 1px solid #ddd;} th{text-align: left;} .status{font-weight: bold; padding: 5px 10px; border-radius: 5px;} .status.pending{background-color: #ffc107; color: #fff;} .status.confirmed{background-color: #28a745; color: #fff;} .status.cancelled{background-color: #dc3545; color: #fff;} @media print {.top-controls, .filters-container { display: none !important; }}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

<style>
        .btn-center {
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        .dko {
            margin: 20px;
            width: 15%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background: linear-gradient(0.25turn, #66AA3E, #92C641, #66AA3E);
            color: black;
            font-weight: bold;
            font-family: cairo;
            text-align: center;
        }
        .conta {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        width: block;
    }
    
    .top-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .filter-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-select,
    .status-select {
        padding: 8px 12px;
        font-size: 1rem;
        border-radius: 5px;
        border: 1px solid #ddd;
        direction: rtl;
        text-align: right;
    }

    .no-appointments {
        color: #888;
        text-align: center;
        margin: 20px 0;
    }

    .appointments-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .appointments-table th,
    .appointments-table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .status.pending {
        background-color: #ffc107;
        color: #fff;
    }

    .status.confirmed {
        background-color: #28a745;
        color: #fff;
    }

    .status.cancelled {
        background-color: #dc3545;
        color: #fff;
    }

    .pagination-container {
        margin-top: 20px;
        text-align: center;
    }
    
    .filters-container {
        width: 100%;
        margin: 0 auto;
        margin-bottom: 30px;
        padding: 0.5rem;
        box-shadow: 0 0 1px 0 rgba(24, 224, 44, 0.15), 0 6px 12px 0 rgba(109, 210, 115, 0.15);
        border-radius: 99px;
        border: 1px solid var(--primary-color);
        color: rgb(113, 113, 113);
    }

    .filter-form-container .filter-item label {
        font-size: 14px;
    }

    .filter-form-container .filter-select, 
    .filter-form-container .filter-input {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding-left: 2em; /* Add space for the left arrow */
    }

    .filter-form-container .select-wrapper {
        position: relative;
    }

    .filter-form-container .filter-select::after {
        content: '▼';
        position: absolute;
        left: 0.5em;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2em;
        color: #4a4a4a;
    }

    .filter-grid {
        display: flex;
        justify-content: space-between;
        gap: 16px;
    }

    .filter-item {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .filter-label {
        font-size: 14px;
        color: #4a4a4a;
    }

    .submit-button {
        background-color: var(--primary-color);
        color: white;
        padding: 9px 20px 9px 20px;
        border-radius: 99px;
        font-size: 22px;
        font-family: 'Lateef', serif;
        border: none;
        cursor: pointer;
        margin-left: 20px;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .submit-button:hover {
        background-color: #2d7a47;
    }

    .filter-form-title {
        margin-bottom: 10px;
    }

    .submit-button {
        font-weight: bold;
        letter-spacing: 1px;
    }
</style>
@endsection