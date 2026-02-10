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
