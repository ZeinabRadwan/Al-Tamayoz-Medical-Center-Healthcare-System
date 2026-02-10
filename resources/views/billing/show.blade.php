<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة ضريبية</title>
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            direction: rtl;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        .container {
            max-width: 820px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .invoice-header .text-section {
            text-align: center;
            flex: 1;
        }

        .invoice-header h2 {
            font-size: 32px;
            margin: 0;
            font-weight: bold;
            text-transform: uppercase;
        }

        .invoice-header p {
            margin: 8px 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .invoice-header .business-info {
            font-size: 16px;
            font-weight: bold;
        }

        .qr-code {
            text-align: center;
        }

        .qr-code h4 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .qr-code #qrcode {
            width: 250px;
            height: 250px;
            display: inline-block;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: right;
            font-size: 12px;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
        }

        .table td {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .invoice-summary {
            margin-top: 20px;
        }

        .invoice-summary td {
            text-align: right;
            padding: 8px;
            background-color: #f9f9f9;
        }

        .invoice-summary td strong {
            color: #4CAF50;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

        hr {
            border: 1px solid #4CAF50;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
            direction: rtl;
        }

        @media print {
            .btn {
                display: none;
            }

            .qr-code {
                display: block;
            }

            body {
                margin: 0;
                padding: 0;
            }

            .container {
                box-shadow: none;
                margin: 0;
                padding: 10px;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .invoice-header h2 {
                font-size: 24px;
            }

            .invoice-header p {
                font-size: 10px;
            }

            .table th,
            .table td {
                font-size: 10px;
                padding: 5px;
            }

            .btn {
                padding: 8px 15px;
                font-size: 12px;
            }
        }
    </style>
    <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="invoice-header">
            <div class="text-section">
                <h2>فاتورة ضريبية</h2>
                <p class="business-info">التميز الشامل للتأهيل الطبي</p>
                <p>السجل التجاري: 1010988398</p>
                <p>الهاتف: 0509227444</p>
                <p>الرقم الضريبي: 310267293700003</p>
            </div>
        </div>

        <div class="invoice-body">
            <h3>بيانات الفاتورة</h3>
            <table class="table">
                <tr>
                    <td><strong>اسم المريض:</strong> {{ $bill->patient->name }}</td>
                    <td><strong>رقم الفاتورة:</strong> {{ $bill->id }}</td>
                    <td><strong>اسم الطبيب:</strong> {{ $bill?->doctor?->name }}</td>

                    @if ($bill->doctor_id2)
                        <td><strong>اسم الطبيب الثاني:</strong> {{ $bill->doctor2->name }}</td>
                    @endif

                    @if ($bill->doctor_id3)
                        <td><strong>اسم الطبيب الثالث:</strong> {{ $bill->doctor3->name }}</td>
                    @endif

                    @if ($bill->doctor_id4)
                        <td><strong>اسم الطبيب الرابع:</strong> {{ $bill->doctor4->name }}</td>
                    @endif

                    <td><strong>تاريخ الفاتورة:</strong> {{ $bill->created_at }}</td>
                </tr>
            </table>

            <h3>تفاصيل الخدمة</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم الخدمة أو العيادة</th>
                        <th>السعر</th>
                        <th>العدد</th>
                        <th>المجموع</th>
                        <th>الخصم %</th>
                        <th>الخصم (مبلغ)</th>
                        <th>VAT</th>
                        <th>الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bill->clinic_services as $service)
                        <tr>
                            <td>
                                @if (isset($service['type']) && $service['type'] == 'service' && $service['service_id'])
                                    {{ \App\Models\Service::find($service['service_id'])->name ?? 'غير معروف' }}
                                @elseif (isset($service['type']) && $service['type'] == 'clinic' && $service['clinic_id'])
                                    {{ \App\Models\Clinic::find($service['clinic_id'])->name ?? 'غير معروف' }}
                                @else
                                    {{ 'غير معروف' }}
                                @endif
                            </td>
                            <td>{{ number_format($service['price'], 2) }} ر.س</td>
                            <td>{{ $service['quantity'] }}</td>
                            <td>{{ number_format($service['price'] * $service['quantity'], 2) }} ر.س</td>
                            <td>{{ number_format($service['discount'] ?? 0, 2) }} %</td>
                            <td>{{ number_format($service['discount_amount'] ?? 0, 2) }} ر.س</td>
                            <td>{{ number_format($service['tax'] ?? 0, 2) }} %</td>
                            <td>
                                {{ number_format(
                                    ($service['price'] * $service['quantity'] * (1 - ($service['discount'] ?? 0) / 100) -
                                        ($service['discount_amount'] ?? 0)) *
                                        (1 + ($service['tax'] ?? 0) / 100),
                                    2,
                                ) }}
                                ر.س
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>المجموع النهائي</h3>
            <table class="table">
                @php
                    $total_before_discount = 0;
                    $total_after_discount = 0;
                    $total_with_tax = 0;
                    $total_discount_amount = 0;
                    $total_tax_amount = 0;
                    $total_discount_sum = 0;
                @endphp

                @foreach ($bill->clinic_services as $service)
                    @php
                        $subtotal_before_discount = $service['price'] * $service['quantity'];
                        $subtotal_after_discount =
                            $subtotal_before_discount -
                            (($service['discount'] ?? 0) * $subtotal_before_discount) / 100 -
                            ($service['discount_amount'] ?? 0);
                        $subtotal_with_tax = $subtotal_after_discount * (1 + ($service['tax'] ?? 0) / 100);

                        $total_before_discount += $subtotal_before_discount;
                        $total_after_discount += $subtotal_after_discount;
                        $total_with_tax += $subtotal_with_tax;
                        $total_discount_amount +=
                            ($service['discount_amount'] ?? 0) +
                            ($service['price'] * $service['quantity'] * ($service['discount'] ?? 0)) / 100;

                        // Calculate total tax for each service
                        $total_tax_amount += ($subtotal_after_discount * ($service['tax'] ?? 0)) / 100;

                        // Calculate total discount sum for each service
                        $total_discount_sum +=
                            ($service['discount_amount'] ?? 0) +
                            ($service['price'] * $service['quantity'] * ($service['discount'] ?? 0)) / 100;
                    @endphp
                @endforeach

                <tr>
                    <td><strong>مجموع الخصم:</strong> {{ number_format($total_discount_sum, 2) }} ر.س</td>
                    <td><strong>المجموع قبل الخصم:</strong> {{ number_format($total_before_discount, 2) }} ر.س</td>
                    <td><strong>المجموع بعد الخصم:</strong> {{ number_format($total_after_discount, 2) }} ر.س</td>
                    <td><strong>إجمالي الضريبة:</strong> {{ number_format($total_tax_amount, 2) }} ر.س</td>
                </tr>
                <tr>
                    <td><strong>المجموع بالضريبة:</strong> {{ number_format($total_with_tax, 2) }} ر.س</td>
                    <td><strong>الخصم الكلي:</strong> {{ number_format($total_discount_amount, 2) }} ر.س</td>
                    <td><strong>المدفوع:</strong> {{ number_format($bill->paid_amount, 2) }} ر.س</td>
                    <td><strong>المتبقي:</strong> {{ number_format($bill->total_amount - $bill->paid_amount, 2) }} ر.س
                    </td>
                </tr>
            </table>

        </div>
        @if ($generatedString)
            <div class="qr-code">
                <h4>امسح رمز الاستجابة السريعة</h4>
                <div id="qrcode"><img style="width: 250px; height: 250px" src="{{ $generatedString }}"></div>
            </div>
        @endif

        <div class="footer">
            <p>&copy; 2024 التميز الشامل للتأهيل الطبي. جميع الحقوق محفوظة.</p>
            <p>الفاتورة تتوافق مع أنظمة ضريبة القيمة المضافة في المملكة العربية السعودية.</p>
            <p>يرجى الاحتفاظ بها للمراجعة القانونية.</p>
        </div>
        <div class="text-center">
            <button class="btn" onclick="window.print()">طباعة الفاتورة</button>
        </div>
    </div>
</body>
</html>
