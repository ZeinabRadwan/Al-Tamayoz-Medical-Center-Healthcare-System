@extends('layouts.app')

@section('content')
<div class="container">

    <div class="top-controls">
        <header class="page-title">
            <h1>قائمة الموظفين</h1>
        </header>

        <div class="search-bar">
            <div class="relative">
                <input type="search" id="default-search" name="search"
                    class="search-input block w-full p-3 text-sm border rounded-lg"
                    placeholder="ابحث عن المستخدم" value="{{ request('search') }}" />
            </div>
        </div>

        <!-- Tabs Navigation (Static Content) -->
        <div class="tabs-container">
            <div class="tabs">
                @can('تعديل موطف')
                <input type="radio" id="radio-1" name="tabs" onclick="window.location.href='/users/create';" />
                <label class="tab" for="radio-1">إضافة موظف جديد</label>
                @endcan
                <input type="radio" id="radio-2" name="tabs" checked onclick="window.location.href='/users';" />
                <label class="tab" for="radio-2"><span class="notification">{{ $userCount }}</span>إجمالي الموظفين</label>
                <span class="glider"></span>
            </div>
        </div>
    </div>

    <!-- Success and Error Alerts -->
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Users Table (This section will be dynamically updated) -->
    <div id="users-table-container">
        @include('users.partials.table', compact('users', 'roles', 'userCount'))
    </div>

</div>
@endsection

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('default-search');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value;
            fetchUsers(searchTerm);
        });

        function fetchUsers(searchTerm) {
            // Get the current 'perPage' value to preserve the pagination
            const perPage = document.getElementById('perPage') ? document.getElementById('perPage').value : 5;
            
            const url = new URL(window.location.href);
            url.searchParams.set('search', searchTerm); // Update the search query in URL
            url.searchParams.set('perPage', perPage); // Preserve the perPage value
            
            // Make the fetch call
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    // Update the table and pagination section with the new data
                    const container = document.getElementById('users-table-container');
                    container.innerHTML = data;

                    // Hide the second top-controls div inside the updated content
                    const secondTopControls = container.querySelector('.top-controls');
                    if (secondTopControls) {
                        secondTopControls.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });

    setTimeout(function () {
        let successAlert = document.getElementById('success-alert');
        let errorAlert = document.getElementById('error-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 2000);
    
        function updatePerPage() {
    const perPage = document.getElementById('perPage').value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('perPage', perPage);
    window.location.search = urlParams.toString();
}
</script>
