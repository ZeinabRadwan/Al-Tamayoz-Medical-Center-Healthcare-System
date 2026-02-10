@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="top-controls">
            <header class="page-title">
                <h1>عرض الفواتير</h1>
            </header>

            <div class="search-bar">
                <form method="GET" action="{{ route('billing.index') }}" class="max-w-md mx-auto">
                    <label for="default-search" class="sr-only">ابحث عن الفاتورة أو المريض</label>

                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"></div>
                        <input type="search" id="default-search" name="search"
                            class="search-input block w-full p-3 text-sm border rounded-lg"
                            placeholder="ابحث عن الفاتورة أو المريض" value="{{ request('search') }}" />
                        <button type="submit"
                            class="search-btn absolute end-2.5 bottom-2.5 text-white bg-green-700 rounded-lg text-sm px-5 py-2.5">
                            بحث
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <div class="tabs-container"
                        style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px; direction: rtl">
                        <div class="tabs" style="text-align: center;">
                            <label for="from_date" style="margin-right: 10px ;font-size: 16px; font-weight: bold;">
                                من تاريخ
                            </label>
                            <input type="date" name="from_date" value="{{ request('from_date') }}" class="date-input"
                                style="padding: 10px; font-size: 14px; border-radius: 5px; border: 1px solid #ccc; margin-right: 20px;" />
                            <label for="to_date" style="font-size: 16px; font-weight: bold; margin-right: 10px;">
                                الي تاريخ
                            </label>
                            <input type="date" name="to_date" value="{{ request('to_date') }}" class="date-input"
                                style="padding: 10px; font-size: 14px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px; margin-right: 20px;" />
                            <button type="submit" class="search-btn text-white bg-blue-700 rounded-lg text-sm px-5 py-2.5"
                                style="margin-right: 20px;">
                                تصفية
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tabs-container">
                <div class="tabs">
                    <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/billing/create';" />
                    <label class="tab" for="radio-1">إضافة فاتورة جديدة</label>
                    <input type="radio" id="radio-2" name="tabs" checked
                        onclick="window.location.href='/billing';" />
                    <label class="tab" for="radio-2"><span class="notification">{{ $totalBills }}</span>إجمالي
                        الفواتير</label>
                    <span class="glider"></span>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success slide-in">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger slide-in">
                {{ session('error') }}
            </div>
        @endif

        @if ($bills->isEmpty())
            <p class="no-items">لا يوجد فواتير لعرضها</p>
        @else
            <table class="items-table">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>المريض</th>
                        <th>الطبيب</th>
                        <th>المبلغ الكلي</th>
                        <th>تاريخ الفاتورة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = ($bills->currentPage() - 1) * $bills->perPage() + 1;
                    @endphp
                    @foreach ($bills as $bill)
                        <tr class="fade-in">
                            <td>{{ $counter }}</td>
                            <td>{{ $bill->patient->name }}</td>
                            <td>{{ $bill?->doctor?->name }}</td>
                            <td>{{ number_format($bill->total_amount, 2) }} ر.س</td>
                            <td>{{ \Carbon\Carbon::parse($bill->created_at)->format('d/m/Y') }}</td>
                            <td class="actions">
                                <a href="{{ route('billing.view', ['id' => $bill->id]) }}" class="action-icon"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                @if (!$bill->is_returned && !$bill->returned_id)
                                    <form action="{{ route('billing.return', $bill->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="action-icon" title="استرجاع الفاتورة"
                                            onclick="return confirm('هل أنت متأكد من استرجاع الفاتورة؟')">
                                            <i class="fa-solid fa-rotate-left" style="color: red;"></i>
                                        </button>
                                    </form>
                                @else
                                    @php
                                        $label = $bill->is_returned ? 'مسترجعة' : 'مسترجع';
                                    @endphp
                                    <span class="badge bg-success" style="font-size: 12px;">{{ $label }}</span>

                                @endif
                            </td>
                        </tr>
                        @php $counter++; @endphp
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="pagination-controls">
            <label for="perPage" class="pagination-label">عرض:</label>
            <select id="perPage" name="perPage" class="pagination-select" onchange="updatePerPage()">
                <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ $bills->total() }}" {{ request('perPage') == $bills->total() ? 'selected' : '' }}>الكل
                </option>
            </select>
        </div>

        <div class="pagination-container">
            {{ $bills->appends(['perPage' => request('perPage'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
            <div class="results-message">
                عرض {{ $bills->firstItem() }} إلى {{ $bills->lastItem() }} من {{ $bills->total() }} نتيجة
            </div>
        </div>

        <script>
            function updatePerPage() {
                const perPage = document.getElementById('perPage').value;
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('perPage', perPage); // Update the perPage parameter.
                window.location.search = urlParams.toString(); // Reload with new params.
            }
        </script>
     {{-- need to review cuz there are returned billings --}}
        <h4>إجمالي المبيعات النهائي</h4>
        <div class="list-stats">
            <ul>
                @php
                    $totalCash = 0;
                    $totalCreditCard = 0;
                    $totalMada = 0;
                    $totalTransfer = 0;
                    $totalInsurance = 0;
                @endphp

                @foreach ($bills as $bill)
                    @foreach ($bill->payments as $payment)
                        @switch($payment['method'])
                            @case('cash')
                                @php $totalCash += $payment['amount']; @endphp
                            @break

                            @case('bank_card')
                                @php $totalCreditCard += $payment['amount']; @endphp
                            @break

                            @case('mada')
                                @php $totalMada += $payment['amount']; @endphp
                            @break

                            @case('transfer')
                                @php $totalTransfer += $payment['amount']; @endphp
                            @break

                            @case('insurance')
                                @php $totalInsurance += $payment['amount']; @endphp
                            @break
                        @endswitch
                    @endforeach
                @endforeach

                <li>
                    <span class="color-box" style="background-color: #f09d8d;"></span>
                    المدفوعة كاش:
                    <strong>{{ number_format($totalCash, 2) }} ر.س</strong>
                </li>
                <li>
                    <span class="color-box" style="background-color: #a1ddff;"></span>
                    المدفوعة ببطاقة ائتمانية:
                    <strong>{{ number_format($totalCreditCard, 2) }} ر.س</strong>
                </li>
                <li>
                    <span class="color-box" style="background-color: #ffe27b;"></span>
                    المدفوعة عن طريق مدى:
                    <strong>{{ number_format($totalMada, 2) }} ر.س</strong>
                </li>
                <li>
                    <span class="color-box" style="background-color: #c1ffab;"></span>
                    المدفوعة عن طريق التحويل:
                    <strong>{{ number_format($totalTransfer, 2) }} ر.س</strong>
                </li>
                <li>
                    <span class="color-box" style="background-color: #f09d8d;"></span>
                    المدفوعة عن طريق التأمين:
                    <strong>{{ number_format($totalInsurance, 2) }} ر.س</strong>
                </li>
            </ul>
        </div>
    </div>
@endsection
