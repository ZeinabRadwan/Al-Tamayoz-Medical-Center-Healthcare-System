@extends('layouts.app')

@section('content')
<div class="container">

    <h1>مرضى {{ $doctor->name }}</h1>
    
<form method="GET" action="{{ route('clinics.patient', $doctor) }}">
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="search[name]" value="{{ request('search.name') }}" class="form-control" placeholder="ابحث عن الاسم">
        </div>
        <div class="col-md-4">
            <input type="text" name="search[id_number]" value="{{ request('search.id_number') }}" class="form-control" placeholder="ابحث عن رقم الهوية">
        </div>
        <div class="col-md-4">
            <input type="text" name="search[phone]" value="{{ request('search.phone') }}" class="form-control" placeholder="ابحث عن الهاتف">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">بحث</button>
</form>


    <h3>إجمالي المرضى: {{ $patientCount }}</h3>

    @if($patients->isEmpty())
        <p class="no-items">لا يوجد مرضى لعرضهم</p>
    @else
    <div class="table-wrapper">
        <table class="items-table">
            <thead>
                <tr>
                    <th>رقم المريض</th>
                    <th>الاسم</th>
                    <th>رقم الهوية</th>
                    <th>العمر</th>
                    <th>الهاتف</th>
                    <th>الجنسية</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = $patients->firstItem();
                @endphp
                @foreach($patients as $patient)
                <tr class="fade-in">
                    <td>{{ $counter++ }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->id_number }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->nationality }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('patients.show', $patient) }}" class="action-icon me-2"><i class="fa-solid fa-eye"></i></a>
             
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper">
            {{ $patients->links() }}
        </div>
    </div>
    @endif
</div>

@endsection
