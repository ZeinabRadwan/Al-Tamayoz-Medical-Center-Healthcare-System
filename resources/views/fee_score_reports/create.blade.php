<link rel="stylesheet" href="vv0all.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<style>
    @media print {
        .bcont {
            display: none !important;
        }

        aside {
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
        font-weight: bold;
        font-family: cairo;
        text-align: center;
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
        font-weight: bold;
        font-family: cairo;
    }

    header,
    footer,
    aside,
    main {
        background-color: #f0f0f0;
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
    }

    .v {
        filter: unset !important;
        font-weight: bold;
        background-color: #f0f0f0;
        filter: drop-shadow(2px -10px 6px black);
    }

    img {
        width: 100%;
        height: auto;
    }

    body {
        margin-top: 20px;
        background-color: #f0f0f0;
        font-family: cairo;
    }
</style>
<form action="{{ route('fee_score_reports.store') }}" method="POST">
    @csrf

    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    <input type="hidden" name="template_id" value="{{ $template->id }}">

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>FEES SCORE</u></h2>
            <h3><u>PART 1:</u>&nbsp;Assessment of Anatomy and Movement of Structures </h3>
            <ol type="A">
                <li>
                    <span><u> Velopharyngeal closure&nbsp;</u> (“pa-pa-pa” swallow, etc): </span><br>
                    <input type="checkbox" name="velopharyngeal_closure_complete" value="1">&nbsp;&nbsp;Complete <br>
                    <input type="checkbox" name="velopharyngeal_closure_incomplete" value="1">&nbsp;&nbsp;Incomplete <br>
                </li>
                <hr style="font-weight: bolder;">
                <li>
                    <u>Anatomy</u><br>
                    <input type="checkbox" name="anatomy_normal" value="1">&nbsp;&nbsp;Normal
                    <p>
                        <input type="checkbox" name="anatomy_pathology" value="1">&nbsp;Possible pathology that should be seen by a physician, including suspicious mucosal
                        irregularity, unusual shape of anatomical structure, immobility of vocal folds; narrow
                        airway&nbsp;<input type="text" value="" style="width:100%;" name="anatomy_pathology_text">
                    </p>
                </li>
                <hr style="font-weight: bolder;">
                <li>
                    <u>Secretions:</u> <br>
                    <input type="checkbox" name="secretions_no_excess" value="1">&nbsp;&nbsp;No excess secretions <br>
                    <input type="checkbox" name="secretions_pooled_valleculae" value="1">&nbsp;&nbsp;Pooled in valleculae, pyriforms and/or lateral channels <br>
                    <input type="checkbox" name="secretions_pooled_laryngeal_vestibule" value="1">&nbsp;&nbsp;Pooled in laryngeal vestibule <br>
                    <input type="checkbox" name="secretions_aspirated" value="1">&nbsp;&nbsp;Aspirated <br>
                    <input type="checkbox" name="secretions_patient_ejects" value="1">&nbsp;&nbsp;Patient ejects <br>
                    <input type="checkbox" name="secretions_no_response" value="1">&nbsp;&nbsp;No response to aspirated secretions <br><br>
                </li>
                <hr style="font-weight: bolder;">
                <li>
                    <u>Laryngeal Movements:</u> <br>
                    1. Respiration (observe rest breathing): <br>
                    <ul style="list-style-type: square;">
                        <li>
                            Respiratory rate:&nbsp;&nbsp;<input style="width: 60%;" type="text" value="" name="respiratory_rate">
                        </li>
                        <li>
                            Even, normal movement of vocal folds.&nbsp;&nbsp;<input type="checkbox" name="laryngeal_movements_normal" value="1">
                        </li>
                        <li>
                            Respiratory rate fast or labored. &nbsp;&nbsp;<input type="checkbox" name="laryngeal_movements_labored" value="1">
                        </li>
                    </ul>
                </li>
                <hr style="font-weight: bolder;">
                <li>
                    <u style="margin-bottom: 10px !important;">Pas Score:</u> <br>
                    1. Thin Liquid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_3_ml" value="1">

                        <input type="hidden" name="pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_5_ml" value="1">

                        <input type="hidden" name="pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="pas_score_10_ml" value="1">

                    </div>

                    2. Thick Liquid<br>
                    <div style="margin: 0 10px 0 20px;">
                        <input type="hidden" name="thick_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_3_ml" value="1">

                        <input type="hidden" name="thick_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_5_ml" value="1">

                        <input type="hidden" name="thick_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="thick_pas_score_10_ml" value="1">

                    </div>

                    3. Semi Solid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="semi_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_3_ml" value="1">

                        <input type="hidden" name="semi_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_5_ml" value="1">

                        <input type="hidden" name="semi_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="semi_pas_score_10_ml" value="1">

                    </div>

                    4. Solid<br>
                    <div style="margin: 0 10px 0 20px;">

                        <input type="hidden" name="solid_pas_score_3_ml" value="0">
                        3 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_3_ml" value="1">

                        <input type="hidden" name="solid_pas_score_5_ml" value="0">
                        5 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_5_ml" value="1">

                        <input type="hidden" name="solid_pas_score_10_ml" value="0">
                        10 ml&nbsp;&nbsp;<input type="checkbox" name="solid_pas_score_10_ml" value="1">

                    </div>

                </li>
            </ol>
        </div>

        <div class='conta'>
            <button type="submit">حفظ</button>

            <div class='dko' name='btn4' onclick="printPage()">
                طباعة
            </div>
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
        </div>
    </body>
</form>
</body>