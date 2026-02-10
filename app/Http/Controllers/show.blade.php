@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="patient-header">
                <div class="header-content">
                    <h1 class="patient-name">{{ $patient->name }}</h1>
                    <div class="patient-meta">
                        <span class="patient-age">
                            {{ (int) $patient->age }} سنة
                        </span>
                        <span class="patient-nationality">{{ $patient->nationality }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-container">
                <div class="card patient-card">
                    <div class="card-header">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab active" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab">
                                    <i class="fas fa-user-md"></i> تفاصيل المريض
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab" data-bs-toggle="tab" data-bs-target="#reports-section" type="button"
                                    role="tab">
                                    <i class="fas fa-file-medical"></i>
                                    استمارات التقييم
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button"
                                    role="tab">
                                    <i class="fas fa-file-medical"></i>
                                    التقارير الطبية
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab" data-bs-toggle="tab" data-bs-target="#diseases" type="button"
                                    role="tab">
                                    <i class="fas fa-virus"></i>
                                    الامراض المزمنة
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab" data-bs-toggle="tab" data-bs-target="#billings" type="button"
                                    role="tab">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    الفواتير
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-tab" data-bs-toggle="tab" data-bs-target="#visits" type="button"
                                    role="tab">
                                    <i class="fas fa-file-medical"></i>
                                    الزيارات
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <form method="GET" action="{{ route('appointments.create', ['patient_id' => $patient->id]) }}">
                                    <button type="submit" class="btn btn-success">حجز موعد جديد</button>
                                </form>

                            </li>
                        </ul>
                    </div>

                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="details" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="patient-info-section">
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-birthday-cake"></i></div>
                                            <div class="info-content">
                                                <h5>تاريخ الميلاد</h5>
                                                <p>{{ $patient->dob }}</p>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                                            <div class="info-content">
                                                <h5>العنوان</h5>
                                                <p>{{ $patient->address }}</p>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-notes-medical"></i></div>
                                            <div class="info-content">
                                                <h5>الأعراض</h5>
                                                <p>{{ $patient->symptoms }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="patient-info-section">
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-phone"></i></div>
                                            <div class="info-content">
                                                <h5>الهاتف</h5>
                                                <p>{{ $patient->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                            <div class="info-content">
                                                <h5>البريد الإلكتروني</h5>
                                                <p>{{ $patient->email }}</p>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-icon"><i class="fas fa-tint"></i></div>
                                            <div class="info-content">
                                                <h5>فصيلة الدم</h5>
                                                <p>{{ $patient->blood_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                @can('تعديل مريض')
                                <a href="{{ route('patients.edit', $patient->id) }}"
                                    class="btn btn-primary me-3">تعديل</a>
                                @endcan
                                <button onclick="window.print()"
                                    class="btn btn-primary">طباعة</button>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="reports" role="tabpanel">
                            <div class="reports-header">
                                @include('reports.create' , ['patient' => $patient])
                            </div>
                            @php
                            $additionalReports = \DB::table('reports')
                            ->where('patient_id', $patient->id)
                            ->get();

                            @endphp
                            @include('reports.reports-table', ['reports' => $additionalReports])

                        </div>

                        <div class="tab-pane fade" id="reports-section" role="tabpanel">
                            <div class="reports-container">
                                <ul class="nav nav-tabs" id="departmentTabs" role="tablist">
                                    @if($departments->isNotEmpty())
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="all-reports-tab" data-bs-toggle="tab" data-bs-target="#all-reports-content" type="button" role="tab" aria-controls="all-reports-content" aria-selected="true">
                                            جميع التقارير
                                        </button>
                                    </li>
                                    @foreach($departments as $department)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="dept-{{ $department->id }}-tab" data-bs-toggle="tab" data-bs-target="#dept-{{ $department->id }}-content" type="button" role="tab" aria-controls="dept-{{ $department->id }}-content" aria-selected="false">
                                            {{ $department->name }}
                                        </button>
                                    </li>
                                    @endforeach
                                    @else
                                    <p class="text-muted">لا توجد أقسام مرتبطة بهذا المستخدم.</p>
                                    @endif
                                </ul>

                                <div class="tab-content mt-4" id="departmentTabsContent">
                                    @if($departments->isNotEmpty())
                                    <div class="tab-pane fade show active" id="all-reports-content" role="tabpanel" aria-labelledby="all-reports-tab">
                                        <div class="reports-table-container">
                                            <h4>جميع التقارير</h4>
                                            @php
                                            $allReports = collect();
                                            foreach ($departments as $department) {
                                            foreach ($department->reportTemplates as $template) {
                                            $tableName = $template->slug;
                                            try {
                                            $reports = \DB::table($tableName)
                                            ->where('patient_id', $patientId)
                                            ->get();
                                            if ($reports->count() > 0) {
                                            foreach ($reports as $report) {
                                            $allReports->push([
                                            'template_name' => $template->name,
                                            'created_at' => $report->created_at,
                                            'report_id' => $report->id,
                                            'slug' => $template->slug,
                                            ]);
                                            }
                                            }
                                            } catch (\Illuminate\Database\QueryException $ex) {
                                            continue;
                                            }
                                            }
                                            }
                                            @endphp
                                            @include('reports.reports-table', ['reports' => $allReports])
                                        </div>
                                    </div>

                                    @foreach($departments as $department)
                                    <div class="tab-pane fade" id="dept-{{ $department->id }}-content" role="tabpanel" aria-labelledby="dept-{{ $department->id }}-tab">
                                        <div class="department-content">
                                            <h4>{{ $department->name }}</h4>

                                            <div class="report-templates mb-4">
                                                <h5>نماذج التقارير</h5>
                                                <div class="template-buttons">
                                                    @foreach($department->reportTemplates as $template)
                                                    @if(Route::has(strtolower($template->slug) . '.create'))
                                                    <a href="{{ route(strtolower($template->slug) . '.create', ['patient_id' => $patientId, 'template_id' => $template->id]) }}" class="btn btn-primary template-btn">
                                                        {{ $template->name }}
                                                    </a>
                                                    @else
                                                    <button class="btn btn-secondary template-btn" disabled>
                                                        {{ $template->name }}
                                                    </button>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="reports-table-container">
                                                <h5>تقارير القسم</h5>
                                                @php
                                                $departmentReports = $allReports->filter(function($report) use ($department) {
                                                return $department->reportTemplates->contains('name', $report['template_name']);
                                                });
                                                @endphp
                                                @include('reports.reports-table', ['reports' => $departmentReports])
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="diseases" role="tabpanel" aria-labelledby="tab-4-tab">
                            <div class="diseases-container">
                                <div class="diseases-header">
                                    <h4 class="diseases-title">الأمراض</h4>
                                </div>

                                <div class="diseases-content">
                                    @if($patient->symptoms)
                                    <div class="symptoms-card">
                                        <div class="symptoms-header">
                                            <i class="fas fa-notes-medical symptoms-icon"></i>
                                            <h5 class="symptoms-title">الأعراض والتشخيص</h5>
                                        </div>
                                        <div class="symptoms-body">
                                            {{ $patient->symptoms }}
                                        </div>
                                    </div>
                                    @else
                                    <div class="no-symptoms">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>لا توجد أعراض مسجلة</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="billings" role="tabpanel" aria-labelledby="tab-4-tab">
                            <div class="billings-container">
                                <div class="billings-header">
                                    <h4 class="billings-title">الفواتير</h4>
                                    <div class="billing-summary">
                                        <span class="total-amount">إجمالي الفواتير: {{ $patient->billings ? $patient->billings->count() : 0 }}</span>
                                    </div>
                                </div>

                                @if($patient->billings->isEmpty())
                                <div class="no-bills">
                                    <i class="fas fa-file-invoice"></i>
                                    <p>لا توجد فواتير لهذا المريض</p>
                                </div>
                                @else
                                <div class="bills-table-wrapper">
                                    <table class="bills-table">
                                        <thead>
                                            <tr>
                                                <th>رقم الفاتورة</th>
                                                <th>الطبيب</th>
                                                <th>العيادات والخدمات</th>
                                                <th>المبلغ الكلي</th>
                                                <th>المبلغ المدفوع</th>
                                                <th>طرق الدفع</th>
                                                <th>التاريخ</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patient->billings as $bill)
                                            <tr class="bill-row">
                                                <td>{{ $bill->id }}</td>
                                                <td>{{ $bill?->doctor?->name }}</td>
                                                <td>
                                                    <div class="services-list">
                                                        @foreach ($bill->clinic_services as $service)
                                                        <span class="service-item">
                                                            @if($service['type'] === 'clinic')
                                                            {{ \App\Models\Clinic::find($service['clinic_id'])->name }}
                                                            @else
                                                            {{ \App\Models\Service::find($service['service_id'])->name }}
                                                            @endif
                                                        </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>{{ number_format($bill->total_amount, 2) }} ر.س</td>
                                                <td>{{ number_format($bill->paid_amount, 2) }} ر.س</td>
                                                <td>
                                                    <div class="payment-methods">
                                                        @foreach ($bill->payments as $payment)
                                                        <span class="payment-badge {{ $payment['method'] }}">
                                                            {{ $payment['method'] }}
                                                        </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                                                <td class="actions">
                                                    <a href="{{ route('billing.view', ['id' => $bill->id]) }}"
                                                        class="view-btn"
                                                        title="عرض الفاتورة">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href=""
                                                        class="view-btn"
                                                        title="تعديل الفاتورة">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href=""
                                                        class="delete-btn"
                                                        title="حذف الفاتورة">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="billing-stats">
                                    <div class="stats-grid">
                                        <div class="stat-card">
                                            <i class="fas fa-money-bill"></i>
                                            <div class="stat-content">
                                                <span class="stat-label">إجمالي الفواتير</span>
                                                <span class="stat-value">{{ number_format($patient->billings->sum('total_amount'), 2) }} ر.س</span>
                                            </div>
                                        </div>

                                        <div class="stat-card">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <div class="stat-content">
                                                <span class="stat-label">إجمالي المدفوع</span>
                                                <span class="stat-value">{{ number_format($patient->billings->sum('paid_amount'), 2) }} ر.س</span>
                                            </div>
                                        </div>

                                        <div class="stat-card">
                                            <i class="fas fa-file-invoice"></i>
                                            <div class="stat-content">
                                                <span class="stat-label">عدد الفواتير</span>
                                                <span class="stat-value">{{ $patient->billings->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>


                        <div class="tab-pane fade" id="visits" role="tabpanel" aria-labelledby="tab-4-tab">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: rgba(68, 190, 83, 0.76);
            --primary-color2: #218838;
            --grey-light: #f8f9fa;
            --grey-dark: #343a40;
            --secondary-color: rgb(230, 249, 232);
        }

        @media print {
            .btn {
                display: none !important;
            }
        }

        li .nav-link {
            color: var(--primary-color2) !important;
        }

        .billings-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }

        .billings-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .billings-title {
            color: #2c3e50;
            font-size: 1.5rem;
            margin: 0;
        }

        .billing-summary {
            color: #666;
            font-size: 0.95rem;
        }

        .no-bills {
            text-align: center;
            padding: 3rem 1rem;
            color: #95a5a6;
        }

        .no-bills i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .bills-table-wrapper {
            overflow-x: auto;
            margin-bottom: 2rem;
        }

        .bills-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .bills-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: right;
            font-weight: 600;
            color: #2c3e50;
        }

        .bills-table td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            color: #444;
        }

        .bill-row {
            transition: background-color 0.2s;
        }

        .bill-row:hover {
            background-color: #f8f9fa;
        }

        .payment-method {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .payment-method.cash {
            background: #ffeaea;
            color: #dc3545;
        }

        .payment-method.credit_card {
            background: #e3f2fd;
            color: #0d6efd;
        }

        .payment-method.mada {
            background: #fff3cd;
            color: #ffc107;
        }

        .payment-method.transfer {
            background: #d4edda;
            color: #198754;
        }

        .payment-method.insurance {
            background: #f8d7da;
            color: #dc3545;
        }

        .view-btn {
            color: #3498db;
            padding: 0.5rem;
            transition: color 0.2s;
        }

        .view-btn:hover {
            color: #2980b9;
        }

        .billing-stats {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 8px;
            gap: 1rem;
        }

        .stat-card i {
            font-size: 1.5rem;
            color: #3498db;
        }

        .stat-content {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .stat-value {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .billings-container {
                padding: 1rem;
            }

            .billings-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .bills-table th,
            .bills-table td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .stat-card {
                padding: 1rem;
            }
        }

        .diseases-container {
            padding: 1.5rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .diseases-header {
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 1rem;
        }

        .diseases-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .diseases-content {
            padding: 1rem 0;
        }

        .symptoms-card {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 1.25rem;
            transition: all 0.3s ease;
        }

        .symptoms-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .symptoms-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            gap: 0.75rem;
        }

        .symptoms-icon {
            color: #3498db;
            font-size: 1.25rem;
        }

        .symptoms-title {
            color: #34495e;
            font-size: 1.1rem;
            font-weight: 500;
            margin: 0;
        }

        .symptoms-body {
            color: #576574;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .no-symptoms {
            text-align: center;
            padding: 3rem 1rem;
            color: #95a5a6;
        }

        .no-symptoms i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .no-symptoms p {
            font-size: 1.1rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .diseases-container {
                padding: 1rem;
            }

            .symptoms-card {
                padding: 1rem;
            }

            .diseases-title {
                font-size: 1.25rem;
            }
        }

        body {
            font-family: 'Cairo', Arial, sans-serif;
            direction: rtl;
            color: var(--primary-color2);
            line-height: 1.6;
        }

        .patient-profile {
            padding: 2rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .patient-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--primary-color2);
            padding: 2rem;
            border-radius: 15px;
            margin-top: 20px;
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .patient-name {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .patient-meta {
            display: flex;
            gap: 1rem;
            font-size: 1rem;
        }

        .card-container {
            perspective: 1000px;
        }

        .patient-card {
            background-color: var(--card-background);
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 2px solid var(--background-color);
            padding: 1rem;
        }

        .nav-pills {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .nav-tab {
            color: var(--primary-color2);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-tab.active {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-tab i {
            margin-left: 0.5rem;
        }

        .patient-info-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            background-color: var(--background-color);
            padding: 1rem;
            border-radius: 10px;
            transition: transform 0.2s ease;
        }

        .info-item:hover {
            transform: translateX(-10px);
        }

        .info-icon {
            background-color: var(--primary-color);
            color: var(--primary-color2);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-left: 1rem;
            font-size: 1.5rem;
        }

        .info-content h5 {
            color: var(--primary-color2);
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .reports-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-create-report {
            background-color: var(--primary-color);
            color: var(--primary-color2);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-create-report:hover {
            background-color: var(--secondary-color);
        }

        .report-department {
            margin-bottom: 1.5rem;
        }

        .report-department h4 {
            color: var(--primary-color2);
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--grey-dark);
            padding-bottom: 0.5rem;
        }

        .report-templates {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .report-template-item {
            background-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border-color: var(--primary-color);
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .report-template-item:hover {
            background-color: var(--primary-color2);
            color: white;
        }

        .report-template-item.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .reports-table-container h4 {
            color: var(--grey-dark);
            margin-bottom: 1rem;
        }

        .reports-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 1rem;
        }

        .reports-table thead th {
            background-color: var(--grey-light);
            padding: 1rem;
            text-align: right;
            color: var(--primary-color2);
        }

        .reports-table tbody tr {
            background-color: var(--primary-color);
            transition: transform 0.2s ease;
        }

        .reports-table tbody tr:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .reports-table td {
            padding: 1rem;
        }

        .report-actions {
            display: flex;
            gap: 0.5rem;
        }

        .report-actions .btn {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
