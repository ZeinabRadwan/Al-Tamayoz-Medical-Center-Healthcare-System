@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
#step-3 .appointment-picker {
    height: 300px; /* Allow the height to adjust based on content */
    overflow-y: auto; /* Enable vertical scrolling for overflowing content */
    font-size: 1rem; /* Make font more readable */
    padding: 0.75rem 1.25rem; /* Add padding for better spacing inside */
    border-radius: 0.375rem; /* Round the corners */
    background-color: #f8f9fa; /* Light background for contrast */
    transition: all 0.3s ease; /* Smooth transitions for hover/focus */
}

#step-3 .appointment-picker option {
    padding: 0.5rem; /* Add padding to options for better clickability */
    font-size: 1rem; /* Make the text a bit larger */
    color: #495057; /* Default text color */
    transition: all 0.3s ease; /* Smooth transition for hover/focus effects */
}

/* Highlight selected option */
#step-3 .appointment-picker option:checked {
    background-color: #28a745; /* Green background for selected option */
    color: #fff; /* White text on selected option */
}

/* Hover effect for options */
#step-3 .appointment-picker option:hover {
    background-color: #e9ecef; /* Light grey background on hover */
    cursor: pointer; /* Change the cursor to pointer to indicate interactivity */
}

/* Focus effect on the select box */
#step-3 .appointment-picker:focus {
    outline: none; /* Remove the default outline */
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); /* Add custom focus shadow */
}

/* Enhancing the overall container of the appointment section */
#appointment-section {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    padding: 0 1rem; /* Add padding for better spacing */
}

/* Add spacing and alignment for buttons */
.d-flex .btn {
    margin-top: 10px; /* Add margin between buttons */
}

/* Add smooth transitions on hover for buttons */
.d-flex .btn:hover {
    background-color: #218838; /* Darken the green on hover for buttons */
    border-color: #1e7e34;
}

/* Add border to the select box for a more defined look */
#step-3 .appointment-picker {
    border: 1px solid #ced4da;
    border-radius: 0.375rem; /* Rounded corners */
}
    .btn-success {
        color : green;
    }
    
    .appointment-picker-container {
    margin-top: 15px;
}

.appointment-options {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
    gap: 10px;
}

.appointment-card {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 25px;
    border: 2px solid #28a745;
    background-color: #f8f9fa;
    cursor: pointer;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.appointment-card:hover {
    background-color: #28a745;
    color: white;
    transform: scale(1.05);
}

.appointment-card.selected {
    background-color: #28a745;
    color: white;
    font-weight: bold;
}

.appointment-card .time-text {
    font-size: 16px;
    text-align: center;
}
</style>

<div class="container py-5">
    <!-- Page Title -->
    <header class="mb-4 text-center">
        <h1 class="page-title text-success fw-bold">احجز موعدًا</h1>
    </header>

    <form method="POST" action="{{ url('appointments/store') }}" id="appointment-form"
        class="p-4 bg-white rounded shadow-sm border border-success" onsubmit="return confirmSubmit()">
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
                    <div class="appointment-picker-container">
                        <div id="appointment-options" class="appointment-options">
                        </div>
                        <div id="friday-error" class="alert alert-danger" style="display: none; margin-top: 20px;">المجمع لا يعمل أيام الجمعة</div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-outline-success mb-3" id="add-date-button">إضافة تاريخ جديد</button>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success px-4 py-2" onclick="nextStep(3)">التالي</button>
                <button type="button" class="btn btn-outline-success px-4 py-2" onclick="prevStep(3)">رجوع</button>
            </div>
        </div>

        <!-- Step 4: Personal Information -->
        <div class="form-step" id="step-4" style="display: none;">
                                        <input type="hidden" name="appointments[]" id="hidden-appointments">
            <div class="mb-4">
                <label class="form-label fw-bold text-success">
    هل يوجد لك ملف سابق
</label>

                <br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="yes" name="previous_form" value="yes" class="form-check-input"
                        onclick="showPreviousFormFields(true)">
                    <label class="form-check-label" for="yes">نعم</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="no" name="previous_form" value="no" class="form-check-input"
                        onclick="showPreviousFormFields(false)">
                    <label class="form-check-label" for="no">لا</label>
                </div>
            </div>

            <div id="existing_patient_fields" class="mb-4" style="display: none;">
                <label for="existing_id_number" class="form-label fw-bold text-success">رقم الهوية</label>
                <input type="text" id="existing_id_number" name="id_number" class="form-control border-success">
                <button type="button" class="btn btn-outline-success mt-3" onclick="checkPatient()">تحقق من المريض</button>
            </div>

            <div id="new_patient_fields" style="display: none;">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-success">الاسم</label>
                    <input type="text" id="name" name="name" class="form-control border-success" required>
                </div>

                <div class="mb-3">
                    <label for="new_patient_id_number" class="form-label fw-bold text-success">رقم الهوية</label>
                    <input type="text" id="new_patient_id_number" name="id_number" class="form-control border-success">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold text-success">رقم الهاتف</label>
                    <input type="text" id="phone" name="phone" class="form-control border-success" required>
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">الجنسية</label>
                        <select id="nationality" name="nationality" class="form-control" required>
                            <option value="">اختر الجنسية</option>
                            <option value="السعودية">السعودية</option>
                            <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                            <option value="الكويت">الكويت</option>
                            <option value="قطر">قطر</option>
                            <option value="البحرين">البحرين</option>
                            <option value="سلطنة عمان">سلطنة عمان</option>
                            <option value="مصر">مصر</option>
                            <option value="السودان">السودان</option>
                            <option value="أفغانستان">أفغانستان</option>
                            <option value="ألبانيا">ألبانيا</option>
                            <option value="الجزائر">الجزائر</option>
                            <option value="اليمن">اليمن</option>
                            <option value="أندورا">أندورا</option>
                            <option value="أنغولا">أنغولا</option>
                            <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                            <option value="الأرجنتين">الأرجنتين</option>
                            <option value="أرمينيا">أرمينيا</option>
                            <option value="أستراليا">أستراليا</option>
                            <option value="سوريا">سوريا</option>
                            <option value="تركيا">تركيا</option>
                            <option value="النمسا">النمسا</option>
                            <option value="أذربيجان">أذربيجان</option>
                            <option value="بهماس">بهماس</option>
                            <option value="بنغلاديش">بنغلاديش</option>
                            <option value="باربادوس">باربادوس</option>
                            <option value="ألمانيا">ألمانيا</option>
                            <option value="بليز">بليز</option>
                            <option value="بنين">بنين</option>
                            <option value="بوتان">بوتان</option>
                            <option value="بوليفيا">بوليفيا</option>
                            <option value="البوسنة والهرسك">البوسنة والهرسك</option>
                            <option value="بوتسوانا">بوتسوانا</option>
                            <option value="البرازيل">البرازيل</option>
                            <option value="بروناي">بروناي</option>
                            <option value="بلغاريا">بلغاريا</option>
                            <option value="بوركينا فاسو">بوركينا فاسو</option>
                            <option value="بوروندي">بوروندي</option>
                            <option value="كمبوديا">كمبوديا</option>
                            <option value="الكاميرون">الكاميرون</option>
                            <option value="كندا">كندا</option>
                            <option value="الرأس الأخضر">الرأس الأخضر</option>
                            <option value="تشاد">تشاد</option>
                            <option value="شيلي">شيلي</option>
                            <option value="الصين">الصين</option>
                            <option value="كولومبيا">كولومبيا</option>
                            <option value="جزر القمر">جزر القمر</option>
                            <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                            <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                            <option value="كوستاريكا">كوستاريكا</option>
                            <option value="كرواتيا">كرواتيا</option>
                            <option value="كوبا">كوبا</option>
                            <option value="قبرص">قبرص</option>
                            <option value="جمهورية التشيك">جمهورية التشيك</option>
                            <option value="الدنمارك">الدنمارك</option>
                            <option value="جيبوتي">جيبوتي</option>
                            <option value="دومينيكا">دومينيكا</option>
                            <option value="الإكوادور">الإكوادور</option>
                            <option value="السلفادور">السلفادور</option>
                            <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                            <option value="إريتريا">إريتريا</option>
                            <option value="استونيا">استونيا</option>
                            <option value="إثيوبيا">إثيوبيا</option>
                            <option value="فجي">فجي</option>
                            <option value="فنلندا">فنلندا</option>
                            <option value="فرنسا">فرنسا</option>
                            <option value="غابون">غابون</option>
                            <option value="غامبيا">غامبيا</option>
                            <option value="غينيا">غينيا</option>
                            <option value="غينيا بيساو">غينيا بيساو</option>
                            <option value="غيانا">غيانا</option>
                            <option value="هايتي">هايتي</option>
                            <option value="هندوراس">هندوراس</option>
                            <option value="هنغاريا">هنغاريا</option>
                            <option value="آيسلندا">آيسلندا</option>
                            <option value="الهند">الهند</option>
                            <option value="إندونيسيا">إندونيسيا</option>
                            <option value="إيران">إيران</option>
                            <option value="العراق">العراق</option>
                            <option value="أيرلندا">أيرلندا</option>
                            <option value="فلسطين">فلسطين</option>
                            <option value="إيطاليا">إيطاليا</option>
                            <option value="جامايكا">جامايكا</option>
                            <option value="اليابان">اليابان</option>
                            <option value="الأردن">الأردن</option>
                            <option value="كازاخستان">كازاخستان</option>
                            <option value="كينيا">كينيا</option>
                            <option value="كيريباتي">كيريباتي</option>
                            <option value="كوريا الشمالية">كوريا الشمالية</option>
                            <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                            <option value="قيرغيزستان">قيرغيزستان</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاتفيا">لاتفيا</option>
                            <option value="لبنان">لبنان</option>
                            <option value="ليسوتو">ليسوتو</option>
                            <option value="ليبيريا">ليبيريا</option>
                            <option value="ليبيا">ليبيا</option>
                            <option value="ليتوانيا">ليتوانيا</option>
                            <option value="لوكسمبورغ">لوكسمبورغ</option>
                            <option value="مقدونيا">مقدونيا</option>
                            <option value="مدغشقر">مدغشقر</option>
                            <option value="ملاوي">ملاوي</option>
                            <option value="ماليزيا">ماليزيا</option>
                            <option value="جزر المالديف">جزر المالديف</option>
                            <option value="مالي">مالي</option>
                            <option value="مالطا">مالطا</option>
                            <option value="جزر مارشال">جزر مارشال</option>
                            <option value="موريتانيا">موريتانيا</option>
                            <option value="موريشيوس">موريشيوس</option>
                            <option value="المكسيك">المكسيك</option>
                            <option value="ميكرونيزيا">ميكرونيزيا</option>
                            <option value="مولدوفا">مولدوفا</option>
                            <option value="منغوليا">منغوليا</option>
                            <option value="موناكو">موناكو</option>
                            <option value="مونتينيغرو">مونتينيغرو</option>
                            <option value="المغرب">المغرب</option>
                            <option value="موزمبيق">موزمبيق</option>
                            <option value="ميانمار">ميانمار</option>
                            <option value="ناميبيا">ناميبيا</option>
                            <option value="ناورو">ناورو</option>
                            <option value="نيبال">نيبال</option>
                            <option value="هولندا">هولندا</option>
                            <option value="نيوزيلندا">نيوزيلندا</option>
                            <option value="نيكاراغوا">نيكاراغوا</option>
                            <option value="النيجر">النيجر</option>
                            <option value="نيجيريا">نيجيريا</option>
                            <option value="النرويج">النرويج</option>
                            <option value="أفريقيا الجنوبية">أفريقيا الجنوبية</option>
                            <option value="الولايات المتحدة الأمريكية">الولايات المتحدة الأمريكية</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label fw-bold text-success">تاريخ الميلاد</label>
                    <input type="date" id="dob" name="dob" class="form-control border-success" required>
                </div>

<div class="mb-3">
    <label for="gender" class="form-label fw-bold text-success" style="display: none;">الجنس</label>
    <input type="hidden" id="gender" name="gender" value="male">
</div>

            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4 py-2">حجز المواعيد</button>
                <button type="button" class="btn btn-outline-success px-4 py-2" onclick="prevStep(4)">رجوع</button>
            </div>
        </div>
    </form>
    <div id="patient-summary" style="display: none; margin-top: 20px;">
    <!-- Patient data will be displayed here -->
</div>
</div>

<script>
    function confirmSubmit() {
        return confirm('هل ترغب في تأكيد الحجز ؟');
    }
    function nextStep(step) {
        // Gather data from all steps up to the current step and update the summary
        updateSummary(step);
    
        // Hide the current step and show the next step
        $("#step-" + step).hide();
        $("#step-" + (step + 1)).show();
    }
    
    // Update the summary
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
                        let appointments = [];
                        $(this).find(".appointment-card.selected").each(function () {
                            const appointmentId = $(this).data("id");
                            const appointmentTime = $(this).find(".time-text").text();
                            appointments.push({ id: appointmentId, time: appointmentTime });
                        });
                        summaryContent += `<p>التاريخ: <strong>${date}</strong></p>`;
                        if (appointments.length > 0) {
                            const appointmentsText = appointments.map(app => `${app.time} (ID: ${app.id})`).join(", ");
                            summaryContent += `<p>المواعيد: <strong>${appointmentsText}</strong></p>`;
                        } else {
                            summaryContent += `<p>المواعيد: <strong>لم يتم اختيار أي مواعيد</strong></p>`;
                        }
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

    function showPreviousFormFields(isExisting) {
        $("#existing_patient_fields").toggle(isExisting);
        $("#new_patient_fields").toggle(!isExisting);

        if (isExisting) {
            $("#existing_id_number").prop("required", true);
            $("#new_patient_id_number").prop("required", false);
        } else {
            $("#existing_id_number").prop("required", false);
            $("#new_patient_id_number").prop("required", true);
        }
    }

    function checkPatient() {
        let id_number = $("#existing_id_number").val();
        if (id_number) {
            $.get("{{ url('appointments/checkPatient') }}", { id_number }, function (data) {
                if (data.found) {
                    // Fill the form fields with the patient's existing data
                    $("#name").val(data.patient.name);
                    $("#phone").val(data.patient.phone);
                    $("#nationality").val(data.patient.nationality);
                    $("#dob").val(data.patient.dob);
                    $("#gender").val(data.patient.gender);
                    $("#new_patient_id_number").val(data.patient.id_number);

                    // Display the patient data in the summary div
                    $("#patient-summary").html(`
                        <h3>بيانات المريض:</h3>
                        <ul>
                            <li><strong>الاسم:</strong> ${data.patient.name}</li>
                            <li><strong>رقم الهاتف:</strong> ${data.patient.phone}</li>
                            <li><strong>الجنسية:</strong> ${data.patient.nationality}</li>
                            <li><strong>تاريخ الميلاد:</strong> ${data.patient.dob}</li>
                        </ul>
                    `);
                    $("#patient-summary").show();  // Ensure the summary div is shown
                } else {
                    // Patient not found, display a message
                    $("#patient-summary").html('<p>المريض غير موجود. يرجى ملء باقي البيانات.</p>');
                    $("#patient-summary").show();  // Ensure the summary div is shown
                }
            });
        } else {
            alert("يرجى إدخال رقم الهوية أولاً.");
        }
    }
    
    // Format time to hh:mm AM/PM
    function formatTime(timeString) {
        const [hours, minutes, seconds] = timeString.split(":").map(Number);
        const ampm = hours >= 12 ? "PM" : "AM";
        const formattedHours = hours % 12 || 12; // Convert 0 or 24 to 12
        return `${formattedHours}:${minutes.toString().padStart(2, "0")} ${ampm}`;
    }

    $(document).on("change", ".date-picker", function () {
        const group = $(this).closest('.appointment-group');
        let clinic_id = $("#clinic").val();
        let date = $(this).val();
        let selectedDate = new Date(date);
        let dayOfWeek = selectedDate.getDay();
    
        if (dayOfWeek === 5) {
            $("#friday-error").show();
            group.find('.appointment-picker-container').hide();
        } else {
            $("#friday-error").hide();
            group.find('.appointment-picker-container').show();
        }
    
        if (clinic_id && date && dayOfWeek !== 5) {
            $.get("{{ url('appointments/getAvailableAppointments') }}", { clinic_id, date }, function (data) {
                let appointmentOptions = '';
                data.forEach(appointment => {
                    const startTime = formatTime(appointment.start_time);
                    const endTime = formatTime(appointment.end_time);
                    appointmentOptions += `
                        <div class="appointment-card" data-id="${appointment.id}">
                            <span class="time-text">${startTime} - ${endTime}</span>
                        </div>
                    `;
                });
                group.find('#appointment-options').html(appointmentOptions);
    
                // Add click functionality to select an appointment and store its ID
                group.find('.appointment-card').on('click', function () {
                    $(this).toggleClass('selected');
                    updateSummary(3);  // Call updateSummary whenever an appointment is selected
                    updateHiddenAppointments();  // Update the hidden input field with selected appointment IDs
                });
            });
        } else if (dayOfWeek === 5) {
            group.find('#appointment-options').html('<div class="appointment-card">يرجى اختيار يوم آخر</div>');
        } else {
            group.find('#appointment-options').html('<div class="appointment-card">اختر مواعيد</div>');
        }
    });

    // Update the hidden input field with selected appointment IDs
    function updateHiddenAppointments() {
        let selectedAppointmentIds = [];
        $(".appointment-card.selected").each(function () {
            const appointmentId = $(this).data("id");
            selectedAppointmentIds.push(appointmentId);
        });
    
        // Update the hidden input field with the selected appointment IDs
        $("#hidden-appointments").val(selectedAppointmentIds.join(","));
    }
</script>
<style>
    .btn-success {
        color : green;
    }
</style>
</div>
@endsection

