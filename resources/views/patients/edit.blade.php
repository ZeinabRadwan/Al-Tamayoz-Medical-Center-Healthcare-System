@extends('layouts.app')
@section('content')
<div class="container">
<header class="mb-5">
    <h1>تعديل المريض {{ $patient->name }}</h1>
    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary">الرجوع لصفحة المريض</a>
</header>

<h1>بيانات المريض</h1>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label fw-bold">الاسم <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $patient->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="id_number" class="form-label fw-bold">رقم الهوية <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('id_number') is-invalid @enderror" id="id_number" name="id_number" value="{{ old('id_number', $patient->id_number) }}" required>
                @error('id_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="dob" class="form-label fw-bold">تاريخ الميلاد</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $patient->dob) }}">
                @error('dob')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="blood_type" class="form-label fw-bold">فصيلة الدم</label>
                <select class="form-select @error('blood_type') is-invalid @enderror" id="blood_type" name="blood_type">
                    <option value="" selected>اختر فصيلة الدم</option>
                    @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bloodType)
                    <option value="{{ $bloodType }}" {{ old('blood_type', $patient->blood_type) == $bloodType ? 'selected' : '' }}>{{ $bloodType }}</option>
                    @endforeach
                </select>
                @error('blood_type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
  <div class="row g-3">

        <!-- Gender Field -->
        <div class="col-md-6">
            <label for="gender">الجنس</label>
            <select name="gender" id="gender" class="form-control">
                <option value="" disabled {{ old('gender', $patient->gender) == '' ? 'selected' : '' }}>اختر الجنس</option>
                <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>

        <!-- How did you find out about us Field -->
        <div class="col-md-6">
            <label for="how_did_you_find_out_about_us">كيف عرفت عن المجمع؟</label>
            <input type="text" name="how_did_you_find_out_about_us" id="how_did_you_find_out_about_us" class="form-control" value="{{ old('how_did_you_find_out_about_us', $patient->how_did_you_find_out_about_us) }}">
        </div>

    </div>

    
            <div class="col-md-6">
                <label for="phone" class="form-label fw-bold">رقم الجوال <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label fw-bold">البريد الإلكتروني <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $patient->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">هل لديك تأمين؟ <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center">
                    <div class="form-check custom-radio me-3">
                        <input class="form-check-input" type="radio" name="has_insurance" id="insurance_yes" value="yes" {{ old('has_insurance', $patient->has_insurance) === 'yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="insurance_yes">نعم</label>
                    </div>
                    <div class="form-check custom-radio">
                        <input class="form-check-input" type="radio" name="has_insurance" id="insurance_no" value="no" {{ old('has_insurance', $patient->has_insurance) === 'no' ? 'checked' : '' }}>
                        <label class="form-check-label" for="insurance_no">لا</label>
                    </div>
                </div>
            </div>


            <div class="col-md-6" id="insurance_field" style="{{ old('has_insurance', $patient->has_insurance) == 'yes' ? '' : 'display: none;' }}">
                <label for="insurance_id" class="form-label fw-bold">التأمين</label>
                <select class="form-select @error('insurance_id') is-invalid @enderror" id="insurance_id" name="insurance_id">
                    <option value="">اختر التأمين</option>
                    @foreach($insuranceProviders as $insurance)
                    <option value="{{ $insurance->id }}" {{ old('insurance_id', $patient->insurance_id) == $insurance->id ? 'selected' : '' }}>
                        {{ $insurance->name }}
                    </option>
                    @endforeach
                </select>
                @error('insurance_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class="col-md-6">
                <label for="nationality" class="form-label fw-bold">الجنسية</label>
                        <select id="nationality" name="nationality" class="form-control" required>
                            <option value="">اختر الجنسية</option>
                            <option value="السعودية">السعودية</option>
                            <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                            <option value="الكويت">الكويت</option>
                            <option value="قطر">قطر</option>
                            <option value="البحرين">البحرين</option>
                            <option value="سلطنة عمان">سلطنة عمان</option>
                            <option value="مصر">مصر</option>
                            <option value="أفغانستان">أفغانستان</option>
                            <option value="ألبانيا">ألبانيا</option>
                            <option value="الجزائر">الجزائر</option>
                            <option value="اليمن">اليمن</option>

                            <option value="أندورا">أندورا</option>
                            <option value="أنغولا">أنغولا</option>
                            <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                            <option value="الأرجنتين">الأرجنتين</option>
                            <option value="أرمينيا">أرمينيا</option>
                            <option value="أستراليا">أستراليا</option>
                            <option value="سوريا">سوريا</option>
                            <option value="تركيا">تركيا</option>
                            <option value="النمسا">النمسا</option>
                            <option value="أذربيجان">أذربيجان</option>
                            <option value="بهماس">بهماس</option>
                            <option value="بنغلاديش">بنغلاديش</option>
                            <option value="باربادوس">باربادوس</option>
                            <option value="ألمانيا">ألمانيا</option>
                            <option value="بليز">بليز</option>
                            <option value="بنين">بنين</option>
                            <option value="بوتان">بوتان</option>
                            <option value="بوليفيا">بوليفيا</option>
                            <option value="البوسنة والهرسك">البوسنة والهرسك</option>
                            <option value="بوتسوانا">بوتسوانا</option>
                            <option value="البرازيل">البرازيل</option>
                            <option value="بروناي">بروناي</option>
                            <option value="بلغاريا">بلغاريا</option>
                            <option value="بوركينا فاسو">بوركينا فاسو</option>
                            <option value="بوروندي">بوروندي</option>
                            <option value="كمبوديا">كمبوديا</option>
                            <option value="الكاميرون">الكاميرون</option>
                            <option value="كندا">كندا</option>
                            <option value="الرأس الأخضر">الرأس الأخضر</option>
                            <option value="تشاد">تشاد</option>
                            <option value="شيلي">شيلي</option>
                            <option value="الصين">الصين</option>
                            <option value="كولومبيا">كولومبيا</option>
                            <option value="جزر القمر">جزر القمر</option>
                            <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                            <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                            <option value="كوستاريكا">كوستاريكا</option>
                            <option value="كرواتيا">كرواتيا</option>
                            <option value="كوبا">كوبا</option>
                            <option value="قبرص">قبرص</option>
                            <option value="جمهورية التشيك">جمهورية التشيك</option>
                            <option value="الدنمارك">الدنمارك</option>
                            <option value="جيبوتي">جيبوتي</option>
                            <option value="دومينيكا">دومينيكا</option>
                            <option value="الإكوادور">الإكوادور</option>
                            <option value="السلفادور">السلفادور</option>
                            <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                            <option value="إريتريا">إريتريا</option>
                            <option value="استونيا">استونيا</option>
                            <option value="إثيوبيا">إثيوبيا</option>
                            <option value="فجي">فجي</option>
                            <option value="فنلندا">فنلندا</option>
                            <option value="فرنسا">فرنسا</option>
                            <option value="غابون">غابون</option>
                            <option value="غامبيا">غامبيا</option>
                            <option value="غينيا">غينيا</option>
                            <option value="غينيا بيساو">غينيا بيساو</option>
                            <option value="غيانا">غيانا</option>
                            <option value="هايتي">هايتي</option>
                            <option value="هندوراس">هندوراس</option>
                            <option value="هنغاريا">هنغاريا</option>
                            <option value="آيسلندا">آيسلندا</option>
                            <option value="الهند">الهند</option>
                            <option value="إندونيسيا">إندونيسيا</option>
                            <option value="إيران">إيران</option>
                            <option value="العراق">العراق</option>
                            <option value="أيرلندا">أيرلندا</option>
                            <option value="فلسطين">فلسطين</option>
                            <option value="إيطاليا">إيطاليا</option>
                            <option value="جامايكا">جامايكا</option>
                            <option value="اليابان">اليابان</option>
                            <option value="الأردن">الأردن</option>
                            <option value="كازاخستان">كازاخستان</option>
                            <option value="كينيا">كينيا</option>
                            <option value="كيريباتي">كيريباتي</option>
                            <option value="كوريا الشمالية">كوريا الشمالية</option>
                            <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                            <option value="قيرغيزستان">قيرغيزستان</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاتفيا">لاتفيا</option>
                            <option value="لبنان">لبنان</option>
                            <option value="ليسوتو">ليسوتو</option>
                            <option value="ليبيريا">ليبيريا</option>
                            <option value="ليبيا">ليبيا</option>
                            <option value="ليتوانيا">ليتوانيا</option>
                            <option value="لوكسمبورغ">لوكسمبورغ</option>
                            <option value="مقدونيا">مقدونيا</option>
                            <option value="مدغشقر">مدغشقر</option>
                            <option value="ملاوي">ملاوي</option>
                            <option value="ماليزيا">ماليزيا</option>
                            <option value="جزر المالديف">جزر المالديف</option>
                            <option value="مالي">مالي</option>
                            <option value="مالطا">مالطا</option>
                            <option value="جزر مارشال">جزر مارشال</option>
                            <option value="موريتانيا">موريتانيا</option>
                            <option value="موريشيوس">موريشيوس</option>
                            <option value="المكسيك">المكسيك</option>
                            <option value="ميكرونيزيا">ميكرونيزيا</option>
                            <option value="مولدوفا">مولدوفا</option>
                            <option value="منغوليا">منغوليا</option>
                            <option value="موناكو">موناكو</option>
                            <option value="مونتينيغرو">مونتينيغرو</option>
                            <option value="المغرب">المغرب</option>
                            <option value="موزمبيق">موزمبيق</option>
                            <option value="ميانمار">ميانمار</option>
                            <option value="ناميبيا">ناميبيا</option>
                            <option value="ناورو">ناورو</option>
                            <option value="نيبال">نيبال</option>
                            <option value="هولندا">هولندا</option>
                            <option value="نيوزيلندا">نيوزيلندا</option>
                            <option value="نيكاراغوا">نيكاراغوا</option>
                            <option value="النيجر">النيجر</option>
                            <option value="نيجيريا">نيجيريا</option>
                            <option value="النرويج">النرويج</option>
                            <option value="أفريقيا الجنوبية">أفريقيا الجنوبية</option>
                            <option value="الولايات المتحدة الأمريكية">الولايات المتحدة الأمريكية</option>
                        </select>
                @error('nationality')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="address" class="form-label fw-bold">العنوان</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address', $patient->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="symptoms" class="form-label fw-bold">الأعراض</label>
                <textarea class="form-control @error('symptoms') is-invalid @enderror" id="symptoms" name="symptoms" rows="3">{{ old('symptoms', $patient->symptoms) }}</textarea>
                @error('symptoms')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn px-4 ms-2 me-3">حفظ التعديلات</button>
            <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary px-4 ms-2 me-3">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .container {
        direction: rtl;
        text-align: right;
        margin: 0 auto;
        max-width: 94%;
        margin-right: 5%;
    }

    header {
        text-align: center;
        padding: 10px 20px;
        margin-top: 0;
        margin-bottom: 20px;
        border-radius: 0 0 15px 15px;
        background-image: linear-gradient(to right, #cbe4c7, #a3d8a1);
    }

    header h1 {
        color: #567357;
        font-size: 2rem;
        margin: 0;
    }

    .btn {
        margin-top: 20px;
        color: #567357;
        background-color: transparent;
        border: 1px solid #567357;
        padding: 10px 25px;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #4a6b4a !important;
        color: #fff !important;
    }


    @media print {
        body {
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container,
        .card,
        .card-body {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0;
        }

        .card-header h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-label,
        .form-control,
        select,
        textarea {
            font-size: 12px;
            line-height: 1.5;
        }

        textarea {
            page-break-inside: avoid;
        }

        .btn {
            display: none;
        }

        @page {
            margin: 5mm;
        }

        .card {
            box-shadow: none;
            border: none;
        }

        .container {
            padding: 0;
            margin: 0;
        }
    }
</style>
@endsection
<script>
    function toggleInsuranceField() {
        const insuranceYes = document.getElementById('insurance_yes');
        const insuranceField = document.getElementById('insurance_field');

        if (insuranceYes.checked) {
            insuranceField.style.display = 'block';
        } else {
            insuranceField.style.display = 'none';
        }
    }
</script>