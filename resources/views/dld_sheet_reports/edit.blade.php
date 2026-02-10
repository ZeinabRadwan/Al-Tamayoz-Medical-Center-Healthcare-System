<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="vv0all.css">
<title>DLD Sheet Report</title>

 
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
        gap: 0.3rem;
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

    @media only screen and (max-width: 768px) {
        header {
            flex-direction: column;
            align-items: center;
            height: auto;
        }

        .logo {
            position: static;
            margin-bottom: 1rem;
            height: 100px;
            width: 100px;
        }

        .acc {
            display: none;
        }

        body {
            margin-top: 0;
            padding: 1rem;
        }

        .flex {
            flex-direction: column;
            gap: 0.5rem;
            justify-content: flex-start;
        }

        .flex input {
            width: 100%;
        }

        .row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .Subjective_Assessment_con {
            padding: 1rem;
            width: 100%;
        }

        .container,
        .size-fit {
            width: 100%;
            padding: 1rem;
        }

        table {
            font-size: 0.8rem;
        }

        th,
        td {
            padding: 4px;
        }

        button {
            width: 100%;
            margin: 0.5rem 0;
        }
    }

    @media only screen and (max-width: 480px) {

        h2,
        h3 {
            font-size: 1rem;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .flex input {
            width: 100%;
        }

        .Subjective_Assessment_con {
            padding: 0.5rem;
        }
    }
</style>

<form action="{{ route('dld_sheet_reports.update', $report->id) }}" method="Post">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 11px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>DLD sheet</u></h2>
            <div class="flex" style="justify-content: space-between;">
                <div class="flex">
                    Name:&nbsp;<input type="text" value="  {{ $report->name }}" " name=" name">
                </div>
                <div class="flex">
                    Age:&nbsp;<input type="number" style="width: 50px;" value=" {{ $report->age }}
                    " name="age">
                </div>
                <div class="flex">
                    Residence:&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->residence }}
                    " name="residence">
                </div>
                <div class="flex">
                    <span class="flex"><span>School/KG:</span></span> &nbsp;<input style="width: 50px;"
                        type="text" value="    {{ $report->school_or_kg }}
                        " name="school_or_kg">
                </div>
                <div class="flex">
                    <span class="flex"><span>Socioeconomic state:</span></span> &nbsp;<input
                        style="width: 90px;" type="text" value="
                            {{ $report->socioeconomic_state }}
                        " name="socioeconomic_state">
                </div>
                <div class="flex">
                    Consanguinity:&nbsp;<input type="text" value="
                        {{ $report->consanguinity }}
                    " name="consanguinity">
                </div>
            </div>
            <div class="flex" style="justify-content: space-evenly;margin-top: .5rem;">
                <div class="flex">
                    <span class="flex"><span>Age,Education,Occupation:</span></span><input type="text" value="  {{ $report->age_education_occupation }}
                    " name="age_education_occupation">
                </div>
                <div class="flex">
                    Mother:&nbsp;<input type="text" value="
                    {{ $report->mother }}
                    " name="mother">
                </div>
                <div class="flex">
                    Father:&nbsp;<input type="text" value="
                    {{ $report->father }}
                    " name="father">
                </div>
                <div class="flex">
                    <span>History of similar conditions</span> &nbsp;<input type="text" value="
                        {{ $report->history }}
                    " name="history">
                </div>
            </div>
            <h3><u>COMPLAINT,PRESENT HISTORY:</u></h3>
            <div class="flex" style="justify-content: space-between; margin-bottom: .5rem;">
                <div>A)LANGUAGE</div>
                <div>
                    <div>
                        Impaired comprehension&nbsp;
                        <input type="hidden" value="0" name="i1">
                        <input type="checkbox" value="1" name="i1"
                            {{ $report->i1 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Unintelligibility of speech&nbsp;
                        <input type="hidden" value="0" name="i2">
                        <input type="checkbox" value="1" name="i2"
                            {{ $report->i2 == 1 ? 'checked' : '' }}>
                    </div>

                    <div>
                        Limited vocabulary&nbsp;
                        <input type="hidden" value="0" name="i3">
                        <input type="checkbox" value="1" name="i3"
                            {{ $report->i3 == 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <div>
                    <div>
                        Jargon&nbsp;
                        <input type="hidden" value="0" name="i4">
                        <input type="checkbox" value="1" name="i4"
                            {{ $report->i4 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        preservation&nbsp;
                        <input type="hidden" value="0" name="i5">
                        <input type="checkbox" value="1" name="i5"
                            {{ $report->i5 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Non verbal&nbsp;
                        <input type="hidden" value="0" name="i6">
                        <input type="checkbox" value="1" name="i6"
                            {{ $report->i6 == 1 ? 'checked' : '' }}>
                    </div>

                </div>
                <div>
                    <div>
                        Loss of previous acquired vocabulary&nbsp;
                        <input type="hidden" value="0" name="i7">
                        <input type="checkbox" value="1" name="i7"
                            {{ $report->i7 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Inappropriate language use: Echolalia&nbsp;
                        <input type="hidden" value="0" name="i8">
                        <input type="checkbox" value="1" name="i8"
                            {{ $report->i8 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Disturbed sentence structure&nbsp;
                        <input type="hidden" value="0" name="i9">
                        <input type="checkbox" value="1" name="i9"
                            {{ $report->i9 == 1 ? 'checked' : '' }}>
                    </div>

                </div>

            </div>
            <div class="flex" style="justify-content: space-between;">
                <div>B) REARING ENVIRONMENT:</div>
                <div>
                    <div>
                        Childs care takers:&nbsp;<input type="text" value=" {{ $report->child_caretaker }}" name="child_caretaker">
                    </div>
                    <div>
                        Other language spoken at home:&nbsp;<input type="text" value="  {{ $report->other_language }}
                        " name="other_languages">
                    </div>
                </div>
                <div>
                    <div>
                        Attitude of parents towards the child: &nbsp;<input type="text" value=" {{ $report->parents_attitude }}
                        "
                            name="parents_attitude">
                    </div>
                    <div>
                        Previous travel:&nbsp;<input type="text" value="    {{ $report->previous_travel }}
                        " name="previous_travel">
                    </div>
                </div>
            </div>
            <div class="flex" style="justify-content: space-between; margin-top: 1rem;">
                <div>
                    <u>C) HEARING: </u>
                </div>
                <div>
                    Age of notice:&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->hearing_age }}
                    " name="hearing_age">
                </div>
                <div>
                    Degree:&nbsp;<input style="width: 100px;" type="text" value="
                    {{ $report->hearing_degree }}
                    " name="hearing_degree">
                </div>
                <div>
                    Hearing aid:&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->hearing_aid }}
                    " name="hearing_aid">
                </div>
                <div>
                    Rehabilitation:&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->hearing_rehabilitation }}
                    " name="hearing_rehabilitation">
                </div>
                <div>
                    Previous ear operations:&nbsp;<input style="width: 100px;" type="text" value="  {{ $report->previous_ear_operations }}"
                        name="previous_ear_operations">
                </div>
            </div>
            <div class="flex" style="justify-content: space-between; margin-top: 1rem;">
                <div>
                    <u>D) VISION:</u>&nbsp;<input style="width: 100px;" type="text" value=" {{ $report->vision }}
                    " name="vision">
                </div>
                <div>
                    <u>E) INTELLIGENCE:</u>&nbsp;<input style="width: 100px;" type="text" value="   {{ $report->intelligence }}
                    "
                        name="intelligence">
                </div>
                <div>
                    <u>F) MOTILITY:</u>&nbsp;<input style="width: 100px;" type="text" value="   {{ $report->motility }}
                    "
                        name="motility">
                </div>
                <div>
                    <u>G) BEHAVIOR:</u>&nbsp;<input style="width: 100px;" type="text" value="   {{ $report->behavior }}
                    "
                        name="behavior">
                </div>
            </div>
            <div class="flex" style="gap: 5rem; margin-top: 1rem;">
                <div>
                    <u>H) SLEEPING COMPLAINTS:</u>&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->sleep_complaints }}
                    "
                        name="sleep_complaints">
                </div>
                <div>
                    <u>I) FEEDING PROBLEMS:</u>&nbsp;<input style="width: 100px;" type="text" value="    {{ $report->feeding_complaints }}
                    "
                        name="feeding_complaints">
                </div>
            </div>
            <h3><u>GROWTH AND DEVELOPMEN</u></h3>
            <div class="row">
                <div>
                    A) PRENATAL HISTORY, LABOUR, NEONATAL HISTORY:&nbsp;<input style="width: 30%;" type="text"
                        value="   {{ $report->growth_development_history }}
                        " name="growth_development_history">
                </div>
                <div>
                    B) FEEDING :&nbsp;<input style="width: 50%;" type="text" value="{{ $report->growth_development_feeding }}
                    " name="growth_development_feeding">
                </div>
                <div class="flex" style="gap: .4rem;">
                    <div>
                        C) MILESTONE OF DEVELOPMENT
                    </div>
                    <div>
                        1.first word:&nbsp;<input style="width: 100px;" type="text" value=" {{ $report->milestones_first_word }}
                        " name="milestones_first_word">
                    </div>
                    <div>
                        2.walking: &nbsp;<input style="width: 100px;" type="text" value="   {{ $report->milestones_walking }}
                        " name="milestones_walking">
                    </div>
                    <div>
                        3.teething &nbsp;<input style="width: 100px;" type="text" value="   {{ $report->milestones_teething }}
                        " name="milestones_teething">
                    </div>
                    <div>
                        4.self help &nbsp;<input style="width: 100px;" type="text" value="   {{ $report->milestones_self_help }}
                        " name="milestones_self_help">
                    </div>
                </div>
                <div class="flex" style="gap: 5rem;">
                    <div>
                        Gross motor skills: &nbsp;<input style="width: 100px;" type="text" value="   {{ $report->gross_motor }}
                        "
                            name="gross_motor">
                    </div>
                    <div>
                        Fine motor skills: &nbsp;<input style="width: 100px;" type="text" value="   {{ $report->fine_motor }}
                        "
                            name="fine_motor">
                    </div>
                </div>
            </div>
            <h4 class="flex"><u>PAST HISTORY OF PREVIOUS ILLNESSES:</u>&nbsp;&nbsp;<textarea
                    name="past_illness_history"></textarea></h4>
            <h3><u>OBSERVATION AND EXAMINATION:</u></h3>

            <div class="row">
                <div>
                    (A) OBSERVATION : &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->observation }}
                        " name="observation">
                </div>
                <div>
                    (B) GENERAL EXAMINATION: &nbsp;<input style="width: 60%;" type="text" value="{{ $report->general_eaxamination }}
                    "
                        name="general_eaxamination">
                </div>
                <div>
                    (C) NEUROLOGICAL EXAMINATION: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->neurological_examination }}
                    "
                        name="neurological_examination">
                </div>
                <div>
                    (D) ORAL MOTOR EXAINATION: &nbsp;<input style="width: 60%;" type="text" value=" {{ $report->oral_examination }}
                    "
                        name="oral_examination">
                </div>
                <div>
                    (E)HEAD & NECK EXAMINATION: &nbsp;<input style="width: 60%;" type="text" value="    {{ $report->head_neck_examination }}
                    "
                        name="head_neck_examination">
                </div>
                <div>
                    (F) LANGUAGE EVALUATION: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->language_evaluation }}
                    "
                        name="language_evaluation">
                </div>
            </div>
            <h3><u>INFORMAL (OBSERVATION DURING FREEPLAY)</u></h3>

            <div class="flex" style="justify-content: space-between; margin-bottom: .5rem;">
                <div style="font-size: 15px;">A.PRELIGUISTIC SKILLS:</div>
                <div>
                    <div>
                        Sensory stimulation&nbsp;
                        <input type="hidden" value="0" name="i10">
                        <input type="checkbox" value="1" name="i10"
                            {{ $report->i10 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Object relation&nbsp;
                        <input type="hidden" value="0" name="i11">
                        <input type="checkbox" value="1" name="i11"
                            {{ $report->i11 == 1 ? 'checked' : '' }}>
                    </div>

                    <div>
                        use of communicative gestures&nbsp;
                        <input type="hidden" value="0" name="i12">
                        <input type="checkbox" value="1" name="i12"
                            {{ $report->i12 == 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <div>
                    <div>
                        Rejection&nbsp;
                        <input type="hidden" value="0" name="i13">
                        <input type="checkbox" value="1" name="i13"
                            {{ $report->i13 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        negation and affirmation&nbsp;
                        <input type="hidden" value="0" name="i14">
                        <input type="checkbox" value="1" name="i14"
                            {{ $report->i14 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Motor imitation&nbsp;
                        <input type="hidden" value="0" name="i15">
                        <input type="checkbox" value="1" name="i15"
                            {{ $report->i15 == 1 ? 'checked' : '' }}>
                    </div>

                </div>
                <div>
                    <div>
                        Social interaction&nbsp;
                        <input type="hidden" value="0" name="i16">
                        <input type="checkbox" value="1" name="i16"
                            {{ $report->i16 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Matching&nbsp;
                        <input type="hidden" value="0" name="i17">
                        <input type="checkbox" value="1" name="i17"
                            {{ $report->i17 == 1 ? 'checked' : '' }}>
                    </div>
                    <div>
                        Comprehension and&nbsp;
                        <input type="hidden" value="0" name="i18">
                        <input type="checkbox" value="1" name="i18"
                            {{ $report->i18 == 1 ? 'checked' : '' }}>
                    </div>

                </div>

            </div>
            <div style="gap: .5rem;" class="row">
                <div>
                    B.MODE OF COMMUNICATION: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->mode_of_communication }}
                    "
                        name="mode_of_communication">
                </div>
                <div>
                    C. PASSIVE LANGUAGE: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->passive_language }}
                    " name="passive_language">
                </div>
                <div>
                    D. ACTIVE LANGUAGE &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->active_language }}
                    " name="active_language">
                </div>
                <div>
                    E. NASALITY: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->nasality }}
                    " name="nasality">
                </div>
                <div>
                    F. DYSFLUENCY: &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->dysfluency }}
                    " name="dysfluency">
                </div>
                <div>
                    G. CHANGE OF VOICE: &nbsp;<input style="width: 60%;" type="text" value="    {{ $report->change_of_voice }}
                    " name="change_of_voice">
                </div>
                <div>
                    H. RATE OF SPEECH &nbsp;<input style="width: 60%;" type="text" value="   {{ $report->rate_of_speech }}
                    " name="rate_of_speech">
                </div>
            </div>
            <h3><u>FORMAL LANGUAGE ASSESSMENT</u>&nbsp;<input style="width: 60%;" type="text" value="   {{ $report->formal_language_assessment }}
            " name="formal_language_assessment"></h3>
            <h3><u>PSYCHOMETRIC ASSESSMENT</u>&nbsp;<input style="width: 60%;" type="text" value="   {{ $report->psychometric_assessment }}
            " name="psychometric_assessment"></h3>
        </div>
        <div class='conta'>
            <button type="submit">
                تعديل
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


                    .bcont,
                    aside,
                    header,
                    button,
                    .dko {
                        display: none !important;
                    }

                    .inmain,
                    .container {
                        width: 100% !important;
                    }

                    body {
                        font-size: 12px;
                        margin: 0;
                        padding: 0;
                    }

                    .border,
                    .Subjective_Assessment_con {
                        margin: 0;
                        padding: 0.5rem;
                        font-size: 11px;
                    }

                    h2,
                    h3 {
                        font-size: 14px;
                        margin: 0.5rem 0;
                    }

                    ol,
                    ul {
                        padding-left: 1rem;
                    }

                    li {
                        margin-bottom: 0.5rem;
                    }

                    input[type="text"],
                    input[type="checkbox"] {
                        width: auto;
                        margin: 0.2rem 0;
                    }

                    table {
                        width: 100%;
                        font-size: 10px;
                        margin-bottom: 1rem;
                    }

                    th,
                    td {
                        padding: 4px;
                    }

                    @page {
                        size: A4 landscape;
                        margin: 10mm;
                    }
                }
            </style>



        </div>
</form>