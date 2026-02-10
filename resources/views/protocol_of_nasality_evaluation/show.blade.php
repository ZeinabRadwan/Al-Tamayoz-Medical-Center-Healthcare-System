<link rel="stylesheet" href="vv0all.css">
<style>
    @media print {
        .bcont {
            display: none !important;
        }

        aside {
            display: none !important;
        }

        header {
            display: none !important;
        }

        .inmain {
            width: 95% !important;
        }

        .container {
            width: 100% !important;
        }

        button {
            display: none;
        }

        /* تعيين الصفحة للطباعة في وضع landscape */
        @page {
            size: landscape;
        }
    }

    h1 {
        font-family: cairo;
        text-align: center;



        text-align: center;
    }

    .dko {

        margin: 20px;
        width: 15%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background: linear-gradient(0.25turn, #66AA3E, #92C641, #66AA3E);
        color: black;
        font-family: 'Droid Arabic Kufi', Arial, sans-serif;
        font-weight: bold;
        font-family: cairo;
        text-align: center;
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: Sans-serif;
        }

        .border {
            border: 2px solid black;
        }

        label {
            font-weight: bolder;
        }

        .row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .flex {
            display: flex;
        }

        .w-full {
            width: 100%;
        }

        .p-0 {
            padding: 0;
        }

        .font-bold {
            font-weight: bolder;
        }

        .font-w-none {
            font-weight: normal;
        }

        .size-fit {
            min-width: 820px;
            max-width: 1060px;
        }

        .p-fit {
            padding: 2rem 3rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .t-center {
            text-align: center;
        }

        .bg-grey {
            background-color: rgb(238, 238, 238);
        }

        .t-grey {
            color: #a7a4a4;
        }

        .RangeOfMotionTable th,
        td {
            padding: 0 4px;
        }

        .b-none {
            border: none;
        }

        .input readonly-none {
            border: none;
            outline: none;
        }

        .h-w-full {
            height: 100%;
            width: 100%;
        }

        .t-w-fit {
            width: 96%;
        }

        .bg-yellow {
            background-color: rgb(249, 249, 147);
        }

        .h-w-full {
            height: 100%;
            width: 100%;
            background-color: #f0f0f0;
        }

        .bg-yellow {
            background-color: rgb(249, 249, 147);
        }

        th,
        td {
            padding: 0 0px;
            height: 30px;
            background-color: #f0f0f0 !important;
            height: 30px;
        }

        .b-none {
            border: none;
            color: darkgreen;
        }

        * {
            font-family: Sans-serif;
        }

        .Subjective_Assessment_con {
            padding: 0 .5rem 1rem 1rem;
        }

        .border {
            border: 2px solid black;
        }

        .py-lg {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .px-md {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        label {
            font-weight: bolder;

        }

        .row {
            flex-direction: column;
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .flex {
            display: flex;
        }

        .w-half {
            width: 50%;
        }

        .w-full {
            width: 100%;
        }



        table {
            border-collapse: collapse;
            padding: 4px;
            width: 100%;
        }

        .p-0 {
            padding: 0;
        }

        .font-bold {
            font-weight: bolder;
        }
    </style>
</head>

<form>

    <body style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">

        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>Protocol of nasality evaluation</u></h2>
            <div class="flex" style="justify-content: space-evenly;margin-top: .5rem;">
                <div class="flex">
                    Referral from :&nbsp;<input readonly type="text" value="{{ $report->i1 }}" name="i1">
                </div>
                <div class="flex">
                    File number:&nbsp;<input readonly style="width: 100px;" type="text" value="{{ $report->i2 }}" name="i2">
                </div>
                <div class="flex">
                    Cause of referral:&nbsp;<input readonly type="text" value="{{ $report->i3 }}" name="i3">
                </div>
                <div class="flex">
                    Date : &nbsp;<input readonly style="width: 150px;" type="text" value="{{ $report->i4 }}" name="i4">
                </div>
            </div>
            <h3><u>PERSONAL HISTORY</u></h3>
            <div class="flex" style="gap: 1rem;">
                <div>
                    <label>1. Name:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i5 }}" name="i5">
                </div>
                <div class="flex">
                    <label>2. Sex:</label>&nbsp;&nbsp;&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i6 ? 'checked' : '' }} name="i6">&nbsp;
                    <label>Male</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i7 ? 'checked' : '' }} name="i7">&nbsp;
                    <label>Female</label>
                </div>
            </div>
            <div class="flex" style="justify-content: space-evenly;margin-top: .5rem;">
                <div>
                    <label>3. Birth date:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i8 }}" name="i8">
                </div>
                <div>
                    <label>Age: </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i9 }}" name="i9">
                </div>
                <div>
                    <label>4. Order of birth:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i10 }}" name="i10">
                </div>
                <div>
                    <label>Place:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i11 }}" name="i11">
                </div>
            </div>
            <div class="flex" style="margin-top: .5rem;">
                <div>
                    <label>5. Residence:</label>&nbsp;
                    <input readonly style="width: 400px;" type="text" value="{{ $report->i12 }}" name="i12">
                </div>
            </div>
            <div class="flex" style="gap: 5rem;margin-top: .5rem;">
                <div>
                    <label>6. Father's job:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i13 }}" name="i13">
                </div>
                <div>
                    <label>7. Mother's job:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i14 }}" name="i14">
                </div>
            </div>
            <div class="flex" style="margin-top: .5rem;">
                <div>
                    <label>8. Parent consanguinity:</label>&nbsp;&nbsp;&nbsp;
                    Yes &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i15 ? 'checked' : '' }} name="i15">&nbsp;&nbsp;
                    No &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i16 ? 'checked' : '' }} name="i16">
                </div>
            </div>
            <div class="flex" style="gap: 5rem;margin-top: .5rem;">
                <div>
                    <label>9. Similar conditions:</label>&nbsp;
                    <input readonly style="width: 350px;" type="text" value="{{ $report->i17 }}" name="i17">
                </div>
                <div>
                    <label>10. Schooling/ Occupation:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i18 }}" name="i18">
                </div>
            </div>
            <h3>A) INTERVIEW</h3>
            <div style="margin-left: 1rem;">
                <div>
                    <label>1. COMPLAINT:</label>&nbsp;
                    <input readonly style="width: 300px;" type="text" value="{{ $report->i19 }}" name="i19">
                </div>
                <div>
                    <label>Duration:</label>&nbsp;<input readonly style="width: 60px;" type="text" value="{{ $report->i20 }}"
                        name="i20">&nbsp;&nbsp;&nbsp;
                    Onset: sudden &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i21 ? 'checked' : '' }} name="i21">&nbsp;&nbsp;
                    Gradual &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i22 ? 'checked' : '' }} name="i22">
                </div>
                <div>
                    <label>Course:</label>&nbsp;<input readonly style="width: 60px;" type="text" value="{{ $report->i23 }}"
                        name="i23">&nbsp;&nbsp;&nbsp;
                    Progressive &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i24 ? 'checked' : '' }} name="i24">&nbsp;&nbsp;
                    Regressive &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i25 ? 'checked' : '' }} name="i25">&nbsp;&nbsp;
                    Stationary &nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i26 ? 'checked' : '' }} name="i26">
                </div>
            </div>
            <h3><u>2. DEVELOPMENTAL HISTORY:</u></h3>
            <ul>
                <li>
                    <label>Prenatal:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i27 }}" name="i27">
                </li>
            </ul>
            <div class="flex" style="gap: 3rem;">
                <div>
                    <label>Bleeding</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i28 ? 'checked' : '' }} name="i28">
                </div>
                <div>
                    <label>Fevers</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i29 ? 'checked' : '' }} name="i29">
                </div>
                <div>
                    <label>Drugs</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i30 ? 'checked' : '' }} name="i30">
                </div>
                <div>
                    <label>Hypertension</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i31 ? 'checked' : '' }} name="i31">
                </div>
            </div>
            <div class="flex" style="gap: 3rem;">
                <div>
                    <label>Toxemia</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i32 ? 'checked' : '' }} name="i32">
                </div>
                <div style="margin-left: 4rem;">
                    <label>Anemia:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i33 }}" name="i33">
                </div>
                <div>
                    <label>Age of mother:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i34 }}" name="i34">
                </div>
            </div>
            <ul>
                <li>
                    <label>Perinatal & neonatal:</label>&nbsp;
                    <input readonly style="width: 300px;" type="text" value="{{ $report->i35 }}" name="i35">
                </li>
            </ul>
            <div class="flex" style="justify-content: space-evenly;margin-top: .5rem;">
                <div>
                    <label>Type of labour:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i36 }}" name="i36">
                </div>
                <div>
                    <label>Term: </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i37 }}" name="i37">
                </div>
                <div>
                    <label>Weight of baby:</label>&nbsp;
                    <input readonly style="width: 50px;" type="text" value="{{ $report->i38 }}" name="i38">
                </div>
                <div>
                    <label>First cry:</label>&nbsp;
                    <input readonly style="width: 100px;" type="text" value="{{ $report->i39 }}" name="i39">
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Cyanosis:</label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i40 }}" name="i40">
                </div>
                <div>
                    <label>Jaundice: </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i41 }}" name="i41">
                </div>
                <div>
                    <label>Resuscitation:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i42 }}" name="i42">
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Time of discovery of the problem:</label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i43 }}" name="i43">
                </div>
                <div>
                    <label>Other anomalies:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i44 }}" name="i44">
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Nasal regurge of milk: </label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i45 }}" name="i45">
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Feeding:</label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i46 }}" name="i46">
                </div>
                <div>
                    <label>Breast feeding:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i47 }}" name="i47">
                </div>
                <div>
                    <label style="font-size: 10px;">Artificial feeding:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i48 }}" name="i48">
                </div>
            </div>
            <div class="flex" style="justify-content: space-between; margin-top: .5rem;">
                <div style="margin-left: 2rem;">
                    <input readonly style="width: 400px;" type="text" value="{{ $report->i49 }}" name="i49">
                </div>
                <div>
                    <label>Cause:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i50 }}" name="i50">
                </div>
            </div>
            <div class="flex" style="margin-top: .5rem;justify-content: space-between;">
                <div style="gap: .5rem;" class="row">
                    <div>
                        <label>3. milestones:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i51 }}" name="i51">
                    </div>
                    <div>
                        <label>Sitting: </label>&nbsp;
                        <input readonly type="text" value="{{ $report->i52 }}" name="i52">
                    </div>
                    <div>
                        <label>Toilet training:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i53 }}" name="i53">
                    </div>
                    <div>
                        <label>1<sup>st</sup> word:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i54 }}" name="i54">
                    </div>
                </div>
                <div style="gap: .5rem;margin-top: 1.5rem;" class="row">
                    <div class="flex">
                        <label>Walking:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i55 }}" name="i55">&nbsp;
                        <label>Teething:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i56 }}" name="i56">
                    </div>
                    <div class="flex">
                        <label>Self-feeding:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i57 }}" name="i57">&nbsp;
                        <label>Self-dressing: </label>&nbsp;
                        <input readonly style="width: 112px;" type="text" value="{{ $report->i58 }}" name="i58">
                    </div>
                    <div>
                        <label>2-word sentence:</label>&nbsp;
                        <input readonly type="text" value="{{ $report->i59 }}" name="i59">
                    </div>
                </div>
            </div>
            <h3>4. ILLNESSES OF EARLY CHILDHOOD:</h3>
            <ul>
                <li>
                    <label>Ear diseases:</label>
                    <input readonly type="text" value="{{ $report->i60 }}" name="i60">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>RT</label>&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i61 ? 'checked' : '' }} name="i61">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>LT</label>&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i62 ? 'checked' : '' }} name="i62">
                </li>
            </ul>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Discharge:</label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i63 }}" name="i63">
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>Surgery:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i64 }}" name="i64">
                </div>
            </div>
            <h3>Medical treatment:</h3>
            <div style="gap: 6rem;" class="flex">
                <ul class="flex" style="width: 40%;flex-direction: column; gap: .5rem;">
                    <li>
                        <div class="flex w-full">
                            <label>Surgery:</label>&nbsp;
                            <input readonly type="text" class="w-full" value="{{ $report->i65 }}" name="i65">
                        </div>
                    </li>
                    <li>
                        <div class="flex w-full">
                            <label>Tonsillectomy:</label>&nbsp;
                            <input readonly type="text" class="w-full" value="{{ $report->i66 }}" name="i66">
                        </div>
                    </li>
                    <li>
                        <div class="flex w-full">
                            <label>Others:</label>&nbsp;
                            <input readonly type="text" class="w-full" value="{{ $report->i67 }}" name="i67">
                        </div>
                    </li>
                </ul>
                <div class="row" style="gap: .5rem;">
                    <div style="margin-top: .5rem;" class="flex w-full">
                        <label class="flex"><span>At</span>&nbsp;<span>age</span>&nbsp;<span>of:</span>&nbsp;</label>&nbsp;
                        <input readonly type="text" class="w-full" value="{{ $report->i68 }}" name="i68">
                    </div>
                    <div class="flex w-full">
                        <label class="flex"><span>At</span>&nbsp;<span>age</span>&nbsp;<span>of:</span>&nbsp;</label>&nbsp;
                        <input readonly type="text" class="w-full" value="{{ $report->i69 }}" name="i69">
                    </div>
                </div>
            </div>
            <div class="flex" style="gap: 2rem;margin-top: .5rem;">
                <div>
                    <label>5. Operative intervention: type</label>&nbsp;
                    <input readonly style="width: 200px;" type="text" value="{{ $report->i70 }}" name="i70">
                </div>
                <div>
                    <label>At age of </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i71 }}" name="i71">
                </div>
                <div>
                    <label>Place </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i72 }}" name="i72">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>-Lip:</label>&nbsp;
                    <input readonly style="width: 40%;" type="text" value="{{ $report->i73 }}" name="i73">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>-Secondary repair:</label>&nbsp;
                    <input readonly style="width: 40%;" type="text" value="{{ $report->i74 }}" name="i74">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>- Festula repair:</label>&nbsp;
                    <input readonly style="width: 40%;" type="text" value="{{ $report->i75 }}" name="i75">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>- Effects:</label>&nbsp;
                    <input readonly style="width: 40%;" type="text" value="{{ $report->i76 }}" name="i76">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>- Regurge:</label>&nbsp;&nbsp;
                    none&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i77 ? 'checked' : '' }} name="i77">&nbsp;&nbsp;&nbsp;
                    fluids&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i78 ? 'checked' : '' }} name="i78">&nbsp;&nbsp;&nbsp;
                    semisolids&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i79 ? 'checked' : '' }} name="i79">&nbsp;&nbsp;&nbsp;
                    solids&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i80 ? 'checked' : '' }} name="i80">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>Speech:</label>&nbsp;&nbsp;
                    not yet&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i81 ? 'checked' : '' }} name="i81">&nbsp;&nbsp;&nbsp;
                    improved&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i82 ? 'checked' : '' }} name="i82">&nbsp;&nbsp;&nbsp;
                    little-much&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i83 ? 'checked' : '' }} name="i83">&nbsp;&nbsp;&nbsp;
                    not improved&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i84 ? 'checked' : '' }} name="i84">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <label>6. PREVIOUS SPEECH THERAPY:</label>&nbsp;
                    <input readonly style="width: 40%;" type="text" value="{{ $report->i85 }}" name="i85">
                </div>
            </div>
            <div class="flex" style="margin-top: .5rem;justify-content: space-between;">
                <div>
                    <label>At age of:</label>&nbsp;
                    <input readonly style="width: 300px;" type="text" value="{{ $report->i86 }}" name="i86">
                </div>
                <div>
                    <label>Frequency: </label>&nbsp;
                    <input readonly type="text" value="{{ $report->i87 }}" name="i87">
                </div>
                <div>
                    <label>Duration:</label>&nbsp;
                    <input readonly type="text" value="{{ $report->i88 }}" name="i88">
                </div>
            </div>
            <div class="flex" style="margin-top: .5rem;justify-content: space-between;">
                <div>
                    <label>Effect: none</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i89 ? 'checked' : '' }} name="i89">
                </div>
                <div>
                    <label>Little: </label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i90 ? 'checked' : '' }} name="i90">
                </div>
                <div style="margin-right: 3rem;">
                    <label>Much:</label>&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" {{ $report->i91 ? 'checked' : '' }} name="i91">
                </div>
            </div>
        </div>

        <div class='conta'>


            <a class='dko' href="{{ route('protocol_of_nasality_evaluation.edit', $report->id) }}">تعديل</a>


            <div class='dko' name='btn4' onclick="printPage()">
                طباعة


            </div>
            <script>
                function printPage() {
                    // تعيين الخصائص للطباعة
                    var printOptions = {
                        scale: 0.8, // SCALE 80%
                        background: {
                            graphic: 'https://example.com/background-image.jpg', // background-graphic
                            display: 'print'
                        }
                    };

                    // تنفيذ طباعة الصفحة مع الإعدادات
                    window.print(printOptions);
                }
            </script>
            <style>
                @media print {
                    .bcont {
                        display: none !important;
                    }

                    aside {
                        display: none !important;
                    }

                    header {
                        display: none !important;
                    }

                    .inmain {
                        width: 95% !important;
                    }

                    .container {
                        width: 100% !important;
                    }

                    button {
                        display: none;
                    }

                    /* تعيين الصفحة للطباعة في وضع landscape */
                    @page {
                        size: landscape;
                    }
                }
            </style>



        </div>
</form>

</body>

</html>

<style>
    .conta {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        width: block;
    }

    button {
        margin: 20px;
        width: 15%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background: linear-gradient(0.25turn, #66AA3E, #92C641, #66AA3E);
        color: black;
        font-family: 'Droid Arabic Kufi', Arial, sans-serif;
        font-weight: bold;
        font-family: cairo;
    }






    header {
        position: fixed !important;
        width: 100% !important;
        top: 0px;
    }

    header,
    footer {
        text-align: center;
    }

    header,
    footer,
    aside,
    main {
        background-color: #f0f0f0;
    }

    header {
        height: 130px;
        background-color: #f0f0f0;
        display: flex !important;
        z-index: 100000;
        position: relative;
        box-shadow: 0 0 10px black;
        font-family: cairo;
    }

    .v {
        filter: unset !important;
    }

    .b1 {
        font-size: 18px;
        width: 100px;
        height: 130px;
        color: black;
        vertical-align: middle;
        clear: both;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.4s;
        -webkit-transition-duration: .4s;
        transition-duration: 0.4s;
        font-family: cairo;
    }

    .v {
        font-weight: bold;
        background-color: #f0f0f0;
        filter: drop-shadow(2px -10px 6px black);
    }

    .logoi {
        filter: unset !important;
    }

    .logoi {
        height: 90%;
        filter: drop-shadow(0px 0px 4px black);
    }

    img {
        width: 100%;
        height: auto;
    }

    user agent stylesheet img {
        overflow-clip-margin: content-box;
        overflow: clip;
    }

    .logo {
        justify-content: center;
        display: flex;
        left: calc(50% - 60px);
        position: absolute;
        height: 140px;
        width: 140px;
        z-index: 1;
    }

    body {
        margin-top: 20px;
        background-color: #f0f0f0;
    }
</style>