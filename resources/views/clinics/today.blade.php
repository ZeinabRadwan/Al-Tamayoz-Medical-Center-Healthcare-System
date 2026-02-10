@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-title">
        <h1 class="calendar-title">
            {{ __('حجوزات اليوم للطبيب: ') }} 
            <span class="doctor-name">{{ $doctor->name }}</span>
        </h1>
    </header>

    @php
        \Carbon\Carbon::setLocale('ar');
        $todayDate = \Carbon\Carbon::today()->format('Y-m-d');
    @endphp

    <div class="today-appointments">
        <h3>{{ __('مواعيد اليوم') }}</h3>
        <div class="appointments-list">
            @php
                $todayAppointments = $appointments->filter(function ($appointment) use ($todayDate) {
                    return \Carbon\Carbon::parse($appointment->clinicAppointment->date)->format('Y-m-d') == $todayDate;
                });
            @endphp

            @if($todayAppointments->isEmpty())
                <p class="no-appointments">{{ __('لا توجد مواعيد اليوم') }}</p>
            @else
                @foreach($todayAppointments as $appointment)
                    <div class="appointment {{ $appointment->clinicAppointment->is_booked ? 'badge-success' : 'badge-danger' }}">
                        <div class="appointment-header">
                            <p class="appointment-name">{{ $appointment->name }}</p>
                            <p class="appointment-time">
                                {{ \Carbon\Carbon::parse($appointment->clinicAppointment->start_time)->format('g:i A') }} - 
                                {{ \Carbon\Carbon::parse($appointment->clinicAppointment->end_time)->format('g:i A') }}
                            </p>
                        </div>

                        <div class="appointment-actions">
                            @if($appointment->is_visit == 1)
                                <span class="checkmark">✔</span>
                            @else
                                <form action="{{ route('appointments.updateVisit', $appointment->id) }}" method="POST" class="appointment-form">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="is_visit" value="1" class="btn btn-success">{{ __('تم الزيارة') }}</button>
                                    <button type="submit" name="is_visit" value="0" class="btn btn-danger">{{ __('إلغاء الزيارة') }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Styles for Today's Appointments -->
    <style>
        .today-appointments {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .appointments-list {
            margin-top: 15px;
        }

        .appointment {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .appointment:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .badge-success {
            border-left: 5px solid #28a745;
        }

        .badge-danger {
            border-left: 5px solid #dc3545;
        }

        .appointment-header {
            flex: 1;
        }

        .appointment-name {
            font-size: 16px;
            font-weight: bold;
        }

        .appointment-time {
            color: #888;
            font-size: 14px;
            margin-top: 5px;
        }

        .appointment-actions {
            display: flex;
            gap: 10px;
        }

        .appointment-form button {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .no-appointments {
            text-align: center;
            color: #777;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .appointment {
                flex-direction: column;
            }

            .appointment-actions {
                justify-content: center;
            }
        }
    </style>
</div>
@endsection
