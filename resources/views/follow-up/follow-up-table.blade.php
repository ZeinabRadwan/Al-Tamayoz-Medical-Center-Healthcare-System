<table class="table">
    <thead>
        <tr>
            <th>العنوان</th>
            <th>اليوم</th>
            <th>التاريخ</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($followUpReports as $report)
            <tr>
                <td>{{ $report->report_title }}</td>
                <td>{{ $report->current_day }}</td>
                <td>{{ $report->current_date }}</td>
                <td>{{ $report->session_proceedings }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
