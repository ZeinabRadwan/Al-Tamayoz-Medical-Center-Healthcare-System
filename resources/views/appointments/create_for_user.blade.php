@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container">
    <!-- Page Title -->
    <div class="top-controls">
<header class="page-title">
    <h1>احجز موعدا للمريض {{ $patient->name }}</h1>
    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary">الرجوع لصفحة المريض</a>
</header>


    </div>

    <form method="POST" action="{{ url('appointments/store') }}" id="appointment-form"
        class="p-4 bg-white rounded shadow-sm border border-success">
        @csrf
        <!-- Summary Section -->
        <div id="summary-container" class="p-3 mb-3 bg-light rounded shadow-sm" style="display: none;">
            <h5 class="text-success">ملخص البيانات</h5>
        </div>

        <!-- Step 1: Choose the Department -->
        <div class="form-step" id="step-1">
            <div class="mb-4">
                <label for="department" class="form-label fw-bold text-success">اختر القسم</label>
                <select id="department" name="department_id" class="form-select border-success" required>
                    <option value="">اختر قسمًا</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-success px-4 py-2" onclick="nextStep(1)">التالي</button>
            </div>
        </div>

        <!-- Step 2: Choose the Clinic -->
        <div class="form-step" id="step-2" style="display: none;">
            <div class="mb-4">
                <label for="clinic" class="form-label fw-bold text-success">اختر العيادة</label>
                <select id="clinic" name="clinic_id" class="form-select border-success" required>
                    <option value="">اختر عيادة</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success px-4 py-2" onclick="nextStep(2)">التالي</button>
                <button type="button" class="btn btn-outline-success px-4 py-2" onclick="prevStep(2)">رجوع</button>
            </div>
        </div>

        <!-- Step 3: Choose the Schedule -->
        <div class="form-step" id="step-3" style="display: none;">
            <div id="appointment-section">
                <div class="appointment-group mb-4">
                    <label for="date" class="form-label fw-bold text-success">اختر التاريخ</label>
                    <input type="date" name="dates[]" class="form-control border-success date-picker" required>

                    <label for="appointment" class="form-label mt-3 fw-bold text-success">اختر المواعيد</label>
                    <select name="appointments[]" class="form-select border-success appointment-picker" multiple required>
                        <option value="">اختر المواعيد</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-outline-success mb-3" id="add-date-button">إضافة تاريخ جديد</button>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success px-4 py-2" onclick="nextStep(3)">التالي</button>
                <button type="button" class="btn btn-outline-success px-4 py-2" onclick="prevStep(3)">رجوع</button>
            </div>
        </div>

        <!-- Step 4: Personal Information -->
        <input type="hidden" name="previous_form" value="yes">
        <div class="form-step" id="step-4" style="display: none;">
            <!-- Display Patient Data -->
            <div class="mb-3">
                <label class="form-label fw-bold text-success">الاسم</label>
                <input type="text" name="name" value="{{ old('name', $patient->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-success">رقم الهوية</label>
                <input type="text" name="id_number" value="{{ old('id_number', $patient->id_number) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-success">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الجنسية</label>
                <input type="text" name="nationality" value="{{ old('nationality', $patient->nationality) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-success">تاريخ الميلاد</label>
                <input type="date" name="dob" value="{{ old('dob', $patient->dob) }}" class="form-control" required>
            </div>

            <!-- Hidden Gender Field -->
            <input type="hidden" name="gender" value="male">

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-outline-success px-4 py-2" onclick="prevStep(4)">رجوع</button>
                <button type="submit" class="btn btn-success px-4 py-2">حجز المواعيد</button>
            </div>
        </div>
    </form>

</div>

<script>
    function nextStep(step) {
        updateSummary(step);
        $("#step-" + step).hide();
        $("#step-" + (step + 1)).show();
    }
    
    function updateSummary(currentStep) {
        const summaryContainer = $("#summary-container");
        let summaryContent = "";
        for (let step = 1; step <= currentStep; step++) {
            switch (step) {
                case 1: 
                    const department = $("#department option:selected").text();
                    summaryContent += `<p>القسم المختار: <strong>${department}</strong></p>`;
                    break;
    
                case 2: 
                    const clinic = $("#clinic option:selected").text();
                    summaryContent += `<p>العيادة المختارة: <strong>${clinic}</strong></p>`;
                    break;
    
                case 3: 
                    $(".appointment-group").each(function () {
                        const date = $(this).find(".date-picker").val();
                        const appointments = $(this)
                            .find(".appointment-picker option:selected")
                            .map(function () {
                                return $(this).text();
                            })
                            .get()
                            .join(", ");
                        summaryContent += `<p>التاريخ: <strong>${date}</strong></p>`;
                        summaryContent += `<p>المواعيد: <strong>${appointments}</strong></p>`;
                    });
                    break;
            }
        }
    
        summaryContainer.html(summaryContent).show();
    }

    function prevStep(step) {
        $("#step-" + step).hide();
        $("#step-" + (step - 1)).show();
    }

    $("#department").on("change", function () {
        let department_id = $(this).val();
        if (department_id) {
            $.get("{{ url('appointments/getClinics') }}", { department_id }, function (data) {
                let options = '<option value="">اختر عيادة</option>';
                data.forEach(clinic => {
                    options += `<option value="${clinic.id}">${clinic.name}</option>`;
                });
                $("#clinic").html(options);
            });
        } else {
            $("#clinic").html('<option value="">اختر عيادة</option>');
        }
    });

    $(document).on("change", ".date-picker", function () {
        const group = $(this).closest('.appointment-group');
        let clinic_id = $("#clinic").val();
        let date = $(this).val();
        if (clinic_id && date) {
            $.get("{{ url('appointments/getAvailableAppointments') }}", { clinic_id, date }, function (data) {
                let options = '';
                data.forEach(appointment => {
                    options += `<option value="${appointment.id}">${appointment.start_time} - ${appointment.end_time}</option>`;
                });
                group.find('.appointment-picker').html(options);
            });
        } else {
            group.find('.appointment-picker').html('<option value="">اختر مواعيد</option>');
        }
    });

    $("#add-date-button").on("click", function () {
        const newGroup = `
            <div class="appointment-group mb-3">
                <label for="date" class="form-label">اختر التاريخ</label>
                <input type="date" name="dates[]" class="form-control date-picker" required>

                <label for="appointment" class="form-label mt-2">اختر المواعيد</label>
                <select name="appointments[]" class="form-select appointment-picker" multiple required>
                    <option value="">اختر المواعيد</option>
                </select>
            </div>
        `;
        $("#appointment-section").append(newGroup);
    });
</script>

@endsection
