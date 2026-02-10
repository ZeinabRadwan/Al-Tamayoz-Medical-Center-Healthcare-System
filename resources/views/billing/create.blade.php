@extends('layouts.app')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>إضافة فاتورة جديدة</h1>
        </header>
        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-2" name="tabs" onclick="window.location.href='/billing/create';" />
                <label class="tab" for="radio-2">إضافة فاتورة جديدة</label>
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/billing';" />
                <label class="tab" for="radio-1">إجمالي
                    الفواتير</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success slide-in">
        {{ session('success') }}
    </div>

    @endif
    @if(session('error'))
    <div class="alert alert-danger slide-in">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('billing.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_name">المريض</label>
            <input type="text" id="patient_name" class="form-control" placeholder="ابدأ بكتابة اسم المريض أو رقم الهاتف أو رقم الهوية" oninput="filterPatients()">
            <ul id="patient_suggestions" class="suggestions-list"></ul>
        </div>

        <input type="hidden" id="patient_id" name="patient_id">
        <input type="hidden" id="patient_name_field" name="patient_name">

<div class="form-group row">
    <div class="col-md-6">
        <label for="doctor_id">الطبيب</label>
        <select name="doctor_id" id="doctor_id" class="form-control">
            <option value="">اختر الطبيب</option>
            @foreach ($doctors as $doctor)
                @if($doctor->hasRole('أخصائي') || $doctor->hasRole('طبيب'))
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="doctor_id2">الطبيب 2</label>
        <select name="doctor_id2" id="doctor_id2" class="form-control">
            <option value="" disabled {{ old('doctor_id2') == '' ? 'selected' : '' }}>اختر الطبيب الثاني</option>
            @foreach($doctors as $doctor)
                @if($doctor->hasRole('أخصائي') || $doctor->hasRole('طبيب'))
                    <option value="{{ $doctor->id }}" {{ old('doctor_id2') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label for="doctor_id3">الطبيب 3</label>
        <select name="doctor_id3" id="doctor_id3" class="form-control">
            <option value="" disabled {{ old('doctor_id3') == '' ? 'selected' : '' }}>اختر الطبيب الثالث</option>
            @foreach($doctors as $doctor)
                @if($doctor->hasRole('أخصائي') || $doctor->hasRole('طبيب'))
                    <option value="{{ $doctor->id }}" {{ old('doctor_id3') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="doctor_id4">الطبيب 4</label>
        <select name="doctor_id4" id="doctor_id4" class="form-control">
            <option value="" disabled {{ old('doctor_id4') == '' ? 'selected' : '' }}>اختر الطبيب الرابع</option>
            @foreach($doctors as $doctor)
                @if($doctor->hasRole('أخصائي') || $doctor->hasRole('طبيب'))
                    <option value="{{ $doctor->id }}" {{ old('doctor_id4') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>



        <h3>تفاصيل العيادات والخدمات</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="display: none;">النوع</th>
            <th style="width: 25%;">الخدمة</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>الخصم (نسبة %)</th>
            <th>الخصم (مبلغ)</th>
            <th>الضريبة</th>
            <th>الإجمالي</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody id="services">
        <tr>
            <td style="display: none;">
                <select name="clinic_services[0][type]" class="form-control" onchange="updateType(0)">
                    <option value="">اختر النوع</option>
                    <option value="service" selected>خدمة</option>
                </select>
            </td>
            <td>
<select name="clinic_services[0][service_id]" class="form-control service-select" onchange="updatePrice(0)">
    <option value="">اختر خدمة</option>
    @foreach ($services as $service)
    <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
    @endforeach
</select>

            </td>
<td>
    <input type="number" name="clinic_services[0][price]" class="form-control" value="0" min="0" step="0.01">
</td>

            <td>
                <input type="number" name="clinic_services[0][quantity]" class="form-control" onchange="updateTotal(0)">
            </td>
<td>
    <input type="number" name="clinic_services[0][discount]" class="form-control" onchange="updateTotal(0)" step="0.01">
</td>
<td>
    <input type="number" name="clinic_services[0][discount_amount]" class="form-control" onchange="updateTotal(0)" min="0" step="0.01">
</td>

            <td>
                <input type="number" name="clinic_services[0][tax]" class="form-control" onchange="updateTotal(0)">
            </td>
            <td>
                <input type="number" name="clinic_services[0][total]" class="form-control" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="deleteRow(0)">حذف</button>
            </td>
        </tr>
    </tbody>
</table>

        <button type="button" class="btn btn-primary" onclick="addRow()">إضافة صف</button>

        <div class="form-group">
            <label for="total_amount">الإجمالي الكلي</label>
            <input type="number" name="total_amount" class="form-control" required readonly>
        </div>

        <div class="form-group">
            <h3>طرق الدفع</h3>
            <table class="table table-bordered" id="payments-table">
                <thead>
                    <tr>
                        <th>وسيلة الدفع</th>
                        <th>المبلغ</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody id="payments">
                    <tr>
                        <td>
                            <select name="payments[0][method]" class="form-control" required>
                                <option value="">اختر وسيلة الدفع</option>
                                <option value="cash">كاش</option>
                                <option value="bank_card">بطاقة ائتمانية</option>
                                <option value="mada">مدى</option>
                                <option value="transfer">تحويل</option>
                                <option value="insurance">تأمين</option>
                            </select>
                        </td>
<td>
                <input type="number" name="payments[0][amount]" class="form-control payment-amount"
                       onchange="updateTotalPaid()" step="0.01" min="0" required>
            </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deletePaymentRow(this)">حذف</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="addPaymentRow()">إضافة وسيلة دفع</button>

            <div class="mt-3">
                <label>إجمالي المدفوع:</label>
                <input type="text" name="paid_amount" id="total-paid" class="form-control" readonly>
                <div id="payment-warning" class="text-danger"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">حفظ الفاتورة</button>
    </form>
    <script>
function addPaymentRow() {
    const rowCount = document.querySelectorAll('#payments tr').length;
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>
            <select name="payments[${rowCount}][method]" class="form-control" required>
                <option value="">اختر وسيلة الدفع</option>
                <option value="cash">كاش</option>
                <option value="bank_card">بطاقة ائتمانية</option>
                <option value="mada">مدى</option>
                <option value="transfer">تحويل</option>
                <option value="insurance">تأمين</option>
            </select>
        </td>
        <td>
            <input type="number" name="payments[${rowCount}][amount]" class="form-control payment-amount" 
                   onchange="updateTotalPaid()" step="0.01" min="0" required>
        </td>
        <td>
            <button type="button" class="btn btn-danger" onclick="deletePaymentRow(this)">حذف</button>
        </td>
    `;
    document.querySelector('#payments').appendChild(newRow);
}

        function deletePaymentRow(button) {
            button.closest('tr').remove();
            updateTotalPaid();
        }

function updateTotalPaid() {
    const paymentInputs = document.querySelectorAll('.payment-amount');
    let totalPaid = 0;

    paymentInputs.forEach(input => {
        totalPaid += parseFloat(input.value) || 0; // Use parseFloat to handle decimals
    });

    document.getElementById('total-paid').value = totalPaid.toFixed(2); // Display with 2 decimal places

    const totalAmount = parseFloat(document.querySelector('input[name="total_amount"]').value) || 0;
    const warningElement = document.getElementById('payment-warning');
}


        document.querySelector('form').addEventListener('submit', function(e) {
            const totalPaid = parseFloat(document.getElementById('total-paid').value) || 0;

            const paidAmountInput = document.createElement('input');
            paidAmountInput.type = 'hidden';
            paidAmountInput.name = 'paid_amount';
            paidAmountInput.value = totalPaid;
            this.appendChild(paidAmountInput);
        });
    </script>

<script>
    function updateType(rowIndex) {
        const type = document.querySelector(`select[name="clinic_services[${rowIndex}][type]"]`).value;
        const serviceSelect = document.querySelector(`select[name="clinic_services[${rowIndex}][service_id]"]`);
        const clinicSelect = document.querySelector(`select[name="clinic_services[${rowIndex}][clinic_id]"]`);

        if (type === 'service') {
            serviceSelect.style.display = 'inline-block';
            clinicSelect.style.display = 'none';
        } else {
            clinicSelect.style.display = 'inline-block';
            serviceSelect.style.display = 'none';
        }
        updatePrice(rowIndex);
    }

    function updatePrice(rowIndex) {
        const type = document.querySelector(`select[name="clinic_services[${rowIndex}][type]"]`).value;
        let price = 0;

        if (type === 'service') {
            const serviceSelect = document.querySelector(`select[name="clinic_services[${rowIndex}][service_id]"]`);
            const selectedService = serviceSelect.options[serviceSelect.selectedIndex];
            price = selectedService ? parseFloat(selectedService.dataset.price) : 0;
        } else if (type === 'clinic') {
            const clinicSelect = document.querySelector(`select[name="clinic_services[${rowIndex}][clinic_id]"]`);
            const selectedClinic = clinicSelect.options[clinicSelect.selectedIndex];
            price = selectedClinic ? parseFloat(selectedClinic.dataset.price) : 0;
        }

        document.querySelector(`input[name="clinic_services[${rowIndex}][price]"]`).value = price;
        updateTotal(rowIndex);
    }

    function updateTotal(rowIndex) {
        const price = parseFloat(document.querySelector(`input[name="clinic_services[${rowIndex}][price]"]`).value) || 0;
        const quantity = parseInt(document.querySelector(`input[name="clinic_services[${rowIndex}][quantity]"]`).value) || 1;
        const discount = parseFloat(document.querySelector(`input[name="clinic_services[${rowIndex}][discount]"]`).value) || 0;
        const discountAmount = parseFloat(document.querySelector(`input[name="clinic_services[${rowIndex}][discount_amount]"]`).value) || 0;
        const tax = parseFloat(document.querySelector(`input[name="clinic_services[${rowIndex}][tax]"]`).value) || 0;

        let total = 0;
        const total_before_discount = price * quantity;

        if (discount > 0) {
            const discount_amount = total_before_discount * (discount / 100);
            const total_after_discount = total_before_discount - discount_amount;
            const taxAmount = total_after_discount * (tax / 100);
            total = total_after_discount + taxAmount;

        } else if (discountAmount > 0) {

            const total_after_discount = total_before_discount - discountAmount;
            const taxAmount = total_after_discount * (tax / 100);
            total = total_after_discount + taxAmount;
        } else {
            const taxAmount = total_before_discount * (tax / 100);
            total = total_before_discount + taxAmount;
        }

        document.querySelector(`input[name="clinic_services[${rowIndex}][total]"]`).value = total.toFixed(2);
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        const rows = document.querySelectorAll('#services tr');
        rows.forEach(row => {
            const total = parseFloat(row.querySelector('input[name$="[total]"]').value) || 0;
            grandTotal += total;
        });
        document.querySelector('input[name="total_amount"]').value = grandTotal;
    }

    function deleteRow(rowIndex) {
        const row = document.querySelector(`#services tr:nth-child(${rowIndex + 1})`);
        row.remove();
        calculateGrandTotal();
    }

    const patients = @json($patients);

// Global variable to store the tax value
let taxValue = 0;

function filterPatients() {
    const input = document.getElementById('patient_name').value.toLowerCase();
    const suggestionsList = document.getElementById('patient_suggestions');
    suggestionsList.innerHTML = '';

    if (input) {
        const filteredPatients = patients.filter(patient =>
            patient.name.toLowerCase().includes(input) ||
            patient.phone.toLowerCase().includes(input) ||
            patient.id_number.toLowerCase().includes(input)
        );

        filteredPatients.forEach(patient => {
            const listItem = document.createElement('li');

            listItem.textContent = `${patient.name} (${patient.phone}, ${patient.id_number})`;

            listItem.onclick = () => {
                selectPatient(patient.id, patient.name);

                // Set the tax value globally
                taxValue = patient.nationality !== 'السعودية' ? 15 : 0;

                // Set the tax value in all rows' tax inputs
                const taxInputs = document.querySelectorAll('input[name$="[tax]"]');
                taxInputs.forEach(input => {
                    input.value = taxValue;
                    const rowIndex = input.name.match(/\[(\d+)\]/)[1];
                    updateTotal(rowIndex);
                });
            };

            suggestionsList.appendChild(listItem);
        });
    }
}

function addRow() {
    const rowCount = document.querySelectorAll('#services tr').length;
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="display: none;">
            <select name="clinic_services[${rowCount}][type]" class="form-control" onchange="updateType(${rowCount})">
                <option value="service">خدمة</option>
            </select>
        </td>
        <td>
            <select name="clinic_services[${rowCount}][service_id]" class="form-control service-select" onchange="updatePrice(${rowCount})">
                <option value="">اختر خدمة</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" name="clinic_services[${rowCount}][price]" class="form-control" value="0" min="0" step="0.01" onchange="updateTotal(${rowCount})">
        </td>
        <td>
            <input type="number" name="clinic_services[${rowCount}][quantity]" class="form-control" onchange="updateTotal(${rowCount})">
        </td>
        <td>
            <input type="number" name="clinic_services[${rowCount}][discount]" class="form-control" onchange="updateTotal(${rowCount})">
        </td>
        <td>
            <input type="number" name="clinic_services[${rowCount}][discount_amount]" class="form-control" onchange="updateTotal(${rowCount})" min="0">
        </td>
        <td>
            <input readonly type="number" name="clinic_services[${rowCount}][tax]" class="form-control" value="${taxValue}" onchange="updateTotal(${rowCount})">
        </td>
        <td>
            <input type="number" name="clinic_services[${rowCount}][total]" class="form-control" readonly>
        </td>
        <td>
            <button type="button" class="btn btn-danger" onclick="deleteRow(${rowCount})">حذف</button>
        </td>
    `;

    // Append the new row to the table
    document.querySelector('#services').appendChild(newRow);

    // Re-initialize Select2 for the newly added dropdown
    const newSelect = newRow.querySelector('.service-select');
    $(newSelect).select2({
        placeholder: "اختر خدمة",
        allowClear: true,
        width: '100%'  // Optional: set the dropdown width
    });
}

    function selectPatient(id, name) {
        console.log('Selected Patient:', id, name);
        document.getElementById('patient_name').value = name;
        document.getElementById('patient_id').value = id;
        document.getElementById('patient_name_field').value = name;
        document.getElementById('patient_suggestions').innerHTML = '';
    }
    
    $(document).ready(function () {
        $('.service-select').select2({
            placeholder: "اختر خدمة", // Optional: Placeholder text
            allowClear: true,        // Optional: Allow clearing the selection
            width: '100%'            // Optional: Set the dropdown width
        });
    });

</script>
</div>

<style>
    .suggestions-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        background-color: white;
    }

    .suggestions-list li {
        padding: 8px;
        cursor: pointer;
    }

    .suggestions-list li:hover {
        background-color: #f0f0f0;
    }
</style>
@endsection
