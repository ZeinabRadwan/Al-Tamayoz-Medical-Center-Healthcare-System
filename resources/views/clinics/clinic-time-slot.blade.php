<button id="toggle-appointment-form" class="btn btn-submit">تعديل مواعيد العيادة</button>

<div class="appointment-section" id="appointment-form" style="display: none;">
    <h3 class="section-title">إنشاء مواعيد</h3> 
    <form action="{{ route('clinics.generateAppointments', $clinic) }}" method="POST" class="appointment-form">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="periods">الفترات الزمنية:</label>
                <div id="periods-container">
                    <div class="period-group">
                        <div class="input-row">
                            <label for="from">من الساعة:</label>
                            <input type="time" name="periods[0][from]" required class="form-control">
                        </div>
                        <div class="input-row">
                            <label for="to">إلى الساعة:</label>
                            <input type="time" name="periods[0][to]" required class="form-control">
                        </div>
                        <div class="input-row">
                            <label for="gap_duration">فترة الفاصل بين الجلسات (دقائق):</label>
                            <input type="number" name="periods[0][gap_duration]" class="form-control" min="0" value="0">
                        </div>
                    </div>
                </div>
                <button type="button" id="add-period-btn" class="btn btn-link">إضافة فترة</button>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-submit">إنشاء المواعيد</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('add-period-btn').addEventListener('click', function() {
            const periodsContainer = document.getElementById('periods-container');
            const periodCount = periodsContainer.getElementsByClassName('period-group').length;
            
            const newPeriod = document.createElement('div');
            newPeriod.classList.add('period-group');
            newPeriod.innerHTML = `
                <div class="input-row">
                    <label for="from">من الساعة:</label>
                    <input type="time" name="periods[${periodCount}][from]" required class="form-control">
                </div>
                <div class="input-row">
                    <label for="to">إلى الساعة:</label>
                    <input type="time" name="periods[${periodCount}][to]" required class="form-control">
                </div>
                <div class="input-row">
                    <label for="gap_duration">فترة الفاصل بين الجلسات (دقائق):</label>
                    <input type="number" name="periods[${periodCount}][gap_duration]" class="form-control" min="0" value="0">
                </div>
            `;
            periodsContainer.appendChild(newPeriod);
        });
    </script>
</div>

<style>
    .btn-submit {
        background-color: #2C6E49;
        color: white;
        padding: 10px 35px;
        border: none;
        border-radius: 15px;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .form-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .input-row {
        display: inline-block;
        width: 32%;
        padding: 5px;
    }

    .input-row input {
        width: 100%;
    }

    .period-group {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .section-title {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #2C6E49;
        font-weight: 600;
    }

    #add-period-btn {
        margin-top: 10px;
    }
</style>
