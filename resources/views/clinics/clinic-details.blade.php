<div class="clinic-details">
    <h2 class="clinic-title">تفاصيل عيادة {{ $clinic->name }}</h2>

    <a href="{{ route('clinics.index') }}" class="btn btn-back">
        الرجوع إلي الخلف
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <div class="details-grid">
        <div class="detail-item">
            <strong>
                <i class="fa-solid fa-stopwatch-20"></i>
                مدة الجلسة :</strong> <span>{{ $clinic->session_duration }} دقائق</span>
        </div>
        <div class="detail-item">
            <strong>القسم :</strong> <span>{{ $clinic->department->name }}</span>
        </div>
        <div class="detail-item">
            <strong>
                <i class="fa-solid fa-hand-holding-dollar"></i>
                سعر الزيارة :</strong> <span>{{ number_format($clinic->visit_price, 2) }} ريال</span>
        </div>
    </div>

    <br>

    <div class="detail-item">
        <strong>
            <i class="fa-solid fa-calendar-days"></i>
            أيام العمل :</strong>
        <div class="work-days-list">
            @foreach(json_decode($clinic->work_days, true) as $day)
                <span class="day">{{ $day }}</span>
            @endforeach
        </div>
    </div>

</div>

<style>
    .clinic-details {
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        direction: rtl;
    }

    .clinic-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #2C6E49;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }

    .detail-item {
        font-size: 1rem;
        color: #555;
        line-height: 1.5;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .detail-item strong {
        font-weight: 600;
        color: #333;
    }

    .work-days-list {
        margin-top: 0.5rem;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .day {
        background-color: #28a745;
        color: #fff;
        padding: 0.5rem 1.2rem;
        border-radius: 25px;
        font-size: 1rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .day:hover {
        background-color: #218838;
        cursor: pointer;
    }

    .btn-back {
        color: #2C6E49;
        background-color: transparent;
        border: 2px solid #2C6E49;
        padding: 10px 35px;
        border-radius: 15px;
        margin: 20px 0;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-back i {
        margin-right: 8px;
    }

    .session-times {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
    }

    .session-times span {
        font-size: 1rem;
        color: #555;
        line-height: 1.5;
        background: #d4edda;
        padding: 0.5rem 1rem;
        border-radius: 8px;
    }
</style>