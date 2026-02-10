@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-title">
        <h1>{{ __('عيادة :clinic_name - الفريق الطبي', ['clinic_name' => $clinic->name]) }}</h1>
    </header>

    <div class="tabs-container">
       @role('أخصائي')
            @else
            <div class="tabs">
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/clinics';" />
                <label class="tab" for="radio-1">إجمالي
                    العيادات</label>
            </div>
            @endrole
    </div>

    <div class="row d-flex justify-content-center">
        @foreach($doctors as $doctor)
            <div class="col-md-8 mb-4">
                <div class="card staff-card">
                    <img src="{{ $doctor->image ? asset('storage/' . $doctor->image) : 'https://static.vecteezy.com/system/resources/thumbnails/015/413/667/small/doctor-round-avatar-medicine-flat-avatar-with-female-doctor-medical-clinic-team-round-icon-medical-collection-illustration-vector.jpg' }}" class="card-img-top doctor-img" alt="Doctor Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="card-text"><strong>{{ __('الوظيفة') }}:</strong> {{ $doctor->job_title }}</p>
                        <p class="card-text"><strong>{{ __('البريد الإلكتروني') }}:</strong> {{ $doctor->email }}</p>
                        <p class="card-text"><strong>{{ __('الهاتف') }}:</strong> {{ $doctor->phone }}</p>
<a href="{{ route('doctor.appointments', ['doctor' => $doctor->id]) }}" class="btn btn-primary">
    {{ __(' المواعيد المحجوزة') }}
</a>

<a href="{{ route('doctor.appointments', ['doctor' => $doctor->id]) }}/today" class="btn btn-secondary">
    مواعيد اليوم
</a>

<a href="{{ route('clinics.patient', $doctor) }}" class="btn btn-success">
    مرضى العيادة
</a>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection

@section('styles')
    <style>
        .staff-card {
            margin-top: 30px;
            border: 1px solid #e0e0e0; 
            border-radius: 15px;
            background-color: #ffffff; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }
        
        .staff-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); 
        }
        
        .doctor-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto;
            display: block;
            margin-top: 20px;
            border: 3px solid #73C36A; 
        }
        
        .card-body {
            text-align: center;
            padding: 20px;
        }
        
        .card-title {
            font-size: 1.5rem; 
            font-weight: 700; 
            color: #9C80D7; 
        }
        
        .card-text {
            font-size: 1rem;
            color: #666; 
        }
        
        .card-text strong {
            color: #333; 
        }
        
        @media (max-width: 768px) {
            .staff-card {
                margin-bottom: 20px;
            }
            .doctor-img {
                width: 120px;
                height: 120px;
            }
        }
    </style>
@endsection
