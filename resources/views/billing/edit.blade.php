@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>تعديل بيانات الدفع</h1>
        </header>

        <div class="tabs-container">
            <div class="tabs">
                <input type="radio" id="radio-2" name="tabs" onclick="window.location.href='/billing/create';" />
                <label class="tab" for="radio-2">إضافة فاتورة جديدة</label>
                <input type="radio" id="radio-1" name="tabs" checked onclick="window.location.href='/billing';" />
                <label class="tab" for="radio-1">إجمالي الفواتير</label>
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

<form action="{{ route('billing.update', $bill->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="total_amount">الإجمالي الكلي</label>
        <input type="number" name="total_amount" class="form-control" value="{{ $bill->total_amount }}" required readonly>
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
        @foreach($bill->payments as $index => $payment)
            <tr>
                <!-- Hidden inputs for old payment methods -->
                <input type="hidden" name="payments[{{ $index }}][method]" value="{{ $payment['method'] }}">
                <input type="hidden" name="payments[{{ $index }}][amount]" value="{{ $payment['amount'] }}">

                <td>
                    <select name="payments[{{ $index }}][method]" class="form-control" required disabled>
                        <option value="cash" {{ $payment['method'] == 'cash' ? 'selected' : '' }}>كاش</option>
                        <option value="bank_card" {{ $payment['method'] == 'bank_card' ? 'selected' : '' }}>بطاقة ائتمانية</option>
                        <option value="mada" {{ $payment['method'] == 'mada' ? 'selected' : '' }}>مدى</option>
                        <option value="transfer" {{ $payment['method'] == 'transfer' ? 'selected' : '' }}>تحويل</option>
                        <option value="insurance" {{ $payment['method'] == 'insurance' ? 'selected' : '' }}>تأمين</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="payments[{{ $index }}][amount]" class="form-control payment-amount" value="{{ $payment['amount'] }}" step="0.01" min="0" required readonly>
                </td>
                <td>
                    <!-- Remove the delete button for old rows -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<button type="button" class="btn btn-primary" onclick="addPaymentRow()">إضافة وسيلة دفع</button>

        <div class="mt-3">
            <label>إجمالي المدفوع:</label>
            <input type="text" name="paid_amount" id="total-paid" class="form-control" value="{{ $bill->paid_amount }}" readonly>
            <div id="payment-warning" class="text-danger"></div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">تحديث الفاتورة</button>
</form>

<script>
function addPaymentRow() {
    const rowCount = document.querySelectorAll('#payments tr').length;
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>
            <select name="payments[${rowCount}][method]" class="form-control" required>
                <option value="cash">كاش</option>
                <option value="bank_card">بطاقة ائتمانية</option>
                <option value="mada">مدى</option>
                <option value="transfer">تحويل</option>
                <option value="insurance">تأمين</option>
            </select>
        </td>
        <td>
            <input type="number" name="payments[${rowCount}][amount]" class="form-control payment-amount" onchange="updateTotalPaid()" step="0.01" min="0" required>
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
            totalPaid += parseFloat(input.value) || 0;
        });

        document.getElementById('total-paid').value = totalPaid.toFixed(2);

        const totalAmount = parseFloat(document.querySelector('input[name="total_amount"]').value) || 0;
        const warningElement = document.getElementById('payment-warning');
        if (totalPaid > totalAmount) {
            warningElement.textContent = 'إجمالي المدفوع أكبر من الإجمالي الكلي!';
        } else {
            warningElement.textContent = '';
        }
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
</div>
@endsection
