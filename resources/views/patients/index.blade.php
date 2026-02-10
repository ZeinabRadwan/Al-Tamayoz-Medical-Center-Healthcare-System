@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Top Controls (Search, Tabs, etc.) -->
    <div class="top-controls">
        <header class="page-title">
            <h1>قائمة المرضى</h1>
        </header>

        <div class="search-bar">
            <div class="relative flex gap-3">
                <input type="search" id="default-search" name="search"
                    class="search-input block w-full p-3 text-sm border rounded-lg" placeholder="ابحث عن مريض..."
                    value="{{ request('search') }}" />
                <button onclick="exportPatients()" 
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-lg text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    تصدير Excel
                </button>
            </div>
        </div>

        <div class="tabs-container">
            <div class="tabs">
                @can('إضافة مريض')
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/patients/create';" />
                <label class="tab" for="radio-1">إضافة مريض جديد</label>
                @endcan
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/patients';" />
                <label class="tab" for="radio-2"><span class="notification">{{ $patientCount }}</span>إجمالي المرضى</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>
    @endif

    <div id="patients-table-container">
        @include('patients.partials.table', compact('patients', 'patientCount'))
    </div>

</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('default-search');
    const perPage = document.getElementById('perPage');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value;
        fetchPatients(searchTerm, perPage.value);
    });

    perPage.addEventListener('change', function () {
        const perPageValue = perPage.value;
        fetchPatients(searchInput.value, perPageValue);
    });

    function fetchPatients(searchTerm, perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('search', searchTerm); // Set the search term in the URL
        url.searchParams.set('perPage', perPage);   // Set the perPage value in the URL

        fetch(url)
            .then(response => response.text())
            .then(data => {
                const container = document.getElementById('patients-table-container');
                container.innerHTML = data;

                // Hide the second 'top-controls' div inside the updated content
                const secondTopControls = container.querySelector('.top-controls');
                if (secondTopControls) {
                    secondTopControls.style.display = 'none';
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }
});

setTimeout(function() {
    const successAlert = document.getElementById('success-alert');
    const errorAlert = document.getElementById('error-alert');
    if (successAlert) successAlert.style.display = 'none';
    if (errorAlert) errorAlert.style.display = 'none';
}, 2000);

    function updatePerPage() {
    const perPage = document.getElementById('perPage').value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('perPage', perPage);
    window.location.search = urlParams.toString();
}

function exportPatients() {
    const searchTerm = document.getElementById('default-search').value;
    const url = new URL('{{ route("patients.export") }}', window.location.origin);
    
    if (searchTerm) {
        url.searchParams.set('search', searchTerm);
    }
    
    window.location.href = url.toString();
}
</script>
