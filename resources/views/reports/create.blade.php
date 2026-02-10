
<link rel="preload" href="icons/ic-dashboard.svg" as="image">
<link rel="preload" href="icons/ic-user.svg" as="image">
<link rel="preload" href="icons/ic-invoice.svg" as="image">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    body {
        font-family: 'Cairo', sans-serif;
        background-color: #f8f9fa;
        color: #15a601;
    }

    .container-form {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 30px auto;
    }

    .form-header {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
        color: #15a601;
    }

    label {
        font-weight: 600;
        color: #555;
    }

    input,
    textarea,
    select {
        border-radius: 5px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        margin-bottom: 5px;
    }

    .submit-btn {
        background-color: #28a745;
        border: none;
        color: #fff;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    .form-section {
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #15a601;
        border-bottom: 2px solid #15a601;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .radio-group {
        display: flex;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .container-form {
            padding: 15px;
        }

        .submit-btn {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container">
    <div class="container-form">
        <h2 class="form-header">كتابة تقرير مرضي لـ {{ $patient->name }}</h2>

        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <input type="hidden" name="patient_id" value="{{ $patient->id }}">

            <!-- Patient Info Section -->
            <div class="form-section">
                <div class="section-title">معلومات المريض</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="name">الاسم<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $patient->name }}" readonly>
                        </div>
                        <div class="input-group">
                            <label for="age">العمر</label>
                            <input type="number" id="age" name="age" class="form-control">
                        </div>
                        <div class="input-group">
                            <label for="symptoms">الأعراض</label>
                            <input type="text" id="symptoms" name="symptoms" class="form-control">
                        </div>
                        <div class="input-group">
                            <label for="blood_type">فصيلة الدم</label>
                            <input type="text" id="blood_type" name="blood_type" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="medical_leave">الإجازة المرضية</label>
                            <input type="text" id="medical_leave" name="medical_leave" class="form-control">
                        </div>
                        <div class="input-group">
                            <label for="medical_report">التقرير الطبي<span class="text-danger">*</span></label>
                            <textarea id="medical_report" name="medical_report" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vital Signs Section -->
            <div class="form-section">
                <div class="section-title">العلامات الحيوية</div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="bp">BP</label>
                        <input type="number" id="bp" name="bp" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="temp">Temp</label>
                        <input type="number" id="temp" name="temp" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="weight">Pube</label>
                        <input type="number" id="pube" name="pube" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="hr">HR</label>
                        <input type="number" id="hr" name="hr" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="rr">RR</label>
                        <input type="number" id="rr" name="rr" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="spo2">Spo2</label>
                        <input type="number" id="spo2" name="spo2" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="pain">Weight</label>
                        <input type="number" id="Weight" name="Weight" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="pain">Height</label>
                        <input type="number" id="Height" name="Height" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Diagnosis Section -->
            <div class="form-section">
                <div class="section-title">التشخيص والعلاج</div>
                <div class="input-group">
                    <label for="diagnosis">التشخيص</label>
                    <input type="text" id="diagnosis" name="diagnosis" class="form-control">
                </div>
                <div class="input-group">
                    <label for="medication">العلاج</label>
                    <textarea id="medication" name="medication" rows="3" class="form-control"></textarea>
                </div>
                <div class="input-group">
                    <label for="treatment_plan">الخطة العلاجية</label>
                    <textarea id="treatment_plan" name="treatment_plan" rows="3" class="form-control"></textarea>
                </div>
            </div>

<!-- Insurance Section -->
<div class="form-section" style="display:none;">
    <div class="section-title">التأمين</div>
    <div class="radio-group">
        <div class="form-check">
            <input type="radio" class="form-check-input" name="has_insurance" id="insurance_yes" value="yes" onchange="toggleInsuranceField()">
            <label for="insurance_yes" class="form-check-label">نعم</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="has_insurance" id="insurance_no" value="no" checked onchange="toggleInsuranceField()">
            <label for="insurance_no" class="form-check-label">لا</label>
        </div>
    </div>
    <div id="insurance_field" style="display:none;" class="input-group">
        <label for="insurance_id">اختر التأمين</label>
        <select class="form-select" id="insurance_id" name="insurance_id">
            <option value="" selected>اختر التأمين</option>
            @foreach($insuranceProviders as $insurance)
            <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
            @endforeach
        </select>
    </div>
</div>


            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="submit-btn">إضافة</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleInsuranceField() {
        const insuranceField = document.getElementById('insurance_field');
        const insuranceYes = document.getElementById('insurance_yes');

        insuranceField.style.display = insuranceYes.checked ? 'block' : 'none';
    }
</script>
