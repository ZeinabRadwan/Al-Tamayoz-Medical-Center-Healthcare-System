<form action="{{ route('follow-up.store', $patient->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="report_title" class="form-label">عنوان التقرير</label>
        <input type="text" class="form-control" id="report_title" name="report_title" required>
    </div>

<div class="mb-3">
    <label for="current_day" class="form-label">اليوم والوقت</label>
    <input type="datetime-local" class="form-control" id="current_day" name="current_day" required>
</div>


    <div class="mb-3">
        <label for="current_date" class="form-label">التاريخ</label>
        <input type="date" class="form-control" id="current_date" name="current_date" required>
    </div>

    <div class="mb-3">
        <label for="session_proceedings" class="form-label">إجراءات الجلسة</label>
        <textarea class="form-control" id="session_proceedings" name="session_proceedings" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">إضافة تقرير متابعة</button>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let now = new Date();
        let formattedDateTime = now.toISOString().slice(0, 16); // Format for datetime-local input
        document.getElementById("current_day").value = formattedDateTime;
    });
</script>

</form>
