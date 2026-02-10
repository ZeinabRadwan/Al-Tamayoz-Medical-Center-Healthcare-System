@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>جميع المواعيد</h1>
        </header>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/appointments/from-dashboard';" />
                <label class="tab" for="radio-1">حجز موعد جديد</label>
                <input type="radio" id="radio-2" name="tabs" onclick="window.location.href='/appointments/booked';" />
                <label class="tab" for="radio-2">المواعيد المحجوزة</label>
                <input type="radio" id="radio-3" name="tabs" checked onclick="window.location.href='/appointments';" />
                <label class="tab" for="radio-1">جميع
                    المواعيد</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>
    
@php
    $today = \Carbon\Carbon::today(); 
    // Group appointments by clinic
    $clinicsGrouped = [];
    foreach ($appointmentsByMonth as $month => $appointments) {
        foreach ($appointments as $appointment) {
            if (\Carbon\Carbon::parse($appointment->date)->isToday() && $appointment->is_booked) {
                $clinicName = $appointment->clinic->name;
                if (!isset($clinicsGrouped[$clinicName])) {
                    $clinicsGrouped[$clinicName] = [];
                }
                $clinicsGrouped[$clinicName][] = $appointment;
            }
        }
    }
@endphp

<h2 id="appointments-title">مواعيد يوم {{ $today->format('l, F j, Y') }}</h2>

<div class="clinics-container">
    @foreach ($clinicsGrouped as $clinicName => $appointments)
        <div class="clinic-column">
            <h3>{{ $clinicName }}</h3>
            @foreach ($appointments as $appointment)
                <div class="appointment-card">
                    <p class="appointment-time">
                        {{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }} - 
                        {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}
                    </p>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to convert the date in English to Arabic
        function convertDateToArabic(date) {
            const arabicDays = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
            const arabicMonths = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
            
            const day = date.getDay();
            const month = date.getMonth();
            const dateOfMonth = date.getDate();
            const year = date.getFullYear();

            return `${arabicDays[day]}, ${arabicMonths[month]} ${dateOfMonth}, ${year}`;
        }

        // Convert title to Arabic
        const titleElement = document.getElementById('appointments-title');
        const todayDate = new Date(); // Today's date
        const arabicDate = convertDateToArabic(todayDate);
        titleElement.textContent = `مواعيد يوم ${arabicDate}`;

        // Convert all appointment dates to Arabic
        const dateElements = document.querySelectorAll('.appointment-date');
        dateElements.forEach(function(element) {
            const dateText = element.textContent;
            const date = new Date(dateText);
            element.textContent = convertDateToArabic(date);
        });
    });
</script>

<style>
h2 {
    font-size: 2rem;
    color: green; /* Green color for the title */
    text-align: center;
    margin: 30px 0;
}

.clinics-container {
    display: grid;
    grid-template-columns: repeat(7, 1fr); /* Creates 7 equal columns */
    gap: 20px;
    justify-items: center; /* Centers items in each grid cell */
}

.clinic-column {
    background-color: #fafafa;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 100%; /* Ensures column takes full width of grid cell */
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center; /* Center text inside clinic column */
}

.clinic-column h3 {
    font-size: 1.6rem;
    color: #333;
    margin-bottom: 15px;
}

.appointment-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 15px;
    margin-botto 0x;
    text-align: center; /* Align text to the center for the appointments */
}

.appointment-card p {
    font-size: 1rem;
    color: #555;
    margin: 0;
}

.appointment-time {
    font-weight: bold;
    color: #007BFF; /* Change to a primary color for emphasis */
}
 0</style>


    <div class="tabs-appointment">
        <form method="GET" action="{{ route('appointments.index') }}" class="filter-form">
            <div class="form-group d-flex justify-content-center align-items-center">
                <div class="col-auto">
                    <label for="clinic_id" class="col-form-label">اختر العيادة</label>
                    <select name="clinic_id" id="clinic_id" class="tab-btn">
                        <option value="">جميع العيادات</option>
                        @foreach($clinics as $clinic)
                            <option value="{{ $clinic->id }}" {{ request('clinic_id') == $clinic->id ? 'selected' : '' }}>
                                {{ $clinic->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-auto mx-3">
                    <label for="status" class="col-form-label">الحالة</label>
                    <select name="status" id="status" class="tab-btn">
                        <option value="">جميع الحالات</option>
                        <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>محجوز</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>متاح</option>
                    </select>
                </div>

                <div class="col-auto mx-3">
                    <button type="submit" class="btn btn-back">تصفية</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="calendar-container">
        <h2 class="calendar-title">تقويم المواعيد الخاص بكل العيادات</h2>
        <div class="pagination-controls">
            <button id="prevMonth" class="pagination-btn"><i class="fa-solid fa-arrow-right"></i></button>
            <button id="nextMonth" class="pagination-btn"><i class="fa-solid fa-arrow-left"></i></button>
        </div>

        @php
            $startMonth = 1;
            $startYear = 2025;
            $endYear = 2025;
        @endphp

        @for($month = 0; $month < 13; $month++)
                @php
                    $currentMonth = ($startMonth + $month - 1) % 12;
                    $currentYear = $startYear + floor(($startMonth + $month - 1) / 12);

                    $firstDayOfMonth = Carbon\Carbon::createFromDate($currentYear, $currentMonth + 1, 1);
                    $firstWeekday = $firstDayOfMonth->dayOfWeek;

                    $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();
                @endphp
                <div class="calendar-month">
                    <h2 class="month-title">{{ $firstDayOfMonth->format('F Y') }}</h2>
                    <div class="calendar-header">
                        <div class="calendar-header-day">الأحد</div>
                        <div class="calendar-header-day">الإثنين</div>
                        <div class="calendar-header-day">الثلاثاء</div>
                        <div class="calendar-header-day">الأربعاء</div>
                        <div class="calendar-header-day">الخميس</div>
                        <div class="calendar-header-day">الجمعة</div>
                        <div class="calendar-header-day">السبت</div>
                    </div>
                    <div class="calendar-days">
                        @php
                            $daysInMonth = $lastDayOfMonth->day;
                            $emptySlots = $firstWeekday; 
                        @endphp
                        @for($i = 0; $i < $emptySlots; $i++)
                            <div class="calendar-day empty"></div>
                        @endfor
                        @foreach (range(1, $daysInMonth) as $day)
                                    @php
                                        $date = \Carbon\Carbon::createFromDate($currentYear, $currentMonth + 1, $day)->format('Y-m-d');
                                        $dayAppointments = $appointmentsByMonth->get($firstDayOfMonth->format('F Y'), collect())->filter(function ($appointment) use ($date) {
                                            return \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') == $date;
                                        });
                                    @endphp
                                    <div
                                        class="calendar-day {{ $dayAppointments->isEmpty() ? 'empty' : ($dayAppointments->first()->is_booked ? 'booked' : 'available') }}">
                                        <div class="calendar-day-number">
                                            {{ $day }}
                                        </div>
                                        @foreach ($dayAppointments as $appointment)
                                            <div class="appointments-container">
                                                <div class="appointment {{ $appointment->is_booked ? 'badge-danger' : 'badge-success' }}">
                                                    <p>{{ $appointment->clinic->name }}</p>
                                                    <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}
                                                        {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                        @endforeach
                    </div>
                </div>
        @endfor
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const prevButton = document.getElementById('prevMonth');
            const nextButton = document.getElementById('nextMonth');
            let currentMonthIndex = 0;
            const months = Array.from(document.querySelectorAll('.calendar-month'));

            function updateCalendar() {
                months.forEach((month, index) => {
                    month.style.display = index === currentMonthIndex ? 'block' : 'none';
                });
            }

            prevButton.addEventListener('click', function () {
                currentMonthIndex = (currentMonthIndex - 1 + months.length) % months.length;
                updateCalendar();
            });

            nextButton.addEventListener('click', function () {
                currentMonthIndex = (currentMonthIndex + 1) % months.length;
                updateCalendar();
            });

            updateCalendar();
        });
    </script>

    <style>
        .calendar-container {
            width: 100%;
            height: 100%;
            padding: 20px;
            overflow: auto;
            box-sizing: border-box;
        }

        .calendar-title {
            text-align: center;
            font-size: 1.5rem;
            margin: 20px 0 10px 0;
            color: #2C6E49;
            font-weight: 600;
        }

        .pagination-controls {
            text-align: center;
            margin-bottom: 20px;
        }

        .pagination-btn {
            color: #fff;
            background-color: #2C6E49;
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .pagination-btn:hover {
            background-color: #155724;
        }

        .calendar-month {
            display: none;
            margin-bottom: 30px;
        }

        .month-title {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .calendar-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            background-color: #2C6E49;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .calendar-header-day {
            padding: 10px;
            font-size: 1.1rem;
            color: white;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 12px;
        }

        .calendar-day {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            background-color: #fff;
            position: relative;
            min-height: 100px;
            text-align: center;
            box-sizing: border-box;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease;
        }

        .calendar-day:hover {
            transform: scale(1.01);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .calendar-day-number {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .appointment {
            font-size: 0.9rem;
            font-weight: bold;
            padding: 5px;
            color: #155724;
            margin-top: 5px;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .appointment:hover {
            background-color: #c3e6cb;
            color: #1e7e34;
        }

        .no-appointments {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
            margin: 20px 0;
            font-weight: 500;
        }

        .empty {
            border: 2px solid #ddd;
        }

        .badge-danger {
            width: 100%;
            background-color: #ccc;
            color: white;
        }

        .badge-success {
            background-color: #2ecc71;
            color: white;
        }


        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }

            .btn,
            .pagination-btn {
                width: 100%;
            }

            .col-form-label {
                width: auto;
            }
        }
        .tab-btn {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 170px;
        }
    </style>
    @endsection
