@extends('layouts.app')

@section('content')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.getElementById('toggle-appointment-form');
        const appointmentForm = document.getElementById('appointment-form');
        toggleButton.addEventListener('click', function () {
            if (appointmentForm.style.display === "none" || !appointmentForm.style.display) {
                appointmentForm.style.display = "block";
            } else {
                appointmentForm.style.display = "none";
            }
        });
        const table = document.getElementById('appointments-table');
        const rows = Array.from(table.querySelectorAll('tbody tr'));

        function convertTo12HourFormat(time) {
            const [hours, minutes] = time.split(':');
            const hoursInt = parseInt(hours, 10);
            const period = hoursInt >= 12 ? 'PM' : 'AM';
            const adjustedHours = hoursInt === 0 ? 12 : (hoursInt > 12 ? hoursInt - 12 : hoursInt);
            return `${adjustedHours}:${minutes} ${period}`;
        }
        rows.forEach(row => {
            const startTimeCell = row.querySelector('.time:nth-child(2)');
            const endTimeCell = row.querySelector('.time:nth-child(3)');
            const startTime = startTimeCell.textContent.trim();
            const endTime = endTimeCell.textContent.trim();
            startTimeCell.textContent = convertTo12HourFormat(startTime);
            endTimeCell.textContent = convertTo12HourFormat(endTime);
        });
        rows.sort((rowA, rowB) => {
            const dateA = new Date(rowA.getAttribute('data-date'));
            const dateB = new Date(rowB.getAttribute('data-date'));
            return dateA - dateB;
        });
        const tbody = table.querySelector('tbody');
        rows.forEach(row => tbody.appendChild(row));
    });

    document.addEventListener("DOMContentLoaded", function () {
        const prevButton = document.getElementById('prevMonth');
        const nextButton = document.getElementById('nextMonth');
        let currentMonth = 11; 
        let currentYear = 2024; 

        function updateCalendar() {
            document.querySelectorAll('.calendar-month').forEach((monthDiv, index) => {
                if (index !== currentMonth) {
                    monthDiv.style.display = 'none';
                } else {
                    monthDiv.style.display = 'block';
                }
            });
        }

        prevButton.addEventListener('click', function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            updateCalendar();
        });

        nextButton.addEventListener('click', function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            updateCalendar();
        });

        updateCalendar(); 
    });
</script>
<div class="container">
    @include('clinics.clinic-details', ['clinic' => $clinic])
    <hr>
    @include('clinics.clinic-time-slot', ['clinic' => $clinic])
    @include('clinics.clinic-appointments', ['appointments' => $appointments])
</div>

<style>
    .container {
        padding: 0;
        direction: rtl;
    }
</style>
@endsection