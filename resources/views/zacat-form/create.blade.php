<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>نموذج الربط مع هيئة الزكاة والضريبة والجمارك</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f5ec;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 30px;
        }

        h2 {
            color: #198754;
            /* Bootstrap green */
            margin-bottom: 25px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        .nav-tabs .nav-link {
            color: #198754;
            font-weight: bold;
            border: none;
            border-radius: 0;
        }

        .nav-tabs .nav-link.active {
            background-color: #198754;
            color: white;
            border-radius: 0;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #198754;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #146c43;
        }

        .card {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #cce3d2;
            border-radius: 8px;
            background-color: #f6fff9;
        }

        .mb-3 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="p-4">
    <div class="container">
        <!-- Tab navigation -->
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="get-csr-tab" data-bs-toggle="tab" href="#get-csr" role="tab">الخطوة
                    1: نموذج الربط</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="compliance-invoice-tab" data-bs-toggle="tab" href="#compliance-invoice"
                    role="tab">الخطوة 2: اختبار الفواتير</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="get-cert-tab" data-bs-toggle="tab" href="#get-cert" role="tab">الخطوة 3:
                    الحصول على الشهادة</a>
            </li>
        </ul>
        @if (session('form_data'))
            <div class="card border-success mb-4 shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">{{ session('success_title') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>اسم المنشأة:</strong>
                            <p class="mb-0">{{ session('form_data')->organization_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>الرقم الضريبي:</strong>
                            <p class="mb-0">{{ session('form_data')->tax_number }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>البريد الإلكتروني:</strong>
                            <p class="mb-0">{{ session('form_data')->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>العنوان:</strong>
                            <p class="mb-0">{{ session('form_data')->address }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>اسم الوحدة:</strong>
                            <p class="mb-0">{{ session('form_data')->unit_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>السجل التجاري:</strong>
                            <p class="mb-0">{{ session('form_data')->commercial_num }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>رقم المبنى:</strong>
                            <p class="mb-0">{{ session('form_data')->build_num }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>الرقم الإضافي:</strong>
                            <p class="mb-0">{{ session('form_data')->additional_num }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>رقم التقسيم:</strong>
                            <p class="mb-0">{{ session('form_data')->subdivision }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>الرمز البريدي:</strong>
                            <p class="mb-0">{{ session('form_data')->zip }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>اسم المدينة:</strong>
                            <p class="mb-0">{{ session('form_data')->city_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="card border-success mb-4 shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">{{ session('success') }}</h5>
                </div>
            </div>
        @endif

        <!-- Tab content -->
        <div class="tab-content" id="myTabContent">
            <!-- Step 1 -->
            <div class="tab-pane fade show active" id="get-csr" role="tabpanel">
                <h2>نموذج الربط مع هيئة الزكاة والضريبة والجمارك</h2>
                <div class="card">
                    <form action="{{ url('/zatca/get-csr') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="otp" class="form-label">رمز التحقق (OTP)</label>
                                <small class="form-text text-muted">مكون من 6 أرقام</small>
                                <input type="text" class="form-control" name="otp" id="otp" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tax_number" class="form-label">الرقم الضريبي</label>
                                <input type="text" class="form-control" name="tax_number" id="tax_number" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">العنوان</label>
                                <small class="form-text text-muted">يرجى كتابة العنوان باللغة الإنجليزية</small>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization_name" class="form-label">اسم المنشأة</label>
                                <input type="text" class="form-control" name="organization_name"
                                    id="organization_name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="unit_name" class="form-label">اسم الجهاز او الوحدة</label>
                                <input type="text" class="form-control" name="unit_name" id="unit_name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="commercial_num" class="form-label">السجل التجاري</label>
                                <input type="text" class="form-control" name="commercial_num" id="commercial_num"
                                    required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="build_num" class="form-label">رقم المبنى</label>
                                <input type="text" class="form-control" name="build_num" id="build_num" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="additional_num" class="form-label">الرقم الإضافي</label>
                                <small class="form-text text-muted">مكون من 4 أرقام</small>
                                <input type="text" class="form-control" name="additional_num" id="additional_num"
                                    required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="subdivision" class="form-label">رقم التقسيم</label>
                                <small class="form-text text-muted">مكون من 8 أرقام</small>
                                <input type="text" class="form-control" name="subdivision" id="subdivision"
                                    required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zip" class="form-label">رمز البريد</label>
                                <input type="text" class="form-control" name="zip" id="zip" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city_name" class="form-label">اسم المدينة</label>
                                <input type="text" class="form-control" name="city_name" id="city_name" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">إرسال البيانات</button>
                    </form>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="tab-pane fade" id="compliance-invoice" role="tabpanel">
                <h2>اختبار الفواتير</h2>
                <div class="row">
                    @foreach ([['388', '0', 'مبسطة'], ['383', '0', 'مبسطة مدين'], ['381', '0', 'مبسطة دائن'], ['388', '1', 'ضريبية'], ['383', '1', 'ضريبية مدين'], ['381', '1', 'ضريبية دائن']] as $type)
                        <div class="col-md-4">
                            <form class="card" action="{{ url('/zatca/compliance-invoice') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type_code" value="{{ $type[0] }}">
                                <input type="hidden" name="type_tax" value="{{ $type[1] }}">
                                <button type="submit" class="btn btn-primary w-100">اختبار فاتورة
                                    {{ $type[2] }}</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Step 3 -->
            <div class="tab-pane fade" id="get-cert" role="tabpanel">
                <h2>الحصول على الشهادة</h2>
                <form class="card" action="{{ url('/zatca/get-cert') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-primary">الحصول على الشهادة</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
