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

        .input-none {
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

<form action="{{ route('dysphagia_assessment.store') }}" method="Post">
    @csrf

    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    <input type="hidden" name="template_id" value="{{ $template->id }}">

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h3 align="center">DYSPHAGIA ASSESSMENT</h3>
            <div style="margin-top: .5rem;">
                <div>
                    <span>Date:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i1">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <span>Cause of referral:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i2">
                </div>
            </div>
            <ul>
                <li style="font-weight: bolder;">
                    PERSONAL DATA:
                </li>
            </ul>
            <div class="row" style="margin-top: .5rem;gap: .5rem;">
                <div>
                    <span>Name:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i3">
                </div>
                <div>
                    <span>Age:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i4">
                </div>
                <div>
                    <span>Sex:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i5">
                </div>
                <div>
                    <span>Residence:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i6">
                </div>
                <div>
                    <span>Education:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i7">
                </div>
                <div>
                    <span>Marital status:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="" name="i8">
                </div>
            </div>
            <ul>
                <li style="font-weight: bolder;">
                    COMPLAINT AND ANALYSIS OF SYMPTOMS:
                </li>
            </ul>
            <div class="row" style="margin-top: .5rem;gap: .5rem;">
                <div>
                    Onset of problem:&nbsp;&nbsp;
                    gradual&nbsp;
                    <input type="checkbox" value="1" name="i9">&nbsp;&nbsp;
                    sudden after&nbsp; <input type="checkbox" value="1" name="i10">
                    <input type="text" value="" name="i11">
                </div>
                <div>
                    Course: permanent&nbsp;<input type="checkbox" value="1" name="i12">&nbsp;&nbsp;
                    increasing&nbsp;
                    <input type="checkbox" value="1" name="i13">&nbsp;&nbsp;
                    intermittent&nbsp; <input type="checkbox" value="1" name="i14">&nbsp;&nbsp;
                    decreasing&nbsp; <input type="checkbox" value="1" name="i15">
                </div>
                <div>
                    Difficulty in swallowing: yes &nbsp;<input type="checkbox" value="1" name="i16">&nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i17">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    food&nbsp; <input type="checkbox" value="1" name="i18">&nbsp;&nbsp;
                    fluids&nbsp; <input type="checkbox" value="1" name="i19">&nbsp;&nbsp;
                    pills&nbsp; <input type="checkbox" value="1" name="i20">
                </div>
                <div>
                    Is difficulty in swallowing related to another disease?&nbsp;&nbsp; &nbsp;&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i21"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i22">&nbsp;&nbsp;
                    What?&nbsp;
                    <input type="text" value="" name="i23">
                </div>
                <div>
                    Coughing/chocking with food/fluids &nbsp;<input type="text" value="" name="i24">
                </div>
                <div>
                    Wearing dentures&nbsp;&nbsp; Yes&nbsp;&nbsp; <input type="checkbox" value="1" name="i25">&nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i26">
                </div>
                <div>
                    Feeling of food passing in the wrong path?&nbsp;&nbsp;
                    <input type="text" value="" name="i27">
                </div>
                <div>
                    Is there any special preparation of food?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i28"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i29">&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="" name="i30">
                </div>
                <div>
                    Is there any special food that you avoid?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i31"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i32">&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="" name="i33">
                </div>
                <div>
                    Does food stay in the mouth after swallowing?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i34"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i35">
                </div>
                <div>
                    Is there a problem of food containment in mouth?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i36"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i37">
                </div>
                <div>
                    Nasal regurgitation of food:&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i38"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i39">.&nbsp;&nbsp;
                    fluids:&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i40"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i41">&nbsp;&nbsp;
                </div>
                <div>
                    Cough related to food.&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i42"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i43">
                </div>
                <div>
                    Factors increasing dysphagia?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i44"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i45">&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="" name="i46">
                </div>
                <div>
                    Does change in position affect the dysphagia problem?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i47"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i48">
                </div>
                <div>
                    Change of voice:&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i49"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i50">.&nbsp;&nbsp;
                    Throat dryness:&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i51"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i52">.&nbsp;&nbsp;
                    Throat tenderness:&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i53"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i54">
                </div>
                <div>
                    Respiratory problem?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i55"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i56">
                </div>
                <div>
                    Heart burn? &nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i57"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i58">
                </div>
                <div>
                    Bowel habits ?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i59"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i60">
                </div>
                <div>
                    History of any swallowing problems?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i61"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i62">
                </div>
                <div>
                    Tracheostomy tube?&nbsp;
                    Yes&nbsp;<input type="checkbox" value="1" name="i63"> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="checkbox" value="1" name="i64">
                </div>
            </div>
            <ul>
                <li style="font-weight: bolder;">
                    PAST HISTORY:
                </li>
            </ul>
            <div class="row" style="margin-top: .5rem;gap: .5rem;">
                <div>
                    Other medical problems: DM/HTN/stroke history.&nbsp;&nbsp;
                    <input type="text" value="" name="i65">
                </div>
                <div>
                    Drugs taken:&nbsp;&nbsp;
                    <input type="text" value="" name="i66">
                </div>
                <div>
                    Smoking:&nbsp;&nbsp;
                    <input type="text" value="" name="i67">
                </div>
                <div>
                    Hyperacidity / reflux:&nbsp;&nbsp;
                    <input type="text" value="" name="i68">
                </div>
                <div>
                    Allergic tendencies:&nbsp;&nbsp;
                    <input type="text" value="" name="i69">
                </div>
                <div>
                    Surgical intervention and trauma:&nbsp;&nbsp;
                    <input type="text" value="" name="i70">
                </div>
                <div>
                    History of aspiration pneumonia:&nbsp;&nbsp;
                    <input type="text" value="" name="i71">
                </div>
                <div>
                    Recurrent chest infection:&nbsp;&nbsp;
                    <input type="text" value="" name="i72">
                </div>
                <div>
                    Weight loss:&nbsp;&nbsp;
                    <input type="text" value="" name="i73">
                </div>
                <div>
                    History of any swallowing problems:&nbsp;&nbsp;
                    <input type="text" value="" name="i74">
                </div>
                <div>
                    History of tracheostomy tube:&nbsp;&nbsp;
                    <input type="text" value="" name="i75">
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h4>BEDSIDE SWALLOWING EXAMINATION:</h4>
            <ul>
                <li>
                    <h4>PREFEEDING ASSESSMENT (OME):&nbsp;&nbsp;<input type="text" value="" name="i76"></h4>
                </li>
            </ul>
            <label>Structure:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i77">&nbsp;dentures <br>
                <input type="checkbox" value="1" name="i78">&nbsp;caries <br>
                <input type="checkbox" value="1" name="i79">&nbsp;decay <br>
                <input type="checkbox" value="1" name="i80">&nbsp;missing teeth
            </div>
            <div>
                <label>Awareness:</label>&nbsp;
                <input type="text" value="" name="i81">
            </div>
            <label>Control of secretions:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i82">&nbsp;drooling <br>
                <input type="checkbox" value="1" name="i83">&nbsp;excess secretions in mouth <br>
                <input type="checkbox" value="1" name="i84">&nbsp;Jaw control
            </div>
            <label>Control of secretions:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i85">&nbsp;lip closure at rest <br>
                <input type="checkbox" value="1" name="i86">&nbsp;lip spreading and rounding /i//u/ <br>
                <input type="checkbox" value="1" name="i87">&nbsp;symmetry <br>
                <input type="checkbox" value="1" name="i88">&nbsp;lip smacking
            </div>
            <label>Lingual function:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i89">&nbsp;protrusion <br>
                <input type="checkbox" value="1" name="i90">&nbsp;lick <br>
                <input type="checkbox" value="1" name="i91">&nbsp;Lateralization <br>
                <input type="checkbox" value="1" name="i92">&nbsp;elevation of back & tip
            </div>
            <label>Velar function</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i93">&nbsp;/a/ <br>
                <input type="checkbox" value="1" name="i94">&nbsp;symmetry.
            </div>
            <label>Resonance:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i95">&nbsp;N <br>
                <input type="checkbox" value="1" name="i96">&nbsp;Hyponasal <br>
                <input type="checkbox" value="1" name="i97">&nbsp;Hypernasal
            </div>
            <label>Reflexes:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i98">&nbsp;Swallow response:&nbsp;&nbsp;&nbsp;
                +ve.&nbsp;<input type="checkbox" value="1" name="i99">&nbsp;&nbsp;&nbsp;&nbsp;
                -ve<input type="checkbox" value="1" name="i100"> <br>
                <input type="checkbox" value="1" name="i123">&nbsp;Gag reflex.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                +ve.&nbsp;<input type="checkbox" value="1" name="i101">&nbsp;&nbsp;&nbsp;&nbsp;
                -ve<input type="checkbox" value="1" name="i102"> <br>
            </div>
            <label>Speech ineligibility:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i103">&nbsp;N <br>
                <input type="checkbox" value="1" name="i104">&nbsp;Dysarthia <br>
                <input type="checkbox" value="1" name="i105">&nbsp;Aphasia.
            </div>
            <label>Diadchokinesia. </label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i106">&nbsp;/ptkptk/
            </div>
            <label>APA:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i107">&nbsp;GRBAS &nbsp;&nbsp;
                <input type="text" value="" name="i108">
            </div>
            <div style="margin-left: 1rem;">
                Glottal attack: <br>
                <input type="checkbox" value="1" name="i109">&nbsp;N <br>
                <input type="checkbox" value="1" name="i110">&nbsp;Soft <br>
                <input type="checkbox" value="1" name="i111">&nbsp;Hard
            </div>
            <label>Cognition:</label>
            <div style="margin-left: 1rem;">
                <input type="checkbox" value="1" name="i112">&nbsp;Orientation to day / date / place. <br>
                <input type="checkbox" value="1" name="i113">&nbsp;Follow instructions.
            </div>

        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <ul>
                <li style="font-weight: bolder;">INITIAL SWALLOWOWING EXAMINATION:</li>
            </ul>
            <div>
                Reduced alertness&nbsp;
                <input type="checkbox" value="1" name="i114">&nbsp;&nbsp;
                absent swallow&nbsp;
                <input type="checkbox" value="1" name="i115">&nbsp;&nbsp;
                absent productive cough&nbsp;
                <input type="checkbox" value="1" name="i116">&nbsp;&nbsp;
                difficulty handling secretions&nbsp;
                <input type="checkbox" value="1" name="i117">&nbsp;&nbsp; <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                pharyngeal movement during swallow
                <input type="checkbox" value="1" name="i118">
            </div>
            <ul style="display: flex;gap: .5rem;flex-direction: column;">
                <li style="font-weight: bolder;">TRIAL OF WATER TEST &nbsp;&nbsp;&nbsp;&nbsp;+/-<input style="width: 40%;" type="text" value="" name="i119"></li>
                <li style="font-weight: bolder;">Observation Of Eating: comment &nbsp;&nbsp;<input style="width: 50%;" type="text" value="" name="i120"></li>
            </ul>
            <label>INSTRUMENTAL EXAMINATION:</label>
            <div style="margin-bottom: .5rem;">
                <label>FEES:</label>&nbsp;
                <input type="text" value="" name="i121">&nbsp;&nbsp;
            </div>
            <div>
                <label>VFSS:</label>&nbsp;
                <input type="text" value="" name="i122">&nbsp;&nbsp;
            </div>
        </div>

        <div class='conta'>
            <button name='btn3' type="submit"> حفظ</button>




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