<table class="items-table">
    <thead>
        <tr>
            <th>#</th>
            <th>إسم</th>
            <th>الوظيفة</th>
            <th>تاريخ الإنضمام</th>
            <th>الحالة</th>
            <th>الإجراء</th>
            <th>الصلاحيات</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = $users->firstItem();
        @endphp
        @foreach ($users as $user)
            <tr class="fade-in">
                <td>{{ $counter++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->job_title }}</td>
                <td>{{ $user->start_date }}</td>
                <td>
                    <span class="badgee {{  $user->hasRole('مفصول') ? 'bg-danger' : 'bg-success' }}">
                        {{ $user->roles->pluck('name')->first() }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="action-icon">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td>
                    @role('ادمن')
                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="role-update-form">
                        @csrf
                        @method('PATCH')
                        <div class="input-group">
                            <select name="role" class="form-select" onchange="this.form.submit()">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    @endrole
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Controls -->
<div class="pagination-controls">
    <label for="perPage">عرض:</label>
    <select id="perPage" name="perPage" onchange="updatePerPage()">
        <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
        <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        <option value="{{ $users->total() }}" {{ request('perPage') == $users->total() ? 'selected' : '' }}>الكل</option>
    </select>
</div>

<!-- Results Message -->
<div class="results-message">
    <p>
        عرض 
        {{ $users->firstItem() }} 
        إلى 
        {{ $users->lastItem() }} 
        من أصل 
        {{ $users->total() }} 
        موظف
    </p>
</div>

<!-- Pagination Links -->
<div class="pagination-container">
    {{ $users->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
</div>
