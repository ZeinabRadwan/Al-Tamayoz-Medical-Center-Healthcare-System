@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>عرض التقرير</h1>

        <div class="card">
            <div class="card-body">
                <h3>عنوان التقرير: {{ $report->report_title }}</h3>
                <p><strong>تاريخ التقرير:</strong> {{ $report->current_day }}</p>
                <p><strong>اسم المريض:</strong> {{ $patient->name }}</p> <!-- Patient's name from patients table -->

                <p><strong>رقم المريض:</strong> {{ $report->patient_id }}</p>

                <p><strong>محتوى التقرير:</strong> {{ $report->session_proceedings }}</p>

                <!-- Link to the patient's page using the patient's id -->
                <a href="/patients/{{ $report->patient_id }}" class="btn btn-secondary">
                    العودة إلى صفحة المريض
                </a>
            </div>
        </div>
    </div>
@endsection
