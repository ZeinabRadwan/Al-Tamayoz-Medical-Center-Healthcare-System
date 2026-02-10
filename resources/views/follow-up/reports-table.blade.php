<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>عنوان التقرير</th>
            <th>تاريخ التقرير</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->report_title }}</td>
                <td>{{ $report->current_day }}</td>
                <td>
            

                  <div class="action-buttons">
                       <a href="{{ route('follow-up.show', ['patient' => $patient->id, 'report' => $report->id]) }}"                             class="btn btn-sm btn-view">
                            <i class="fas fa-eye"></i> عرض
                        </a>
                        <a href="{{ route('follow-up.edit', ['patient' => $patient->id, 'report' => $report->id]) }}" class="btn btn-sm btn-edit">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <form action="{{ route('follow-up.destroy', ['patient' => $patient->id, 'report' => $report->id]) }}" metho
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('هل أنت متأكد من حذف هذا التقرير؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-delete">
                                <i class="fas fa-trash"></i> حذف
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
