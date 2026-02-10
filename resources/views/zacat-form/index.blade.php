<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض نماذج الزكاة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h2 class="mb-4">عرض بيانات النماذج</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>م</th>
                    <th>رمز التحقق</th>
                    <th>الرقم الضريبي</th>
                    <th>العنوان</th>
                    <th>البريد الإلكتروني</th>
                    <th>اسم المنشأة</th>
                    <th>اسم الوحدة</th>
                    <th>الملفات المرفقة</th>
                    <th>تاريخ الإرسال</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td>{{ $form->otp }}</td>
                        <td>{{ $form->tax_number }}</td>
                        <td>{{ $form->address }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->organization_name }}</td>
                        <td>{{ $form->unit_name }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($form->pdf_files as $index => $file)
                                    <li>
                                        <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                            @switch($index)
                                                @case(0) فاتورة مبسطة @break
                                                @case(1) فاتورة مبسطة - مدين @break
                                                @case(2) فاتورة مبسطة - دائن @break
                                                @case(3) فاتورة ضريبية @break
                                                @case(4) فاتورة ضريبية - مدين @break
                                                @case(5) فاتورة ضريبية - دائن @break
                                                @default ملف PDF
                                            @endswitch
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $form->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('zacat-form.create') }}" class="btn btn-primary">رجوع إلى النموذج</a>
    </div>
</body>
</html>
