{{-- resources/views/reports/reports-table.blade.php --}}
<div class="table-responsive">
    
    <table class="table">
        <thead>
            <tr>
                <th>رقم التقرير</th>
                <th>اسم التقرير</th>
                <th>التاريخ</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $index => $report)
            <tr>
                <td>{{ $index + 1 }}</td> 
                <td>
                    @if(is_array($report))
                    {{ $report['template_name'] }}
                    @else
                    {{ $report->template_name ?? 'تقرير إضافي' }}
                    @endif
                </td>
                <td>
                    @if(is_array($report))
                    {{ \Carbon\Carbon::parse($report['created_at'])->format('Y/m/d') }}
                    @else
                    {{ \Carbon\Carbon::parse($report->created_at)->format('Y/m/d') }}
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route(strtolower(is_array($report) ? $report['slug'] : 'reports') . '.show', ['patient_id' => is_array($report) ? $report['report_id'] : $report->id]) }}"
                            class="btn btn-sm btn-view">
                            <i class="fas fa-eye"></i> عرض
                        </a>
                        <a href="{{ route(strtolower(is_array($report) ? $report['slug'] : 'reports') . '.edit', ['id' => is_array($report) ? $report['report_id'] : $report->id]) }}"
                            class="btn btn-sm btn-edit">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <form action="{{ route(strtolower(is_array($report) ? $report['slug'] : 'reports') . '.destroy', ['id' => is_array($report) ? $report['report_id'] : $report->id]) }}"
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
            @empty
            <tr>
                <td colspan="4" class="text-center">لا توجد تقارير</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
