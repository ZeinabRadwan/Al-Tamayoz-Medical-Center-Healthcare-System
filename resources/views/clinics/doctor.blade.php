@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-title">
        <h1 class="calendar-title">
            {{ __('تقويم المواعيد - عيادة الأخصائي') }}: 
            <span class="doctor-name">{{ $doctor->name }}</span>
        </h1>
    </header>

    <div class="calendar-container">
        <div class="pagination-controls">
            <button id="prevMonth" class="pagination-btn"><i class="fa-solid fa-arrow-right"></i></button>
            <button id="nextMonth" class="pagination-btn"><i class="fa-solid fa-arrow-left"></i></button>
        </div>

        @php
            \Carbon\Carbon::setLocale('ar');
            $startMonth = 1;
            $startYear = 2025;
            $endYear = 2025;
            $todayDate = \Carbon\Carbon::today()->format('Y-m-d');
        @endphp

        @for($month = 0; $month < 12; $month++)
            @php
                $currentMonth = ($startMonth + $month - 1) % 12;
                $currentYear = $startYear + floor(($startMonth + $month - 1) / 12);
                $firstDayOfMonth = Carbon\Carbon::createFromDate($currentYear, $currentMonth + 1, 1);
                $firstWeekday = $firstDayOfMonth->dayOfWeek;
                $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();
            @endphp
            <div class="calendar-month">
                <h2 class="month-title">{{ $firstDayOfMonth->translatedFormat('F Y') }}</h2> 
                <div class="calendar-header">
                    <div class="calendar-header-day">{{ __('الأحد') }}</div>
                    <div class="calendar-header-day">{{ __('الإثنين') }}</div>
                    <div class="calendar-header-day">{{ __('الثلاثاء') }}</div>
                    <div class="calendar-header-day">{{ __('الأربعاء') }}</div>
                    <div class="calendar-header-day">{{ __('الخميس') }}</div>
                    <div class="calendar-header-day">{{ __('الجمعة') }}</div>
                    <div class="calendar-header-day">{{ __('السبت') }}</div>
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
                            $dayAppointments = $appointments->filter(function ($appointment) use ($date) {
                                return \Carbon\Carbon::parse($appointment->clinicAppointment->date)->format('Y-m-d') == $date;
                            });
                        @endphp
                        <div class="calendar-day {{ $dayAppointments->isEmpty() ? 'empty' : 'booked' }}">
                            <div class="calendar-day-number">
                                {{ $day }}
                            </div>
                            @foreach ($dayAppointments as $appointment)
                                <div class="appointments-container">
                                    <div class="appointment {{ $appointment->clinicAppointment->is_booked ? 'badge-danger' : 'badge-success' }}">
                                        <p>{{ $appointment->name }}</p>
                                        <p>{{ \Carbon\Carbon::parse($appointment->clinicAppointment->start_time)->format('g:i A') }} - 
                                            {{ \Carbon\Carbon::parse($appointment->clinicAppointment->end_time)->format('g:i A') }}
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

</style>

@endsection
