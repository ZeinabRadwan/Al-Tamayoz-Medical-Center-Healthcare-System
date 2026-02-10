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
                    <a href="{{ route('billing.view', ['id' => $bill->id]) }}" class="action-icon" target="_blank" rel="noopener noreferrer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
            @php $counter++; @endphp
        @endforeach
    </tbody>
</table>

    <!-- Pagination Controls -->
    <div class="pagination-controls">
        <label for="perPage" class="pagination-label">عرض:</label>
        <select id="perPage" name="perPage" class="pagination-select" onchange="updatePerPage()">
            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            <option value="{{ $bills->total() }}" {{ request('perPage') == $bills->total() ? 'selected' : '' }}>الكل</option>
        </select>
    </div>

    <!-- Pagination Links -->
    <div class="pagination-container">
        {{ $bills->appends(['perPage' => request('perPage'), 'search' => request('search')])->links('pagination::bootstrap-4') }}
    </div>

    <div class="results-message">
        عرض {{ $bills->firstItem() }} إلى {{ $bills->lastItem() }} من {{ $bills->total() }} نتيجة
    </div>
