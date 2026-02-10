<!-- patients/partials/table.blade.php -->

@if($patients->isEmpty())
    <p class="no-items">لا يوجد مرضى لعرضهم</p>
@else
    <table class="items-table">
        <thead>
            <tr>
                <th>رقم المريض</th>
                <th>الاسم</th>
                <th>رقم الهوية</th>
                <th>العمر</th>
                <th>الهاتف</th>
                <th>الجنسية</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = $patients->firstItem(); @endphp
            @foreach($patients as $patient)
                <tr class="fade-in">
                    <td>{{ $counter++ }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->id_number }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->nationality }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('patients.show', $patient) }}" class="action-icon me-2">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            @can('حذف مريض')
                                <form id="deleteForm" action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="action-icon"
                                    style="margin-right:20px;"
                                    onclick="confirmDelete()">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        const confirmMsg = 'هل أنت متأكد؟';
                                        const secondaryMsg = 'هذا المريض لا يمكن مسحه لانه لديه اجاءات طبية';
                                        if (confirm(confirmMsg)) {
                                            const hasMedicalProcedures = true; 
                                            if (hasMedicalProcedures) {
                                                alert(secondaryMsg);
                                                return false;
                                            } else {
                                                document.getElementById('deleteForm').submit();
                                            }
                                        }
                                    }
                                </script>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!-- Pagination Controls -->
<div class="pagination-controls">
    <label for="perPage">عرض:</label>
    <select id="perPage" name="perPage">
        <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
        <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        <option value="{{ $patients->total() }}" {{ request('perPage') == $patients->total() ? 'selected' : '' }}>الكل</option>
    </select>
</div>

<!-- Pagination Links -->
<div class="pagination-container">
    {{ $patients->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
</div>
