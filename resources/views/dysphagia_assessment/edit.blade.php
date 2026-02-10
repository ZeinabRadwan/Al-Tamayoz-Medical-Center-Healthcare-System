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

<form action="{{ route('dysphagia_assessment.update', $report->id) }}" method="Post">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h3 align="center">DYSPHAGIA ASSESSMENT</h3>
            <div style="margin-top: .5rem;">
                <div>
                    <span>Date:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i1', $report->i1) }}" name="i1">
                </div>
            </div>
            <div style="margin-top: .5rem;">
                <div>
                    <span>Cause of referral:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i2', $report->i2) }}" name="i2">
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
                    <input style="width: 40%;" type="text" value="{{ old('i3', $report->i3) }}" name="i3">
                </div>
                <div>
                    <span>Age:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i4', $report->i4) }}" name="i4">
                </div>
                <div>
                    <span>Sex:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i5', $report->i5) }}" name="i5">
                </div>
                <div>
                    <span>Residence:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i6', $report->i6) }}" name="i6">
                </div>
                <div>
                    <span>Education:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i7', $report->i7) }}" name="i7">
                </div>
                <div>
                    <span>Marital status:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('i8', $report->i8) }}" name="i8">
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
                    <input type="hidden" name="i9" value="0">
                    <input type="checkbox" value="1" name="i9" {{ old('i9', $report->i9) ? 'checked' : '' }}>&nbsp;&nbsp;
                    sudden after&nbsp;
                    <input type="hidden" name="i10" value="0">
                    <input type="checkbox" value="1" name="i10" {{ old('i10', $report->i10) ? 'checked' : '' }}>
                    <input type="text" value="{{ old('i11', $report->i11) }}" name="i11">
                </div>
                <div>
                    Course: permanent&nbsp;
                    <input type="hidden" name="i12" value="0">
                    <input type="checkbox" value="1" name="i12" {{ $report->i12 == 1 ? 'checked' : '' }}>&nbsp;&nbsp;
                    increasing&nbsp;
                    <input type="hidden" name="i13" value="0">
                    <input type="checkbox" value="1" name="i13" {{ old('i13', $report->i13) ? 'checked' : '' }}>&nbsp;&nbsp;
                    intermittent&nbsp;
                    <input type="hidden" name="i14" value="0">
                    <input type="checkbox" value="1" name="i14" {{ old('i14', $report->i14) ? 'checked' : '' }}>&nbsp;&nbsp;
                    decreasing&nbsp;
                    <input type="hidden" name="i15" value="0">
                    <input type="checkbox" value="1" name="i15" {{ old('i15', $report->i15) ? 'checked' : '' }}>
                </div>
                <div>
                    Difficulty in swallowing: yes &nbsp;
                    <input type="hidden" name="i16" value="0">
                    <input type="checkbox" value="1" name="i16" {{ old('i16', $report->i16) ? 'checked' : '' }}>&nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i17" value="0">
                    <input type="checkbox" value="1" name="i17" {{ old('i17', $report->i17) ? 'checked' : '' }}>&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    food&nbsp;
                    <input type="hidden" name="i18" value="0">
                    <input type="checkbox" value="1" name="i18" {{ old('i18', $report->i18) ? 'checked' : '' }}>&nbsp;&nbsp;
                    fluids&nbsp;
                    <input type="hidden" name="i19" value="0">
                    <input type="checkbox" value="1" name="i19" {{ old('i19', $report->i19) ? 'checked' : '' }}>&nbsp;&nbsp;
                    pills&nbsp;
                    <input type="hidden" name="i20" value="0">
                    <input type="checkbox" value="1" name="i20" {{ old('i20', $report->i20) ? 'checked' : '' }}>
                </div>
                <div>
                    Is difficulty in swallowing related to another disease?&nbsp;&nbsp; &nbsp;&nbsp;
                    Yes&nbsp;
                    <input type="hidden" name="i21" value="0">
                    <input type="checkbox" value="1" name="i21" {{ old('i21', $report->i21) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i22" value="0">
                    <input type="checkbox" value="1" name="i22" {{ old('i22', $report->i22) ? 'checked' : '' }}>&nbsp;&nbsp;
                    What?&nbsp;
                    <input type="text" value="{{ old('i23', $report->i23) }}" name="i23">
                </div>
                <div>
                    Coughing/chocking with food/fluids &nbsp;<input type="text" value="{{ old('i24', $report->i24) }}" name="i24">
                </div>
                <div>
                    Wearing dentures&nbsp;&nbsp; Yes&nbsp;&nbsp;
                    <input type="hidden" name="i25" value="0">
                    <input type="checkbox" value="1" name="i25" {{ old('i25', $report->i25) ? 'checked' : '' }}>&nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i26" value="0">
                    <input type="checkbox" value="1" name="i26" {{ old('i26', $report->i26) ? 'checked' : '' }}>
                </div>
                <div>
                    Feeling of food passing in the wrong path?&nbsp;&nbsp;
                    <input type="text" value="{{ old('i27', $report->i27) }}" name="i27">
                </div>
                <div>
                    Is there any special preparation of food?&nbsp;
                    <input type="hidden" name="i28" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i28" {{ old('i28', $report->i28) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i29" value="0">
                    <input type="checkbox" value="1" name="i29" {{ old('i29', $report->i29) ? 'checked' : '' }}>&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="{{ old('i30', $report->i30) }}" name="i30">
                </div>
                <div>
                    Is there any special food that you avoid?&nbsp;
                    <input type="hidden" name="i31" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i31" {{ old('i31', $report->i31) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i32" value="0">
                    <input type="checkbox" value="1" name="i32" {{ old('i32', $report->i32) ? 'checked' : '' }}>&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="{{ old('i33', $report->i33) }}" name="i33">
                </div>
                <div>
                    Does food stay in the mouth after swallowing?&nbsp;
                    <input type="hidden" name="i34" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i34" {{ old('i34', $report->i34) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i35" value="0">
                    <input type="checkbox" value="1" name="i35" {{ old('i35', $report->i35) ? 'checked' : '' }}>
                </div>
                <div>
                    Is there a problem of food containment in mouth?&nbsp;
                    <input type="hidden" name="i36" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i36" {{ old('i36', $report->i36) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i37" value="0">
                    <input type="checkbox" value="1" name="i37" {{ old('i37', $report->i37) ? 'checked' : '' }}>
                </div>
                <div>
                    Nasal regurgitation of food:&nbsp;
                    <input type="hidden" name="i38" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i38" {{ old('i38', $report->i38) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i39" value="0">
                    <input type="checkbox" value="1" name="i39" {{ old('i39', $report->i39) ? 'checked' : '' }}>.&nbsp;&nbsp;
                    fluids:&nbsp;
                    <input type="hidden" name="i40" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i40" {{ old('i40', $report->i40) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i41" value="0">
                    <input type="checkbox" value="1" name="i41" {{ old('i41', $report->i41) ? 'checked' : '' }}>&nbsp;&nbsp;
                </div>
                <div>
                    Cough related to food.&nbsp;
                    <input type="hidden" name="i42" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i42" {{ old('i42', $report->i42) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i43" value="0">
                    <input type="checkbox" value="1" name="i43" {{ old('i43', $report->i43) ? 'checked' : '' }}>
                </div>
                <div>
                    Factors increasing dysphagia?&nbsp;
                    <input type="hidden" name="i44" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i44" {{ old('i44', $report->i44) ? 'checked' : '' }}>&nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i45" value="0">
                    <input type="checkbox" value="1" name="i45" {{ old('i45', $report->i45) ? 'checked' : '' }}>&nbsp;&nbsp;
                    if yes specify&nbsp;
                    <input type="text" value="{{ old('i46', $report->i46) }}" name="i46">
                </div>
                <div>
                    Does change in position affect the dysphagia problem?&nbsp;
                    <input type="hidden" name="i47" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i47" {{ old('i47', $report->i47) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i48" value="0">
                    <input type="checkbox" value="1" name="i48" {{ old('i48', $report->i48) ? 'checked' : '' }}>
                </div>
                <div>
                    Change of voice:&nbsp;
                    <input type="hidden" name="i49" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i49" {{ old('i49', $report->i49) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i50" value="0">
                    <input type="checkbox" value="1" name="i50" {{ old('i50', $report->i50) ? 'checked' : '' }}>.&nbsp;&nbsp;
                    Throat dryness:&nbsp;
                    <input type="hidden" name="i51" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i51" {{ old('i51', $report->i51) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i52" value="0">
                    <input type="checkbox" value="1" name="i52" {{ old('i52', $report->i52) ? 'checked' : '' }}>.&nbsp;&nbsp;
                    Throat tenderness:&nbsp;
                    <input type="hidden" name="i53" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i53" {{ old('i53', $report->i53) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i54" value="0">
                    <input type="checkbox" value="1" name="i54" {{ old('i54', $report->i54) ? 'checked' : '' }}>
                </div>
                <div>
                    Respiratory problem?&nbsp;
                    <input type="hidden" name="i55" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i55" {{ old('i55', $report->i55) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i56" value="0">
                    <input type="checkbox" value="1" name="i56" {{ old('i56', $report->i56) ? 'checked' : '' }}>
                </div>
                <div>
                    Heart burn? &nbsp;
                    <input type="hidden" name="i57" value="0">

                    Yes&nbsp;<input type="checkbox" value="1" name="i57" {{ old('i57', $report->i57) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i58" value="0">
                    <input type="checkbox" value="1" name="i58" {{ old('i58', $report->i58) ? 'checked' : '' }}>
                </div>
                <div>
                    Bowel habits ?&nbsp;
                    <input type="hidden" name="i59" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i59" {{ old('i59', $report->i59) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i60" value="0">
                    <input type="checkbox" value="1" name="i60" {{ old('i60', $report->i60) ? 'checked' : '' }}>
                </div>
                <div>
                    History of any swallowing problems?&nbsp;
                    <input type="hidden" name="i61" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i61" {{ old('i61', $report->i61) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i62" value="0">
                    <input type="checkbox" value="1" name="i62" {{ old('i62', $report->i62) ? 'checked' : '' }}>
                </div>
                <div>
                    Tracheostomy tube?&nbsp;
                    <input type="hidden" name="i63" value="0">
                    Yes&nbsp;<input type="checkbox" value="1" name="i63" {{ old('i63', $report->i63) ? 'checked' : '' }}> &nbsp;&nbsp;
                    no&nbsp;
                    <input type="hidden" name="i64" value="0">
                    <input type="checkbox" value="1" name="i64" {{ old('i64', $report->i64) ? 'checked' : '' }}>
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
                    <input type="text" value="{{ old('i65', $report->i65) }}" name="i65">
                </div>
                <div>
                    Drugs taken:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i66', $report->i66) }}" name="i66">
                </div>
                <div>
                    Smoking:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i67', $report->i67) }}" name="i67">
                </div>
                <div>
                    Hyperacidity / reflux:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i68', $report->i68) }}" name="i68">
                </div>
                <div>
                    Allergic tendencies:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i69', $report->i69) }}" name="i69">
                </div>
                <div>
                    Surgical intervention and trauma:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i70', $report->i70) }}" name="i70">
                </div>
                <div>
                    History of aspiration pneumonia:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i71', $report->i71) }}" name="i71">
                </div>
                <div>
                    Recurrent chest infection:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i72', $report->i72) }}" name="i72">
                </div>
                <div>
                    Weight loss:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i73', $report->i73) }}" name="i73">
                </div>
                <div>
                    History of any swallowing problems:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i74', $report->i74) }}" name="i74">
                </div>
                <div>
                    History of tracheostomy tube:&nbsp;&nbsp;
                    <input type="text" value="{{ old('i75', $report->i75) }}" name="i75">
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h4>BEDSIDE SWALLOWING EXAMINATION:</h4>
            <ul>
                <li>
                    <h4>PREFEEDING ASSESSMENT (OME):&nbsp;&nbsp;<input type="text" value="{{ old('i76', $report->i76) }}" name="i76"></h4>
                </li>
            </ul>
            <label>Structure:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i77" value="0">
                <input type="checkbox" value="1" name="i77" {{ old('i77', $report->i77) ? 'checked' : '' }}>&nbsp;dentures <br>
                <input type="hidden" name="i78" value="0">
                <input type="checkbox" value="1" name="i78" {{ old('i78', $report->i78) ? 'checked' : '' }}>&nbsp;caries <br>
                <input type="hidden" name="i79" value="0">
                <input type="checkbox" value="1" name="i79" {{ old('i79', $report->i79) ? 'checked' : '' }}>&nbsp;decay <br>
                <input type="hidden" name="i80" value="0">
                <input type="checkbox" value="1" name="i80" {{ old('i80', $report->i80) ? 'checked' : '' }}>&nbsp;missing teeth
            </div>
            <div>
                <label>Awareness:</label>&nbsp;
                <input type="text" value="{{ old('i81', $report->i81) }}" name="i81">
            </div>
            <label>Control of secretions:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i82" value="0">
                <input type="checkbox" value="1" name="i82" {{ old('i82', $report->i82) ? 'checked' : '' }}>&nbsp;drooling <br>
                <input type="hidden" name="i83" value="0">
                <input type="checkbox" value="1" name="i83" {{ old('i83', $report->i83) ? 'checked' : '' }}>&nbsp;excess secretions in mouth <br>
                <input type="hidden" name="i84" value="0">
                <input type="checkbox" value="1" name="i84" {{ old('i84', $report->i84) ? 'checked' : '' }}>&nbsp;Jaw control
            </div>
            <label>Control of secretions:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i85" value="0">
                <input type="checkbox" value="1" name="i85" {{ old('i85', $report->i85) ? 'checked' : '' }}>&nbsp;lip closure at rest <br>
                <input type="hidden" name="i86" value="0">
                <input type="checkbox" value="1" name="i86" {{ old('i86', $report->i86) ? 'checked' : '' }}>&nbsp;lip spreading and rounding /i//u/ <br>
                <input type="hidden" name="i87" value="0">
                <input type="checkbox" value="1" name="i87" {{ old('i87', $report->i87) ? 'checked' : '' }}>&nbsp;symmetry <br>
                <input type="hidden" name="i88" value="0">
                <input type="checkbox" value="1" name="i88" {{ old('i88', $report->i88) ? 'checked' : '' }}>&nbsp;lip smacking
            </div>
            <label>Lingual function:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i89" value="0">
                <input type="checkbox" value="1" name="i89" {{ old('i89', $report->i89) ? 'checked' : '' }}>&nbsp;protrusion <br>
                <input type="hidden" name="i90" value="0">
                <input type="checkbox" value="1" name="i90" {{ old('i90', $report->i90) ? 'checked' : '' }}>&nbsp;lick <br>
                <input type="hidden" name="i91" value="0">
                <input type="checkbox" value="1" name="i91" {{ old('i91', $report->i91) ? 'checked' : '' }}>&nbsp;Lateralization <br>
                <input type="hidden" name="i92" value="0">
                <input type="checkbox" value="1" name="i92" {{ old('i92', $report->i92) ? 'checked' : '' }}>&nbsp;elevation of back & tip
            </div>
            <label>Velar function</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i93" value="0">
                <input type="checkbox" value="1" name="i93" {{ old('i93', $report->i93) ? 'checked' : '' }}>&nbsp;/a/ <br>
                <input type="hidden" name="i94" value="0">
                <input type="checkbox" value="1" name="i94" {{ old('i94', $report->i94) ? 'checked' : '' }}>&nbsp;symmetry.
            </div>
            <label>Resonance:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i95" value="0">
                <input type="checkbox" value="1" name="i95" {{ old('i95', $report->i95) ? 'checked' : '' }}>&nbsp;N <br>
                <input type="hidden" name="i96" value="0">
                <input type="checkbox" value="1" name="i96" {{ old('i96', $report->i96) ? 'checked' : '' }}>&nbsp;Hyponasal <br>
                <input type="hidden" name="i97" value="0">
                <input type="checkbox" value="1" name="i97" {{ old('i97', $report->i97) ? 'checked' : '' }}>&nbsp;Hypernasal
            </div>
            <label>Reflexes:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i98" value="0">
                <input type="checkbox" value="1" name="i98" {{ old('i98', $report->i98) ? 'checked' : '' }}>&nbsp;Swallow response:&nbsp;&nbsp;&nbsp;
                +ve.&nbsp;
                <input type="hidden" name="i99" value="0">
                <input type="checkbox" value="1" name="i99" {{ old('i99', $report->i99) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="i100" value="0">
                -ve<input type="checkbox" value="1" name="i100" {{ old('i100', $report->i100) ? 'checked' : '' }}> <br>

                <input type="hidden" name="i123" value="0">
                <input type="checkbox" value="1" name="i123" {{ old('i123', $report->i123) ? 'checked' : '' }}>&nbsp;Gag reflex.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
                <input type="hidden" name="i101" value="0">
                +ve.&nbsp;<input type="checkbox" value="1" name="i101" {{ old('i101', $report->i101) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="i102" value="0">
                -ve<input type="checkbox" value="1" name="i102" {{ old('i102', $report->i102) ? 'checked' : '' }}> <br>
            </div>
            <label>Speech ineligibility:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i103" value="0">
                <input type="checkbox" value="1" name="i103" {{ old('i103', $report->i103) ? 'checked' : '' }}>&nbsp;N <br>
                <input type="hidden" name="i104" value="0">
                <input type="checkbox" value="1" name="i104" {{ old('i104', $report->i104) ? 'checked' : '' }}>&nbsp;Dysarthia <br>
                <input type="hidden" name="i105" value="0">
                <input type="checkbox" value="1" name="i105" {{ old('i105', $report->i105) ? 'checked' : '' }}>&nbsp;Aphasia.
            </div>
            <label>Diadchokinesia. </label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i106" value="0">
                <input type="checkbox" value="1" name="i106" {{ old('i106', $report->i106) ? 'checked' : '' }}>&nbsp;/ptkptk/
            </div>
            <label>APA:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i107" value="0">
                <input type="checkbox" value="1" name="i107" {{ old('i107', $report->i107) ? 'checked' : '' }}>&nbsp;GRBAS &nbsp;&nbsp;
                <input type="text" value="{{ old('i108', $report->i108) }}" name="i108">
            </div>
            <div style="margin-left: 1rem;">
                Glottal attack: <br>
                <input type="hidden" name="i109" value="0">
                <input type="checkbox" value="1" name="i109" {{ old('i109', $report->i109) ? 'checked' : '' }}>&nbsp;N <br>
                <input type="hidden" name="i110" value="0">
                <input type="checkbox" value="1" name="i110" {{ old('i110', $report->i110) ? 'checked' : '' }}>&nbsp;Soft <br>
                <input type="hidden" name="i111" value="0">
                <input type="checkbox" value="1" name="i111" {{ old('i111', $report->i111) ? 'checked' : '' }}>&nbsp;Hard
            </div>
            <label>Cognition:</label>
            <div style="margin-left: 1rem;">
                <input type="hidden" name="i112" value="0">
                <input type="checkbox" value="1" name="i112" {{ old('i112', $report->i112) ? 'checked' : '' }}>&nbsp;Orientation to day / date / place. <br>
                <input type="hidden" name="i113" value="0">
                <input type="checkbox" value="1" name="i113" {{ old('i113', $report->i113) ? 'checked' : '' }}>&nbsp;Follow instructions.
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <ul>
                <li style="font-weight: bolder;">INITIAL SWALLOWOWING EXAMINATION:</li>
            </ul>
            <div>
                Reduced alertness&nbsp;
                <input type="hidden" name="i114" value="0">
                <input type="checkbox" value="1" name="i114" {{ old('i114', $report->i114) ? 'checked' : '' }}>&nbsp;&nbsp;
                absent swallow&nbsp;
                <input type="hidden" name="i115" value="0">
                <input type="checkbox" value="1" name="i115" {{ old('i115', $report->i115) ? 'checked' : '' }}>&nbsp;&nbsp;
                absent productive cough&nbsp;
                <input type="hidden" name="i116" value="0">
                <input type="checkbox" value="1" name="i116" {{ old('i116', $report->i116) ? 'checked' : '' }}>&nbsp;&nbsp;
                difficulty handling secretions&nbsp;
                <input type="hidden" name="i117" value="0">
                <input type="checkbox" value="1" name="i117" {{ old('i117', $report->i117) ? 'checked' : '' }}>&nbsp;&nbsp; <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                pharyngeal movement during swallow
                <input type="hidden" name="i118" value="0">
                <input type="checkbox" value="1" name="i118" {{ old('i118', $report->i118) ? 'checked' : '' }}>
            </div>
            <ul style="display: flex;gap: .5rem;flex-direction: column;">
                <li style="font-weight: bolder;">TRIAL OF WATER TEST &nbsp;&nbsp;&nbsp;&nbsp;+/-<input style="width: 40%;" type="text" value="{{ old('i119', $report->i119) }}" name="i119"></li>
                <li style="font-weight: bolder;">Observation Of Eating: comment &nbsp;&nbsp;<input style="width: 50%;" type="text" value="{{ old('i120', $report->i120) }}" name="i120"></li>
            </ul>
            <label>INSTRUMENTAL EXAMINATION:</label>
            <div style="margin-bottom: .5rem;">
                <label>FEES:</label>&nbsp;
                <input type="text" value="{{ old('i121', $report->i121) }}" name="i121">&nbsp;&nbsp;
            </div>
            <div>
                <label>VFSS:</label>&nbsp;
                <input type="text" value="{{ old('i122', $report->i122) }}" name="i122">&nbsp;&nbsp;
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