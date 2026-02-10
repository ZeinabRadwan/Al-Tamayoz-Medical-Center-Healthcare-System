<link rel="stylesheet" href="vv0all.css">

<style>
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
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

<form action="{{ route('fee_score_reports.update' , $report->id) }}" method="POST">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>FEES SCORE</u></h2>
            <h3><u>PART 1:</u>&nbsp;Assessment of Anatomy and Movement of Structures </h3>
            <ol type="A">
                <li>
                    <span><u> Velopharyngeal closure&nbsp;</u> (“pa-pa-pa” swallow, etc): </span><br>
                    <input type="hidden" name="velopharyngeal_closure_complete" value="0">
                    <input type="checkbox" name="velopharyngeal_closure_complete" value="1" {{ $report->velopharyngeal_closure_complete ? 'checked' : '' }}>&nbsp;&nbsp;Complete <br>
                    <input type="hidden" name="velopharyngeal_closure_incomplete" value="0">
                    <input type="checkbox" name="velopharyngeal_closure_incomplete" value="1" {{ $report->velopharyngeal_closure_incomplete ? 'checked' : '' }}>&nbsp;&nbsp;Incomplete <br>

                </li>
                <li>
                    <u>Anatomy</u><br>
                    <input type="hidden" name="anatomy_normal" value="0">
                    <input type="checkbox" name="anatomy_normal" value="1" {{ $report->anatomy_normal ? 'checked' : '' }}>&nbsp;&nbsp;Normal
                    <input style="width: 99%;" type="text" value="{{ $report->anatomy_text}}" name="anatomy_text">
                    <hr style="font-weight: bolder;">
                    <p>
                        <input type="hidden" name="anatomy_pathology" value="0">
                        <input type="checkbox" name="anatomy_pathology" value="1" {{ $report->anatomy_pathology ? 'checked' : '' }}>&nbsp;Possible pathology that should be seen by a physician, including suspicious mucosal
                        irregularity, unusual shape of anatomical structure, immobility of vocal folds; narrow
                        airway&nbsp;<input type="text" value="{{ $report->anatomy_pathology_text}}" name="anatomy_pathology_text">
                    </p>
                </li>
                <li>
                    <u>Secretions:</u> <br><br>
                    <input type="hidden" name="secretions_no_excess" value="0">
                    <input type="checkbox" name="secretions_no_excess" value="1" {{ $report->secretions_no_excess ? 'checked' : '' }}>&nbsp;&nbsp;No excess secretions <br>
                    <input type="hidden" name="secretions_pooled_valleculae" value="0">
                    <input type="checkbox" name="secretions_pooled_valleculae" value="1" {{ $report->secretions_pooled_valleculae ? 'checked' : '' }}>&nbsp;&nbsp;Pooled in valleculae, pyriforms and/or lateral channels <br>
                    <input type="hidden" name="secretions_pooled_laryngeal_vestibule" value="0">
                    <input type="checkbox" name="secretions_pooled_laryngeal_vestibule" value="1" {{ $report->secretions_pooled_laryngeal_vestibule ? 'checked' : '' }}>&nbsp;&nbsp;Pooled in laryngeal vestibule <br>
                    <input type="hidden" name="secretions_aspirated" value="0">
                    <input type="checkbox" name="secretions_aspirated" value="1" {{ $report->secretions_aspirated ? 'checked' : '' }}>&nbsp;&nbsp;Aspirated <br>
                    <input type="hidden" name="secretions_patient_ejects" value="0">
                    <input type="checkbox" name="secretions_patient_ejects" value="1" {{ $report->secretions_patient_ejects ? 'checked' : '' }}>&nbsp;&nbsp;Patient ejects <br>
                    <input type="hidden" name="secretions_no_response" value="0">
                    <input type="checkbox" name="secretions_no_response" value="1" {{ $report->secretions_no_response ? 'checked' : '' }}>&nbsp;&nbsp;No response to aspirated secretions <br><br><br>
                </li>
                <li>
                    <u>Laryngeal Movements:</u> <br>
                    1. Respiration (observe rest breathing): <br>
                    <ul style="list-style-type: square;">
                        <li>
                            Respiratory rate:&nbsp;&nbsp;<input style="width: 60%;" type="text" value="{{ $report->respiratory_rate}}" name="respiratory_rate">
                        </li>
                        <li>
                            <input type="hidden" name="laryngeal_movements_normal" value="0">
                            Even, normal movement of vocal folds.&nbsp;&nbsp;<input type="checkbox" name="laryngeal_movements_normal" value="1" {{ $report->laryngeal_movements_normal ? 'checked' : '' }}>
                        </li>
                        <li>
                            <input type="hidden" name="laryngeal_movements_labored" value="0">
                            Respiratory rate fast or labored. &nbsp;&nbsp;<input type="checkbox" name="laryngeal_movements_labored" value="1" {{ $report->laryngeal_movements_labored ? 'checked' : '' }}>
                        </li>
                    </ul>
                </li>
                <li>
                    <u style="margin-bottom: 10px !important;">Pas Score:</u> <br>
                    1. Thin Liquid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_3_ml" value="1"
                            {{ $report->pas_score_3_ml ? 'checked' : '' }}>

                        <input type="hidden" name="pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_5_ml" value="1"
                            {{ $report->pas_score_5_ml ? 'checked' : '' }}>

                        <input type="hidden" name="pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_10_ml" value="1"
                            {{ $report->pas_score_10_ml ? 'checked' : '' }}>

                    </div>

                    2. Thick Liquid<br>
                    <div style="margin: 0 10px 0 20px;">
                        <input type="hidden" name="thick_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_3_ml" value="1"
                            {{ $report->thick_pas_score_3_ml ? 'checked' : '' }}>

                        <input type="hidden" name="thick_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_5_ml" value="1"
                            {{ $report->thick_pas_score_5_ml ? 'checked' : '' }}>

                        <input type="hidden" name="thick_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_10_ml" value="1"
                            {{ $report->thick_pas_score_10_ml ? 'checked' : '' }}>

                    </div>

                    3. Semi Solid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="semi_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_3_ml" value="1"
                            {{ $report->semi_pas_score_3_ml ? 'checked' : '' }}>

                        <input type="hidden" name="semi_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_5_ml" value="1"
                            {{ $report->semi_pas_score_5_ml ? 'checked' : '' }}>

                        <input type="hidden" name="semi_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_10_ml" value="1"
                            {{ $report->semi_pas_score_10_ml ? 'checked' : '' }}>

                    </div>

                    4. Solid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="solid_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_3_ml" value="1"
                            {{ $report->solid_pas_score_3_ml ? 'checked' : '' }}>

                        <input type="hidden" name="solid_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_5_ml" value="1"
                            {{ $report->solid_pas_score_5_ml ? 'checked' : '' }}>

                        <input type="hidden" name="solid_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_10_ml" value="1"
                            {{ $report->solid_pas_score_10_ml ? 'checked' : '' }}>

                    </div>

                </li>
            </ol>
        </div>

        <div class='conta'>
            <button type="submit">حفظ</button>


            <script>
                function printPage() {
                    var printOptions = {
                        scale: 0.8,
                        background: {
                            graphic: 'https://example.com/background-image.jpg',
                            display: 'print'
                        }
                    };
                    window.print(printOptions);
                }
            </script>
            <style>
                @media print {

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

                    input [type="text"],
                    input [type="checkbox"] {
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
    </body>
</form>

</body>