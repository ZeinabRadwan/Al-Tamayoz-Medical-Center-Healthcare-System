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

<head>
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
23

<form>

    <input readonly type="hidden" name="patient_id" value="{{ $report->patient_id }}">


    <body style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;" class="border Subjective_Assessment_con">
            <h2 align="center"><u>Checklist for Dysarthria evaluation</u></h2>
            <h5 style="margin-left: 1rem;"><u>PERSONAL DATA:</u></h5>
            <div style="display: flex;justify-content: space-evenly;gap: 2rem;">
                <div class="row">
                    <div>
                        <label>1. Name:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value=" {{ $report->name }}"
                            name="name">&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>2. Age:&nbsp;</label>
                        <input readonly style="width: 50px;" type="number" value="{{ $report->age }}" name="age">
                    </div>
                    <div>
                        <label>4. Residence:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->residence }}" name="residence">
                    </div>
                    <div>
                        <label>6. Handedness:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->handedness }}" name="handedness">
                    </div>
                    <div>
                        <label>8. Marietal status:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->marital_status }}" name="marital_status">
                    </div>
                    <div>
                        <label>10. Premorbid educational level:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->premorbid_educational_level }}" name="premorbid_educational_level">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label>3. Sex:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->sex }}" name="sex">
                    </div>
                    <div>
                        <label>5. Tel:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->telephone }}" name="telephone">
                    </div>
                    <div>
                        <label>7. Occupation:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->occupation }}" name="occupation">
                    </div>
                    <div>
                        <label>9. Smoking:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->smoking }}" name="smoking">
                    </div>
                    <div>
                        <label>11. Literal sophistication:&nbsp;</label>
                        <input readonly style="width: 250px;" type="text" value="{{ $report->literal_sophistication }}" name="literal_sophistication">
                    </div>
                </div>
            </div>
            <h4><u>PATIENT AND FAMILY INTERVIEW:</u></h4>
            <h4><u>A. PAST HISTORY:</u></h4>
            <div style="margin-left: 2rem;justify-content: space-between;" class="flex">
                <div>
                    <label><u>1-Relevant diseases:</u>&nbsp;</label>
                    <input readonly style="width: 250px;" type="text" value="{{ $report->relevant_diseases }}" name="relevant_diseases">
                </div>
                <div>
                    <label><u>duration</u>&nbsp;</label>
                    <input readonly style="width: 250px;" type="text" value="{{ $report->diseases_duration }}" name="diseases_duration">
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><u>Diabetes mellitus</u></h4>
            <div style="margin-left: 2rem;justify-content: space-between;" class="flex">
                <div>
                    <label><u>-Hypertension:</u>&nbsp;</label>
                    <input readonly style="width: 250px;" type="text" value="{{ $report->hypertension }}" name="hypertension">
                </div>
                <div>
                    <label><u>duration</u>&nbsp;</label>
                    <input readonly style="width: 250px;" type="text" value="{{ $report->hypertension_duration }}" name="hypertension_duration">
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;justify-content: space-evenly;" class="flex">
                <div>
                    <label><u>Mild</u>&nbsp;</label>
                    <input readonly type="hidden" name="mild" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="mild" {{ $report->mild == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    <label><u>Moderate</u>&nbsp;</label>
                    <input readonly type="hidden" name="moderate" value="0">

                    <input readonly type="checkbox" onclick="return false;" value="1" name="moderate" {{ $report->moderate == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    <label><u>Severe</u>&nbsp;</label>
                    <input readonly type="hidden" name="severe" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="severe" {{ $report->severe == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><u>Heart disease:</u></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;justify-content: space-evenly;" class="flex">
                <div>
                    <input readonly type="hidden" name="fever" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="fever" {{ $report->fever == 1 ? 'checked' : '' }}>
                    <label><u>Fever</u>&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="trauma" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="trauma" {{ $report->trauma == 1 ? 'checked' : '' }}>
                    <label><u>Trauma</u>&nbsp;</label>
                </div>
                <div>

                    <input readonly type="hidden" name="epilepsy" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="epilepsy" {{ $report->epilepsy == 1 ? 'checked' : '' }}>
                    <label><u>Epilepsy</u>&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="drug_intake" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="drug_intake" {{ $report->drug_intake == 1 ? 'checked' : '' }}>
                    <label><u>Drug intake</u>&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="operations" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="operations" {{ $report->operations == 1 ? 'checked' : '' }}>
                    <label><u>Operations</u>&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label><u>2-Similar episode</u>&nbsp;</label>
                    <input readonly type="text" value="{{ $report->similar_episode }}" name="similar_episode">
                </div>
                <div>
                    <label><u>-Related episode (TIA)</u>&nbsp;</label>
                    <input readonly type="text" value="{{ $report->related_episode_tia }}" name="related_episode_tia">
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
                    <input readonly type="hidden" name="onset_gradual" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="onset_gradual" {{ $report->onset_gradual == 1 ? 'checked' : '' }}>
                    <label>Gradual&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="onset_sudden" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="onset_sudden" {{ $report->onset_sudden == 1 ? 'checked' : '' }}>
                    <label>Sudden&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="onset_dramatic" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="onset_dramatic" {{ $report->onset_dramatic == 1 ? 'checked' : '' }}>
                    <label>Dramatic&nbsp;</label>
                </div>
            </div>
            <div style="margin: 1rem 0 1rem 2rem;">
                <label>2- Duration:&nbsp;</label>
                <input readonly type="text" value="{{$report->duration }}" name="duration">
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>3-Course:&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="course_stationary" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="course_stationary" {{ $report->course_stationary == 1 ? 'checked' : '' }}>
                    <label>Stationary&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="course_progressive" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="course_progressive" {{ $report->course_progressive == 1 ? 'checked' : '' }}>
                    <label>Progressive&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="course_regressive" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="course_regressive" {{ $report->course_regressive == 1 ? 'checked' : '' }}>
                    <label>Regressive&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>4-Prodromal symptoms: Headache&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="prodromal_light_flashes" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="prodromal_light_flashes" {{ $report->prodromal_light_flashes == 1 ? 'checked' : '' }}>
                    <label>Flashes of light&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="prodromal_numbness" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="prodromal_numbness" {{ $report->prodromal_numbness == 1 ? 'checked' : '' }}>
                    <label>Numbness & Tingling&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="prodromal_weakness" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="prodromal_weakness" {{ $report->prodromal_weakness == 1 ? 'checked' : '' }}>
                    <label>Weakness&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>5-Level of consciousness: &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="consciousness_semicoma" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="consciousness_semicoma" {{ $report->consciousness_semicoma == 1 ? 'checked' : '' }}>
                    <label>Semicoma &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="consciousness_stupor" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="consciousness_stupor" {{ $report->consciousness_stupor == 1 ? 'checked' : '' }}>
                    <label>Stupor&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="consciousness_drowsiness" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="consciousness_drowsiness" {{ $report->consciousness_drowsiness == 1 ? 'checked' : '' }}>
                    <label>Drowiness&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="consciousness_conscious" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="consciousness_conscious" {{ $report->consciousness_conscious == 1 ? 'checked' : '' }}>
                    <label>Conscious&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="consciousness_coma" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="consciousness_coma" {{ $report->consciousness_coma == 1 ? 'checked' : '' }}>
                    <label>Coma&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>6-Other neurological deficits: &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="hemiplegia" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="hemiplegia" {{ $report->hemiplegia == 1 ? 'checked' : '' }}>
                    <label>Hemiplegia &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="involuntary_movements" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="involuntary_movements" {{ $report->involuntary_movements == 1 ? 'checked' : '' }}>
                    <label>Involuntary movements&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="sensory_disturbances" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="sensory_disturbances" {{ $report->sensory_disturbances == 1 ? 'checked' : '' }}>
                    <label>Sensory disturbances &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="convulsions" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="convulsions" {{ $report->convulsions == 1 ? 'checked' : '' }}>
                    <label>Convulsions&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="swallowing_difficulties" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="swallowing_difficulties" {{ $report->swallowing_difficulties == 1 ? 'checked' : '' }}>
                    <label>Swallowing difficulties &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="bladder_disturbances" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="bladder_disturbances" {{ $report->bladder_disturbances == 1 ? 'checked' : '' }}>
                    <label>Bladder disturbances&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>7- Motoric disability:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>-Topographic distribution:
                        <input readonly type="hidden" name="upper_limb" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="upper_limb" {{ $report->upper_limb == 1 ? 'checked' : '' }}>
                        upper limb &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="lower_limb" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="lower_limb" {{ $report->lower_limb == 1 ? 'checked' : '' }}>
                    <label>lower limb &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="right_side" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="right_side" {{ $report->right_side == 1 ? 'checked' : '' }}>
                    <label>right&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="left_side" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="left_side" {{ $report->left_side == 1 ? 'checked' : '' }}>
                    <label>left&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>-Severity of disability:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="disability_mild" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="disability_mild" {{ $report->disability_mild == 1 ? 'checked' : '' }}>
                    <label>Mild &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="disability_moderate" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="disability_moderate" {{ $report->disability_moderate == 1 ? 'checked' : '' }}>
                    <label>Moderate&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="disability_severe" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="disability_severe" {{ $report->disability_severe == 1 ? 'checked' : '' }}>
                    <label>Severe&nbsp;</label>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>8-The preset mean of communication of the patient:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="comm_verbal" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="comm_verbal" {{ $report->comm_verbal == 1 ? 'checked' : '' }}>
                    <label>Verbal &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="comm_gestures" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="comm_gestures" {{ $report->comm_gestures == 1 ? 'checked' : '' }}>
                    <label>Gestures &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="comm_writing" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="comm_writing" {{ $report->comm_writing == 1 ? 'checked' : '' }}>
                    <label>Writing&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="comm_drawing" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="comm_drawing" {{ $report->comm_drawing == 1 ? 'checked' : '' }}>
                    <label>Drawing&nbsp;</label>
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>9-Affection of vision:&nbsp;</label>
                    <input readonly type="text" value="{{$report->vision_affection}}" name="vision_affection">
                </div>
                <div>
                    <label>Hearing:&nbsp;</label>
                    <input readonly type="text" value="{{$report->hearing_affection}}" name="hearing_affection">
                </div>
            </div>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <label>10-Previous investigation: &nbsp;CT&nbsp;</label>
                    <input readonly type="hidden" name="investigation_ct" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="investigation_ct" {{ $report->investigation_ct == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    <label>EEG:&nbsp;</label>
                    <input readonly type="hidden" name="investigation_eeg" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="investigation_eeg" {{ $report->investigation_eeg == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <h4 style="margin-left: 2rem;"><label>11-Previous lines of treatment:</label></h4>
            <div style="margin-left: 2rem; margin-top: 1rem;gap: 5rem;" class="flex">
                <div>
                    <input readonly type="hidden" name="treatment_type" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="treatment_type" {{ $report->treatment_type == 1 ? 'checked' : '' }}>
                    <label>Type &nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="treatment_onset" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="treatment_onset" {{ $report->treatment_onset == 1 ? 'checked' : '' }}>
                    <label>Onset&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="treatment_duration" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="treatment_duration" {{ $report->treatment_duration == 1 ? 'checked' : '' }}>
                    <label>Duration&nbsp;</label>
                </div>
                <div>
                    <input readonly type="hidden" name="treatment_effect" value="0">
                    <input readonly type="checkbox" onclick="return false;" value="1" name="treatment_effect" {{ $report->treatment_effect == 1 ? 'checked' : '' }}>
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
                        <input readonly type="hidden" name="exam_temperature" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="exam_temperature" {{ $report->exam_temperature == 1 ? 'checked' : '' }}> &nbsp;Temperature
                    </div>
                    <div>
                        <input readonly type="hidden" name="exam_pulse" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="exam_pulse" {{ $report->exam_pulse == 1 ? 'checked' : '' }}>
                        <span>Pulse&nbsp;</span>
                    </div>
                    <div>
                        <input readonly type="hidden" name="exam_blood_pressure" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="exam_blood_pressure" {{ $report->exam_blood_pressure == 1 ? 'checked' : '' }}>
                        <span>Blood pressure&nbsp;</span>
                    </div>
                    <div>
                        <input readonly type="hidden" name="exam_heart_murmur" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="exam_heart_murmur" {{ $report->exam_heart_murmur == 1 ? 'checked' : '' }}>
                        <span>Murmur on the heart&nbsp;</span>
                    </div>
                </div>
                <span>c) E.N.T. Examination:</span>
                <ul>
                    <li>
                        Oral cavity <input readonly type="hidden" name="ent_oral_cavity" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="ent_oral_cavity" {{ $report->ent_oral_cavity == 1 ? 'checked' : '' }}>
                    </li>
                    <li>
                        Pharynx <input readonly type="hidden" name="ent_pharynx" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="ent_pharynx" {{ $report->ent_pharynx == 1 ? 'checked' : '' }}>
                    </li>
                    <li>
                        Nasal cavity <input readonly type="hidden" name="ent_nasal_cavity" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="ent_nasal_cavity" {{ $report->ent_nasal_cavity == 1 ? 'checked' : '' }}>
                    </li>
                    <li>
                        Ears <input readonly type="hidden" name="ent_ears" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="ent_ears" {{ $report->ent_ears == 1 ? 'checked' : '' }}>
                    </li>
                    <li>
                        Indirect laryngoscopy <input readonly type="hidden" name="ent_laryngoscopy" value="0">
                        <input readonly type="checkbox" onclick="return false;" value="1" name="ent_laryngoscopy" {{ $report->ent_laryngoscopy == 1 ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>d) Neurological Examination:</span>
                <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                    <li>
                        (1) Cranial nerves: &nbsp; <input readonly type="text" value="{{ $report->cranial_nerves }}" name="cranial_nerves">
                    </li>
                    <li>
                        (2) Motor system: &nbsp; <input readonly type="text" value="{{ $report->motor_system }}" name="motor_system">
                    </li>
                    <li>
                        (3) Sensory system: &nbsp; <input readonly type="text" value="{{ $report->sensory_system }}" name="sensory_system">
                    </li>
                </ul>
                <h3><u>CLINICAL DIAGNOSTIC AIDS:</u></h3>
                <div style="display: flex;width: 70%;justify-content: space-between;">
                    <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                        <li>
                            A) Speech sample intelligibility score &nbsp;
                            <input readonly type="hidden" name="speech_intelligibility" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="speech_intelligibility" {{ $report->speech_intelligibility == 1 ? 'checked' : '' }}>
                        </li>
                        <li>
                            B) Read a standard passage aloud &nbsp;
                            <input readonly type="hidden" name="reading_passage" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="reading_passage" {{ $report->reading_passage == 1 ? 'checked' : '' }}>
                        </li>
                        <li>
                            C) Prolongation of the vowel (ah) &nbsp;
                            <input readonly type="hidden" name="vowel_prolongation" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="vowel_prolongation" {{ $report->vowel_prolongation == 1 ? 'checked' : '' }}>
                        </li>
                        <li>
                            D) Repeat syllables rapidly &nbsp;
                            <input readonly type="hidden" name="syllable_repetition" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="syllable_repetition" {{ $report->syllable_repetition == 1 ? 'checked' : '' }}>
                        </li>
                    </ul>
                    <ul class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                        <li style="margin-top: 1.5rem;">
                            -reading rate &nbsp;
                            <input readonly type="hidden" name="reading_rate" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="reading_rate" {{ $report->reading_rate == 1 ? 'checked' : '' }}>
                        </li>
                        <li>
                            -Maximum phonation time &nbsp;
                            <input readonly type="hidden" name="max_phonation_time" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="max_phonation_time" {{ $report->max_phonation_time == 1 ? 'checked' : '' }}>
                        </li>
                        <li>
                            - diadokokinetic rate &nbsp;
                            <input readonly type="hidden" name="diadokokinetic_rate" value="0">
                            <input readonly type="checkbox" onclick="return false;" value="1" name="diadokokinetic_rate" {{ $report->diadokokinetic_rate == 1 ? 'checked' : '' }}>
                        </li>
                    </ul>
                </div>
                <span>E) Formal testing:</span>
                <ol start="1" class="flex" style="list-style: none; gap: .5rem;flex-direction: column;">
                    <li>
                        1. Articulation test: &nbsp; <input readonly type="text"
                            value="{{ $report->articulation_test }}"
                            name="articulation_test">
                    </li>
                    <li>
                        2. Dysphasia test: &nbsp; <input readonly type="text"
                            value="{{ $report->dysphasia_test }}"
                            name="dysphasia_test">
                    </li>
                    <li>
                        3. Evaluation of cognitive and perceptual abilities: &nbsp; <input readonly type="text"
                            value="{{ $report->cognitive_perceptual_eval }}"
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
                                    <input readonly type="hidden" name="vital_capacity_normal" value="0">
                                    Normal &nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="vital_capacity_normal" {{ $report->vital_capacity_normal == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="vital_capacity_increase" value="0">
                                    Increase&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="vital_capacity_increase" {{ $report->vital_capacity_increase == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="vital_capacity_decrease" value="0">
                                    Decrease&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="vital_capacity_decrease" {{ $report->vital_capacity_decrease == 1 ? 'checked' : '' }}
                                        </td>
                            </tr>
                            <tr>
                                <td>
                                    -Nasal air flow:
                                </td>
                                <td>
                                    <input readonly type="hidden" name="nasal_flow_normal" value="0">
                                    Normal &nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="nasal_flow_normal" {{ $report->nasal_flow_normal == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="nasal_flow_increase" value="0">
                                    Increase&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="nasal_flow_increase" {{ $report->nasal_flow_increase == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="nasal_flow_decrease" value="0">
                                    Decrease&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="nasal_flow_decrease" {{ $report->nasal_flow_decrease == 1 ? 'checked' : '' }}>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    -Oral air flow:
                                </td>
                                <td>
                                    <input readonly type="hidden" name="oral_flow_normal" value="0">
                                    Normal &nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="oral_flow_normal" {{ $report->oral_flow_normal == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="oral_flow_increase" value="0">
                                    Increase&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="oral_flow_increase" {{ $report->oral_flow_increase == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="oral_flow_decrease" value="0">
                                    Decrease&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="oral_flow_decrease" {{ $report->oral_flow_decrease == 1 ? 'checked' : '' }}>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    -Intraoral pressure:
                                </td>
                                <td>
                                    <input readonly type="hidden" name="intraoral_pressure_normal" value="0">
                                    Normal &nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="intraoral_pressure_normal" {{ $report->intraoral_pressure_normal == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="intraoral_pressure_increase" value="0">
                                    Increase&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="intraoral_pressure_increase" {{ $report->intraoral_pressure_increase == 1 ? 'checked' : '' }}
                                        </td>
                                <td>
                                    <input readonly type="hidden" name="intraoral_pressure_decrease" value="0">
                                    Decrease&nbsp;<input readonly type="checkbox" onclick="return false;" value="1" name="intraoral_pressure_decrease" {{ $report->intraoral_pressure_decrease == 1 ? 'checked' : '' }}>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex" style="margin-left: 1rem;flex-direction: column; gap: .5rem;">
                    <div>
                        2) Acoustic Analysis: &nbsp;<input readonly type="text"
                            value="{{ $report->acoustic_analysis }}"
                            name="acoustic_analysis">
                    </div>
                    <div>
                        3) X-rays: &nbsp;<input readonly type="text"
                            value="{{ $report->xray_results }}"
                            name="xray_results">
                    </div>
                    <div>
                        4) Electromyography: &nbsp;<input readonly type="text"
                            value="{{ $report->electromyography }}"
                            name="electromyography">
                    </div>
                    <div>
                        5) Computerized Tomography (CT) of the brain: &nbsp;<input readonly type="text"
                            value="{{ $report->brain_ct }}"
                            name="brain_ct">
                    </div>
                    <div>
                        6) Electroencephalography (EEG) &nbsp;<input readonly type="text"
                            value="{{ $report->eeg_results }}"
                            name="eeg_results">
                    </div>
                    <div>
                        7) Positron Emission Tomography: &nbsp;<input readonly type="text"
                            value="{{ $report->pet_scan }}"
                            name="pet_scan">
                    </div>
                    <div>
                        8) Magnetic Resonance Imaging: &nbsp;<input readonly type="text"
                            value="{{ $report->mri_results }}"
                            name="mri_results">
                    </div>
                    <div>
                        9) Cerebral Angiography: &nbsp;<input readonly type="text"
                            value="{{ $report->cerebral_angiography }}"
                            name="cerebral_angiography">
                    </div>
                    <div>
                        10) Transcranial Doppler: Blood flow velocity: &nbsp;<input readonly type="text"
                            value="{{ $report->transcranial_doppler }}"
                            name="transcranial_doppler">
                    </div>
                    <div>
                        11) Additional Consultation &nbsp;<input readonly type="text"
                            value="{{ $report->additional_consultation }}"
                            name="additional_consultation">
                    </div>
                </div>
                <div class="flex" style="flex-direction: column; gap: .5rem;">
                    <div>
                        - Audiological &nbsp;<input readonly type="text"
                            value="{{ $report->audiological_consultation }}"
                            name="audiological_consultation">
                    </div>
                    <div>
                        - Ophthalmological &nbsp;<input readonly type="text"
                            value="{{ $report->ophthalmological_consultation }}"
                            name="ophthalmological_consultation">
                    </div>
                    <div>
                        - Others &nbsp;<textarea name="other_consultations">
                        {{ $report->other_consultations }}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class='conta'>
            <a href="{{ route('checklist_for_dysarthria_evaluation.edit', $report->id) }}" name='dko' type="submit">
                تعديل
            </a>




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