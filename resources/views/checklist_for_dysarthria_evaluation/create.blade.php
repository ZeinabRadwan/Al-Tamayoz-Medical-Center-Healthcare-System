<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="vv0all.css">
<title>Checklist for Dysarthria evaluation</title>
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

<body style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
    <form action="{{ route('checklist_for_dysarthria_evaluation.store') }}" method="Post">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
        <input type="hidden" name="template_id" value="{{ $template->id }}">
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>Checklist for Dysarthria evaluation</u></h2>
            <h5 style="margin-left: 1rem;"><u>PERSONAL DATA:</u></h5>
            <div style="display: flex;justify-content: space-evenly;gap: 2rem;">
                <div class="row">
                    <div>
                        <label>1. Name:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="name">&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>2. Age:&nbsp;</label>
                        <input style="width: 50px;" type="number" value="" name="age">
                    </div>
                    <div>
                        <label>4. Residence:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="residence">
                    </div>
                    <div>
                        <label>6. Handedness:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="handedness">
                    </div>
                    <div>
                        <label>8. Marietal status:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="marital_status">
                    </div>
                    <div>
                        <label>10. Premorbid educational level:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="premorbid_educational_level">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label>3. Sex:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="sex">
                    </div>
                    <div>
                        <label>5. Tel:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="telephone">
                    </div>
                    <div>
                        <label>7. Occupation:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="occupation">
                    </div>
                    <div>
                        <label>9. Smoking:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="smoking">
                    </div>
                    <div>
                        <label>11. Literal sophistication:&nbsp;</label>
                        <input style="width: 250px;" type="text" value="" name="literal_sophistication">
                    </div>
                </div>
            </div>
            <h4><u>PATIENT AND FAMILY INTERVIEW:</u></h4>
            <h4><u>A. PAST HISTORY:</u></h4>
            <div style="margin-left: 2rem;justify-content: space-between;" class="flex">
                <div>
                    <label><u>1-Relevant diseases:</u>&nbsp;</label>
                    <input style="width: 250px;" type="text" value="" name="relevant_diseases">
                </div>
                <div>
                    <label><u>duration</u>&nbsp;</label>
                    <input style="width: 250px;" type="text" value="" name="diseases_duration">
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><u>Diabetes mellitus</u></h4>
            <div style="margin-left: 2rem;justify-content: space-between;" class="flex">
                <div>
                    <label><u>-Hypertension:</u>&nbsp;</label>
                    <input style="width: 250px;" type="text" value="" name="hypertension">
                </div>
                <div>
                    <label><u>duration</u>&nbsp;</label>
                    <input style="width: 250px;" type="text" value="" name="hypertension_duration">
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;justify-content: space-evenly;" class="flex">
                <div>
                    <label><u>Mild</u>&nbsp;</label>
                    <input type="checkbox" value="1" name="mild">
                </div>
                <div>
                    <label><u>Moderate</u>&nbsp;</label>
                    <input type="checkbox" value="1" name="moderate">
                </div>
                <div>
                    <label><u>Severe</u>&nbsp;</label>
                    <input type="checkbox" value="1" name="severe">
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><u>Heart disease:</u></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;justify-content: space-evenly;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="fever">
                    <label><u>Fever</u>&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="trauma">
                    <label><u>Trauma</u>&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="epilepsy">
                    <label><u>Epilepsy</u>&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="drug_intake">
                    <label><u>Drug intake</u>&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="operations">
                    <label><u>Operations</u>&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label><u>2-Similar episode</u>&nbsp;</label>
                    <input type="text" value="" name="similar_episode">
                </div>
                <div>
                    <label><u>-Related episode (TIA)</u>&nbsp;</label>
                    <input type="text" value="" name="related_episode_tia">
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h5><u>B. COMPLAINT & ANALYSIS OF SYMPTOMS:</u></h5>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>1- Onset:&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="onset_gradual">
                    <label>Gradual&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="onset_sudden">
                    <label>Sudden&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="onset_dramatic">
                    <label>Dramatic&nbsp;</label>
                </div>
            </div>
            <div style="margin: 1rem 0 1rem 2rem;">
                <label>2- Duration:&nbsp;</label>
                <input type="text" value="" name="duration">
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>3-Course:&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="course_stationary">
                    <label>Stationary&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="course_progressive">
                    <label>Progressive&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="course_regressive">
                    <label>Regressive&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>4-Prodromal symptoms: Headache&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="prodromal_light_flashes">
                    <label>Flashes of light&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="prodromal_numbness">
                    <label>Numbness & Tingling&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="prodromal_weakness">
                    <label>Weakness&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>5-Level of consciousness: &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="consciousness_semicoma">
                    <label>Semicoma &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="consciousness_stupor">
                    <label>Stupor&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="consciousness_drowsiness">
                    <label>Drowiness&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="consciousness_conscious">
                    <label>Conscious&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="consciousness_coma">
                    <label>Coma&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>6-Other neurological deficits: &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="hemiplegia">
                    <label>Hemiplegia &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="involuntary_movements">
                    <label>Involuntary movements&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">

                <div>
                    <input type="checkbox" value="1" name="sensory_disturbances">
                    <label>Sensory disturbances &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="convulsions">
                    <label>Convulsions&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">

                <div>
                    <input type="checkbox" value="1" name="swallowing_difficulties">
                    <label>Swallowing difficulties &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="bladder_disturbances">
                    <label>Bladder disturbances&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>7- Motoric disability:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>-Topographic distribution:
                        <input type="checkbox" value="1" name="upper_limb">

                        upper limb &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="lower_limb">
                    <label>lower limb &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="right_side">
                    <label>right&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="left_side">
                    <label>left&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>-Severity of disability:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="disability_mild">
                    <label>Mild &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="disability_moderate">
                    <label>Moderate&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="disability_severe">
                    <label>Severe&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>8-The preset mean of communication of the patient:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="comm_verbal">
                    <label>Verbal &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="comm_gestures">
                    <label>Gestures &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="comm_writing">
                    <label>Writing&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="comm_drawing">
                    <label>Drawing&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">

                <div>
                    <label>9-Affection of vision:&nbsp;</label>
                    <input type="text" value="" name="vision_affection">
                </div>
                <div>
                    <label>Hearing:&nbsp;</label>
                    <input type="text" value="" name="hearing_affection">
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">

                <div>
                    <label>10-Previous investigation: &nbsp;CT&nbsp;</label>
                    <input type="checkbox" value="1" name="investigation_ct">
                </div>
                <div>
                    <label>EEG:&nbsp;</label>
                    <input type="checkbox" value="1" name="investigation_eeg">
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>11-Previous lines of treatment:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input type="checkbox" value="1" name="treatment_type">
                    <label>Type &nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="treatment_onset">
                    <label>Onset&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="treatment_duration">
                    <label>Duration&nbsp;</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="treatment_effect">
                    <label>Effect&nbsp;</label>
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h4><u>B) CLINICAL EXAMINATION:</u></h4>
            <div style="font-size: 13px; margin-left: 2rem;">
                <span>a) Auditory Perceptual Assessment</span>
                <div style="margin-top: 1rem;gap: 5rem;margin-bottom: 1rem;" class="flex">
                    <div>
                        <label>b) General Examination: &nbsp;</label>
                        <input type="checkbox" value="1" name="exam_temperature"> &nbsp;Temperature
                    </div>
                    <div>
                        <input type="checkbox" value="1" name="exam_pulse">
                        <span>Pulse&nbsp;</span>
                    </div>
                    <div>
                        <input type="checkbox" value="1" name="exam_blood_pressure">
                        <span>Blood pressure&nbsp;</span>
                    </div>
                    <div>
                        <input type="checkbox" value="1" name="exam_heart_murmur">
                        <span>Murmur on the heart&nbsp;</span>
                    </div>
                </div>
                <span>c) E.N.T. Examination:</span>
                <ul>
                    <li>
                        Oral cavity <input type="checkbox" value="1" name="ent_oral_cavity">
                    </li>
                    <li>
                        Pharynx <input type="checkbox" value="1" name="ent_pharynx">
                    </li>
                    <li>
                        Nasal cavity <input type="checkbox" value="1" name="ent_nasal_cavity">
                    </li>
                    <li>
                        Ears <input type="checkbox" value="1" name="ent_ears">
                    </li>
                    <li>
                        Indirect laryngoscopy <input type="checkbox" value="1" name="ent_laryngoscopy">
                    </li>
                </ul>
                <span>d) Neurological Examination:</span>
                <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                    <li>
                        (1) Cranial nerves: &nbsp; <input type="text" value="" name="cranial_nerves">
                    </li>
                    <li>
                        (2) Motor system: &nbsp; <input type="text" value="" name="motor_system">
                    </li>
                    <li>
                        (3) Sensory system: &nbsp; <input type="text" value="" name="sensory_system">
                    </li>
                </ul>
                <h3><u>CLINICAL DIAGNOSTIC AIDS:</u></h3>
                <div style="display: flex;width: 70%;justify-content: space-between;">
                    <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                        <li>
                            A) Speech sample intelligibility score &nbsp; <input type="checkbox" value="1"
                                name="speech_intelligibility">
                        </li>
                        <li>
                            B) Read a standard passage aloud &nbsp; <input type="checkbox" value="1"
                                name="reading_passage">
                        </li>
                        <li>
                            C) Prolongation of the vowel (ah) &nbsp; <input type="checkbox" value="1"
                                name="vowel_prolongation">
                        </li>
                        <li>
                            D) Repeat syllables rapidly &nbsp; <input type="checkbox" value="1"
                                name="syllable_repetition">
                        </li>
                    </ul>
                    <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                        <li style="margin-top: 1.5rem;">
                            -reading rate &nbsp; <input type="checkbox" value="1" name="reading_rate">
                        </li>
                        <li>
                            -Maximum phonation time &nbsp; <input type="checkbox" value="1" name="max_phonation_time">
                        </li>
                        <li>
                            - diadokokinetic rate &nbsp; <input type="checkbox" value="1" name="diadokokinetic_rate">
                        </li>
                    </ul>
                </div>
                <span>E) Formal testing:</span>
                <ol start="1" class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                    <li>
                        1. Articulation test: &nbsp; <input type="text" value="" name="articulation_test">
                    </li>
                    <li>
                        2. Dysphasia test: &nbsp; <input type="text" value="" name="dysphasia_test">
                    </li>
                    <li>
                        3. Evaluation of cognitive and perceptual abilities: &nbsp; <input type="text" value=""
                            name="cognitive_perceptual_eval">
                    </li>
                </ol>
                <h4><u>INSTRUMENTAL MEASUERS:</u></h4>
                <span style="margin-left: 1rem;">1) Aerodynamic Measures:</span>
                <div style=" margin-top: 1rem;gap: 5rem;" class="flex">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    -Vital capacity:
                                </td>
                                <td>
                                    Normal &nbsp;<input type="checkbox" value="1" name="vital_capacity_normal">
                                </td>
                                <td>
                                    Increase&nbsp;<input type="checkbox" value="1" name="vital_capacity_increase">
                                </td>
                                <td>
                                    Decrease&nbsp;<input type="checkbox" value="1" name="vital_capacity_decrease">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    -Nasal air flow:
                                </td>
                                <td>
                                    Normal &nbsp;<input type="checkbox" value="1" name="nasal_flow_normal">
                                </td>
                                <td>
                                    Increase&nbsp;<input type="checkbox" value="1" name="nasal_flow_increase">
                                </td>
                                <td>
                                    Decrease&nbsp;<input type="checkbox" value="1" name="nasal_flow_decrease">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    -Oral air flow:
                                </td>
                                <td>
                                    Normal &nbsp;<input type="checkbox" value="1" name="oral_flow_normal">
                                </td>
                                <td>
                                    Increase&nbsp;<input type="checkbox" value="1" name="oral_flow_increase">
                                </td>
                                <td>
                                    Decrease&nbsp;<input type="checkbox" value="1" name="oral_flow_decrease">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    -Intraoral pressure:
                                </td>
                                <td>
                                    Normal &nbsp;<input type="checkbox" value="1" name="intraoral_pressure_normal">
                                </td>
                                <td>
                                    Increase&nbsp;<input type="checkbox" value="1" name="intraoral_pressure_increase">
                                </td>
                                <td>
                                    Decrease&nbsp;<input type="checkbox" value="1" name="intraoral_pressure_decrease">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex" style="margin-left: 1rem;flex-direction: column; gap: .5rem;">
                    <div>
                        2) Acoustic Analysis: &nbsp;<input type="text" value="" name="acoustic_analysis">
                    </div>
                    <div>
                        3) X-rays: &nbsp;<input type="text" value="" name="xray_results">
                    </div>
                    <div>
                        4) Electromyography: &nbsp;<input type="text" value="" name="electromyography">
                    </div>
                    <div>
                        5) Computerized Tomography (CT) of the brain: &nbsp;<input type="text" value="" name="brain_ct">
                    </div>
                    <div>
                        6) Electroencephalography (EEG) &nbsp;<input type="text" value="" name="eeg_results">
                    </div>
                    <div>
                        7) Positron Emission Tomography: &nbsp;<input type="text" value="" name="pet_scan">
                    </div>
                    <div>
                        8) Magnetic Resonance Imaging: &nbsp;<input type="text" value="" name="mri_results">
                    </div>
                    <div>
                        9) Cerebral Angiography: &nbsp;<input type="text" value="" name="cerebral_angiography">
                    </div>
                    <div>
                        10) Transcranial Doppler: Blood flow velocity: &nbsp;<input type="text" value=""
                            name="transcranial_doppler">
                    </div>
                    <div>
                        11) Additional Consultation &nbsp;<input type="text" value="" name="additional_consultation">
                    </div>
                </div>
                <div class="flex" style="flex-direction: column; gap: .5rem;">
                    <div>
                        - Audiological &nbsp;<input type="text" value="" name="audiological_consultation">
                    </div>
                    <div>
                        - Ophthalmological &nbsp;<input type="text" value="" name="ophthalmological_consultation">
                    </div>
                    <div>
                        - Others &nbsp;<textarea name="other_consultations"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class='conta'>
            <button name='btn3' type="submit"> حفظ</button>

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
    </form>
</body>

</html>