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

        .input -none {
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

<form action="{{ route('case_number.update', $report->id) }}" method="Post">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h3 align="center">
                <u>Case Number</u>
            </h3>
            <div class="flex">
                <span>Name: </span> &nbsp;
                <input class="w-half" type="text" value="{{ $report->name }}" name="name" id="name">
            </div><br>
            <div class="flex">
                <span>Age: </span> &nbsp;
                <input type="number" value="{{ $report->age }}" name="age">
            </div>
            <div style="padding: 1rem;">
                <span>Sex: </span> &nbsp;<br>
                <ul>
                    <li>

                        <input type="radio" name="sex" value="M" {{ old('sex', $report->sex) == 'M' ? 'checked' : '' }}> M
                    </li>
                    <li>

                        <input type="radio" name="sex" value="F" {{ old('sex', $report->sex) == 'F' ? 'checked' : '' }}> F
                    </li>
                </ul>
            </div>
            <div style="width: 70%;" class="row">
                <div class="flex">
                    <span>Pregnancy</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->pregnancy }}" name="pregnancy">
                </div>
                <div class="flex">
                    <span>Consanguinity</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->consanguinity }}" name="consanguinity">
                </div>
                <div class="flex">
                    <span class="flex"><span>Siblings</span>&nbsp;<span>similar</span>&nbsp;<span>conditions</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->siblings_conditions }}" name="siblings_conditions">
                </div>
                <div class="flex">
                    <span class="flex"><span>Main</span>&nbsp; <span>dx</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->main_dx }}" name="main_dx">
                </div>
                <div class="flex">
                    <span>Term:</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->term }}" name="term">
                </div>
                <ul>
                    <li>NICU&nbsp;
                        <input type="hidden" name="nicu" value="0">
                        <input type="checkbox" value="1" name="nicu" {{ $report->nicu ? 'checked' : '' }}>
                    </li>
                    <li>Cyanosis&nbsp;
                        <input type="hidden" name="cyanosis" value="0">
                        <input type="checkbox" value="1" name="cyanosis" {{ $report->cyanosis ? 'checked' : '' }}>
                    </li>
                    <li>Jaundice&nbsp;
                        <input type="hidden" name="jaundice" value="0">
                        <input type="checkbox" value="1" name="jaundice" {{ $report->jaundice ? 'checked' : '' }}>
                    </li>
                </ul>
                <div class="flex">
                    <span class="flex"><span>Feeding</span>&nbsp;<span>at</span>&nbsp;<span>birth</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->feeding_at_birth }}" name="feeding_at_birth">
                </div>
                <div class="flex">
                    <span><span>Start</span>&nbsp;<span>of</span>&nbsp;<span>solid</span>&nbsp;<span>feeds</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->solid_feeds_start }}" name="solid_feeds_start">
                </div>
            </div>
            <h5><u>FOIS:</u></h5>
            <h5><u>Tube dependent (1-3)</u></h5>
            <ul>
                <li> 1 no oral intake&nbsp;
                    <input type="hidden" name="tube_dependent_1" value="0">
                    <input type="checkbox" value="1" name="tube_dependent_1" {{ $report->tube_dependent_1 ? 'checked' : '' }}>
                </li>
                <li>2 tube dependent with minimal/ inconsistent oral intake&nbsp;
                    <input type="hidden" name="tube_dependent_2" value="0">
                    <input type="checkbox" value="1" name="tube_dependent_2" {{ $report->tube_dependent_2 ? 'checked' : '' }}>
                </li>
                <li>3 tube supplements with consistent oral intake&nbsp;
                    <input type="hidden" name="tube_dependent_3" value="0">
                    <input type="checkbox" value="1" name="tube_dependent_3" {{ $report->tube_dependent_3 ? 'checked' : '' }}>
                </li>
            </ul>
            <h5><u>Oral feeding (4-7)</u></h5>
            <ul>
                <li> 4 total oral intake of single consistency&nbsp;
                    <input type="hidden" name="oral_feeding_4" value="0">
                    <input type="checkbox" value="1" name="oral_feeding_4" {{ $report->oral_feeding_4 ? 'checked' : '' }}>
                </li>
                <li>5 total oral intake of multiple consistencies&nbsp;
                    <input type="hidden" name="oral_feeding_5" value="0">
                    <input type="checkbox" value="1" name="oral_feeding_5" {{ $report->oral_feeding_5 ? 'checked' : '' }}>
                </li>
                <li>6 total oral intake with no special preparation, but must avoid specific foods or liquid items&nbsp;
                    <input type="hidden" name="oral_feeding_6" value="0">
                    <input type="checkbox" value="1" name="oral_feeding_6" {{ $report->oral_feeding_6 ? 'checked' : '' }}>
                </li>
                <li>7 total oral intake with no restrictions&nbsp;
                    <input type="hidden" name="oral_feeding_7" value="0">
                    <input type="checkbox" value="1" name="oral_feeding_7" {{ $report->oral_feeding_7 ? 'checked' : '' }}>
                </li>
            </ul>
            <div style="width: 70%;" class="row">
                <div class="flex">
                    <span class="flex"><span>Textures</span>&nbsp;<span>eaten</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->textures_eaten }}" name="textures_eaten">
                </div>
                <div class="flex">
                    <span class="flex"><span>History</span>&nbsp;<span>of</span>&nbsp;<span>last</span>&nbsp;<span>day</span>&nbsp;<span>feeds</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->last_day_feeds }}" name="last_day_feeds">
                </div>
                <div class="flex">
                    <span class="flex"> <span>MCH</span>&nbsp;<span>score</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->mch_score }}" name="mch_score">
                </div>
                <div class="flex">
                    <span><span>EAT</span>&nbsp;<span>10</span>&nbsp;<span>score</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->eat10_score }}" name="eat10_score">
                </div>
                <div class="flex">
                    <span><span>Symptom</span>&nbsp;<span>of</span>&nbsp;<span>respiratory</span>&nbsp;<span>problem</span>&nbsp;</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->respiratory_symptom }}" name="respiratory_symptom">
                </div>
            </div>
            <h4><u>Head and neck examination:</u></h4>
            <h5><u>Masses</u></h5>
            <ul>
                <li> +ve&nbsp;
                    <input type="hidden" name="masses_positive" value="0">
                    <input type="checkbox" value="1" name="masses_positive" {{ $report->masses_positive ? 'checked' : '' }}>
                </li>
                <li>-ve&nbsp;
                    <input type="hidden" name="masses_negative" value="0">
                    <input type="checkbox" value="1" name="masses_negative" {{ $report->masses_negative ? 'checked' : '' }}>
                </li>
            </ul>
        </div>
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h5><u>Engorged veins</u></h5>
            <ul>
                <li> +ve&nbsp;
                    <input type="hidden" name="engorged_veins_positive" value="0">
                    <input type="checkbox" value="1" name="engorged_veins_positive" {{ $report->engorged_veins_positive ? 'checked' : '' }}>
                </li>
                <li>-ve&nbsp;
                    <input type="hidden" name="engorged_veins_negative" value="0">
                    <input type="checkbox" value="1" name="engorged_veins_negative" {{ $report->engorged_veins_negative ? 'checked' : '' }}>
                </li>
            </ul>
            <div style="width: 70%;" class="row">
                <div class="flex">
                    <span>Duration</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->duration }}" name="duration">
                </div>
                <div class="flex">
                    <span>Cause</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->cause }}" name="cause">
                </div>
                <h5 style="margin: 0;"><u>Upper airway exam: </u></h5>
                <div class="flex">
                    <span>Nose</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->nose }}" name="nose">
                </div>
                <div class="flex">
                    <span>Nasopharynx</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->nasopharynx }}" name="nasopharynx">
                </div>
                <div class="flex">
                    <span class="flex"><span>Oral</span>&nbsp;<span>cavity</span></span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->oral_cavity }}" name="oral_cavity">
                </div>
                <div class="flex">
                    <span>Larynx</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->larynx }}" name="larynx">
                </div>
                <h5 style="margin: 0;"><u>Instrumental assessment of upper and lower airway</u></h5>
                <div class="flex">
                    <span>Endoscopy</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->endoscopy }}" name="endoscopy">
                </div>
                <div class="flex">
                    <span>Radiology</span>&nbsp;
                    <input class="w-full" type="text" value="{{ $report->radiology }}" name="radiology">
                </div>
            </div>
        </div>
        <div class='conta'>

            <button type="submit">
                حفظ
            </button>
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