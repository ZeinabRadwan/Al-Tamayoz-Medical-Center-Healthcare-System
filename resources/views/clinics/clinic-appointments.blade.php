@if($appointments->isEmpty())
    <p class="no-appointments">لم يتم إنشاء مواعيد حتى الآن.</p>
@else
    <div class="calendar-container">
        <h2 class="calendar-title">تقويم المواعيد الخاص بالعيادة</h2>

        @php
            $startMonth = 12;
            $startYear = 2024;
            $endYear = 2025;
        @endphp

        <div class="pagination-controls">
            <button id="prevMonth" class="pagination-btn"><i class="fa-solid fa-arrow-right"></i></button>
            <button id="nextMonth" class="pagination-btn"><i class="fa-solid fa-arrow-left"></i></button>
        </div>

        @for($month = 0; $month < 13; $month++)
            @php
                $currentMonth = ($startMonth + $month - 1) % 12;
                $currentYear = $startYear + floor(($startMonth + $month - 1) / 12);

                $firstDayOfMonth = Carbon\Carbon::createFromDate($currentYear, $currentMonth + 1, 1);
                $firstWeekday = $firstDayOfMonth->dayOfWeek;

                $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();
            @endphp

            <div class="calendar-month" data-month="{{ $currentMonth + 1 }}" data-year="{{ $currentYear }}">
                <h3 class="month-title">{{ $firstDayOfMonth->locale('ar')->monthName }} {{ $currentYear }}</h3>

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
                    @for($i = 0; $i < $firstWeekday; $i++)
                        <div class="calendar-day empty"></div>
                    @endfor

                    @for($day = 1; $day <= $lastDayOfMonth->day; $day++)
                        @php
                            $currentDay = Carbon\Carbon::createFromDate($currentYear, $currentMonth + 1, $day);
                        @endphp
                        <div class="calendar-day" data-date="{{ $currentDay->format('Y-m-d') }}">
                            <div class="calendar-day-number">{{ $day }}</div>

                            @foreach($appointments as $appointment)
                                @if(Carbon\Carbon::parse($appointment->date)->format('Y-m-d') == $currentDay->format('Y-m-d'))
                                    <div class="appointment">
                                        {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}
                                        {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
    </div>
@endif

<style>
    .calendar-container {
        width: 100%;
        height: 100%;
        padding: 20px;
        overflow: auto;
        background-color: #f4f9f4;
        box-sizing: border-box;
    }

    .calendar-title {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
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
        border-radius: 20px;
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
        background-color: #d4edda;
        color: #155724;
        padding: 5px;
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
        background-color: transparent;
        border: none;
    }
</style>