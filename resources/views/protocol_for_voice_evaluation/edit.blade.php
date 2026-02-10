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

<!-- alert -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}

</div>
@endif


<form action="{{ route('protocol_for_voice_evaluation.update' , $report->id) }}" method="POST" style="margin-top: 50px;">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h3 align="center"><u>PROTOCOL FOR VOICE EVALUATION</u></h3>
            <div class="row" style="gap: .2rem;">
                <div>
                    <span>Referral from :</span>&nbsp;
                    <input type="text" value="{{ old('referral_from', $report->referral_from) }}" name="referral_from">
                </div>
                <div>
                    <span>Date :</span>&nbsp;
                    <input type="date" value="{{ old('evaluation_date', $report->evaluation_date) }}" name="evaluation_date">
                </div>
                <div>
                    <span>Cause of referral:</span>&nbsp;
                    <input type="text" style="width: 40%;" value="{{ old('cause_of_referral', $report->cause_of_referral) }}" name="cause_of_referral">
                </div>
            </div>
            <div class="row" style="gap: .2rem; margin-left: 2rem;">
                <label style="margin-left: -1rem;">1)Personal data</label>
                <div>
                    <span>Name:</span>&nbsp;
                    <input type="text" value="{{ old('name', $report->name) }}" name="name">
                </div>
                <div>
                    <span>Age:</span>&nbsp;
                    <input type="text" style="width: 100px;" value="{{ old('age', $report->age) }}" name="age">
                </div>
                <div>
                    <span>Sex:</span>&nbsp;
                    <input type="text" style="width: 100px;" value="{{ old('sex', $report->sex) }}" name="sex">
                </div>
                <div>
                    <span>Residence:</span>&nbsp;
                    <input type="text" value="{{ old('residence', $report->residence) }}" name="residence">
                </div>
                <div>
                    <span>Education:</span>&nbsp;
                    <input type="text" value="{{ old('education', $report->education) }}" name="education">
                </div>
                <div>
                    <span>Occupation:</span>&nbsp;
                    <input type="text" value="{{ old('occupation', $report->occupation) }}" name="occupation">
                </div>
                <div>
                    <span>Material state:</span>&nbsp;
                    <input type="text" value="{{ old('material_state', $report->material_state) }}" name="material_state">
                </div>
                <div>
                    <span>Children no:</span>&nbsp;
                    <input style="width: 100px;" type="text" value="{{ old('children_no', $report->children_no) }}" name="children_no">
                </div>
            </div>
            <label>2) COMPLAINT & ANALYSIS OF SYMPTOMS:</label> <br>
            <textarea cols="100" name="complaint_analysis">{{ old('complaint_analysis', $report->complaint_analysis) }}</textarea>

            <div class="row" style="gap: .2rem;margin-left: 2rem;">
                <div>
                    <span>Duration:</span>&nbsp;
                    <input type="text" value="{{ old('duration', $report->duration) }}" name="duration">
                </div>
                <div>
                    <span>Onset:</span>&nbsp;
                    <input type="text" value="{{ old('onset', $report->onset) }}" name="onset">
                </div>
                <div>
                    <span>Following:</span>&nbsp;
                    <input type="text" value="{{ old('following', $report->following) }}" name="following">
                </div>
                <div>
                    <span>Course:</span>&nbsp;
                    <input type="text" value="{{ old('course', $report->course) }}" name="course">
                </div>
            </div>
            <label><u>Phonasthenic symptoms</u></label>
            <ul>
                <li>
                    <span>Frequent throat clearing</span>&nbsp;
                    <input type="hidden" name="frequent_throat_clearing" value="0">
                    <input type="checkbox" name="frequent_throat_clearing" value="1" {{ old('frequent_throat_clearing', $report->frequent_throat_clearing) ? 'checked' : '' }}>
                </li>
                <li>
                    <span> Sticky Throat mucous</span>&nbsp;
                    <input type="hidden" name="sticky_throat_mucous" value="0">
                    <input type="checkbox" value="1" name="sticky_throat_mucous" {{ old('sticky_throat_mucous', $report->sticky_throat_mucous) ? 'checked' : '' }}>
                </li>
                <li>
                    <span> Tenderness</span>&nbsp;
                    <input type="hidden" name="tenderness" value="0">
                    <input type="checkbox" value="1" name="tenderness" {{ old('tenderness', $report->tenderness) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>dryness</span>&nbsp;
                    <input type="hidden" name="dryness" value="0">
                    <input type="checkbox" value="1" name="dryness" {{ old('dryness', $report->dryness) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Patient's rating of the severity:</u></label>
            <ul>
                <li>
                    <span>0</span>&nbsp;
                    <input type="hidden" name="severity_rating_zero" value="0">
                    <input type="checkbox" value="1" name="severity_rating_zero" {{ old('severity_rating_zero', $report->severity_rating_zero) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>1</span>&nbsp;
                    <input type="hidden" name="severity_rating_one" value="0">
                    <input type="checkbox" value="1" name="severity_rating_one" {{ old('severity_rating_one', $report->severity_rating_one) ? 'checked' : '' }}>
                </li>
                <li>
                    <span> 2</span>&nbsp;
                    <input type="hidden" name="severity_rating_two" value="0">
                    <input type="checkbox" value="1" name="severity_rating_two" {{ old('severity_rating_two', $report->severity_rating_two) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>3</span>&nbsp;
                    <input type="hidden" name="severity_rating_three" value="0">
                    <input type="checkbox" value="1" name="severity_rating_three" {{ old('severity_rating_three', $report->severity_rating_three) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>4</span>&nbsp;
                    <input type="hidden" name="severity_rating_four" value="0">
                    <input type="checkbox" value="1" name="severity_rating_four" {{ old('severity_rating_four', $report->severity_rating_four) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Llistener’s reaction :</u></label>
            <ul>
                <li>
                    <span>+ ve</span>&nbsp;
                    <input type="hidden" name="listeners_reaction_postive" value="0">
                    <input type="checkbox" value="1" name="listeners_reaction_postive" {{ old('listeners_reaction_postive', $report->listeners_reaction_postive) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>- ve</span>&nbsp;
                    <input type="hidden" name="listeners_reaction_negative" value="0">
                    <input type="checkbox" value="1" name="listeners_reaction_negative" {{ old('listeners_reaction_negative', $report->listeners_reaction_negative) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Vocal demand:</u></label>
            <ul>
                <li>
                    <span>high</span>&nbsp;
                    <input type="hidden" name="vocal_demand_high" value="0">
                    <input type="checkbox" value="1" name="vocal_demand_high" {{ old('vocal_demand_high', $report->vocal_demand_high) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>low</span>&nbsp;
                    <input type="hidden" name="vocal_demand_low" value="0">
                    <input type="checkbox" value="1" name="vocal_demand_low" {{ old('vocal_demand_low', $report->vocal_demand_low) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Job environment:</u></label>
            <ul class="row" style="gap: .1rem;">
                <li>
                    <span> Noise:</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('noise', $report->noise) }}" name="noise">
                </li>
                <li>
                    <span>Relative humidity: </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('relative_humidity', $report->relative_humidity) }}" name="relative_humidity">
                </li>
                <li>
                    <span> temperature: </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('temperature', $report->temperature) }}" name="temperature">
                </li>
                <li>
                    <span>Irritants: </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('irritants', $report->irritants) }}" name="irritants">
                </li>
            </ul>
            <label><u>Smoking:</u></label>
            <ul class="row" style="gap: .1rem;">
                <li>
                    <span> quantity</span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('smoking_quantity', $report->smoking_quantity) }}" name="smoking_quantity">
                </li>
                <li>
                    <span>duration </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('smoking_duration', $report->smoking_duration) }}" name="smoking_duration">
                </li>
                <li>
                    <span> temperature: </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('smoking_temperature', $report->smoking_temperature) }}" name="smoking_temperature">
                </li>
                <li>
                    <span> past history </span>&nbsp;
                    <input style="width: 40%;" type="text" value="{{ old('smoking_past_history', $report->smoking_past_history) }}" name="smoking_past_history">
                </li>
            </ul>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <label><u>Spirits :</u></label>
            <ul>
                <li>
                    <span>+ ve</span>&nbsp;
                    <!-- hidden input  for storing the value -->
                    <input type="hidden" name="spirits_postive" value="0">
                    <input type="checkbox" value="1" name="spirits_postive" {{ old('spirits_postive', $report->spirits_postive) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>- ve</span>&nbsp;
                    <input type="hidden" name="spirits_negative" value="0">
                    <input type="checkbox" value="1" name="spirits_negative" {{ old('spirits_negative', $report->spirits_negative) ? 'checked' : '' }}>
                </li>
            </ul>
            <div>
                <span>Duration</span>&nbsp;
                <textarea cols="100" name="spirits_duration">{{ old('spirits_duration', $report->spirits_duration) }}</textarea>
            </div>
            <label><u>Temperament:</u></label>
            <ul>
                <li>
                    <span>quiet</span>&nbsp;
                    <input type="hidden" value="1" name="i41">
                    <input type="checkbox" value="1" name="i41" {{ old('i41', $report->i41) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>tense</span>&nbsp;
                    <input type="hidden" value="1" name="i42">
                    <input type="checkbox" value="1" name="i42" {{ old('i42', $report->i42) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Emotional Stress: </u></label>
            <ul>
                <li>
                    <span>+ ve</span>&nbsp;
                    <!-- hidden input  for storing the value -->
                    <input type="hidden" name="emotional_stress_postive" value="0">
                    <input type="checkbox" value="1" name="emotional_stress_postive" {{ old('emotional_stress_postive', $report->emotional_stress_postive) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>- ve</span>&nbsp;
                    <input type="hidden" name="emotional_stress_negative" value="0">
                    <input type="checkbox" value="1" name="emotional_stress_negative" {{ old('emotional_stress_negative', $report->emotional_stress_negative) ? 'checked' : '' }}>
                </li>
            </ul>
            <label><u>Allergic Tendencies </u></label>
            <ul>
                <li>
                    <span>+ ve</span>&nbsp;
                    <input type="hidden" name="allergic_tendencies_postive" value="0">
                    <input type="checkbox" value="1" name="allergic_tendencies_postive" {{ old('allergic_tendencies_postive', $report->allergic_tendencies_postive) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>- ve</span>&nbsp;
                    <input type="hidden" name="allergic_tendencies_negative" value="0">
                    <input type="checkbox" value="1" name="allergic_tendencies_negative" {{ old('allergic_tendencies_negative', $report->allergic_tendencies_negative) ? 'checked' : '' }}>
                </li>
            </ul>
            <div class="row" style="gap: .2rem;">
                <div>
                    <span>Repeated U.R.T infections</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('urt_infections', $report->urt_infections) }}" name="urt_infections">
                </div>
                <div>
                    <span>Chronic cough & chest diseases</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('chronic_cough', $report->chronic_cough) }}" name="chronic_cough">
                </div>
                <div>
                    <span>Breathing:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('breathing', $report->breathing) }}" name="breathing">
                </div>
                <div>
                    <span>Chewing & swallowing:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('chewing_swallowing', $report->chewing_swallowing) }}" name="chewing_swallowing">
                </div>
                <div>
                    <span>Hyperacidity& Reflux :</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('hyperacidity_reflux', $report->hyperacidity_reflux) }}" name="hyperacidity_reflux">
                </div>
            </div>
            <ul>
                <li>
                    <span>+ ve</span>&nbsp;
                    <input type="hidden" name="positive" value="0">
                    <input type="checkbox" value="1" name="positive" {{ old('positive', $report->positive) ? 'checked' : '' }}>
                </li>
                <li>
                    <span>- ve</span>&nbsp;
                    <input type="hidden" name="negative" value="0">
                    <input type="checkbox" value="1" name="negative" {{ old('negative', $report->negative) ? 'checked' : '' }}>
                </li>
            </ul>
            <div class="row" style="gap: .2rem;">
                <div>
                    <span>Medicaments</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('medicaments', $report->medicaments) }}" name="medicaments">
                </div>
                <div>
                    <span>Surgical intervention& trauma</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('surgical_intervention', $report->surgical_intervention) }}" name="surgical_intervention">
                </div>
                <div style="margin-left: 1rem;">
                    <label><u>3 )AUDITORY PERCEPTUAL ASSESSMENT (APA):</u></label>&nbsp;
                </div>
                <div style="margin-left: 1rem;">
                    <span>GRBAS</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('grbas', $report->grbas) }}" name="grbas">
                </div>
                <div>
                    <span>Pitch</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('pitch', $report->pitch) }}" name="pitch">
                </div>
            </div>
            <div class="row" style="gap: .2rem;">
                <span>Diplophonia :</span>
                <ul>
                    <li>
                        <span>Yes</span>&nbsp;
                        <!-- hidden input  for "diplophonia_yes" -->
                        <input type="hidden" name="diplophonia_yes" value="0">
                        <input type="checkbox" value="1" name="diplophonia_yes" {{ old('diplophonia_yes', $report->diplophonia_yes) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>No</span>&nbsp;
                        <input type="hidden" name="diplophonia_no" value="0">
                        <input type="checkbox" value="1" name="diplophonia_no" {{ old('diplophonia_no', $report->diplophonia_no) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Register : </span>
                <ul>
                    <li>
                        <span>Habitual</span>&nbsp;
                        <input type="hidden" name="register_0" value="0">
                        <input type="checkbox" value="1" name="register_1" {{ old('register_1', $report->register_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>modal</span>&nbsp;
                        <input type="hidden" name="register_2" value="0">
                        <input type="checkbox" value="1" name="register_2" {{ old('register_2', $report->register_2) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>falsetto</span>&nbsp;
                        <input type="hidden" name="register_3" value="0">
                        <input type="checkbox" value="1" name="register_3" {{ old('register_3', $report->register_3) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Tendency of vocal fry at the end of phrase:</span>
                <ul>
                    <li>
                        <span>Yes</span>&nbsp;
                        <!-- hidden input  for "vocal_fry_1" -->
                        <input type="hidden" name="vocal_fry_1" value="0">
                        <input type="checkbox" value="1" name="vocal_fry_1" {{ old('vocal_fry_1', $report->vocal_fry_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>No</span>&nbsp;
                        <input type="hidden" name="vocal_fry_2" value="0">
                        <input type="checkbox" value="1" name="vocal_fry_2" {{ old('vocal_fry_2', $report->vocal_fry_2) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Register break:</span>
                <ul>
                    <li>
                        <span>Yes</span>&nbsp;
                        <input type="hidden" name="register_break_1" value="0">
                        <input type="checkbox" value="1" name="register_break_1" {{ old('register_break_1', $report->register_break_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>No</span>&nbsp;
                        <input type="hidden" name="register_break_2" value="0">
                        <input type="checkbox" value="1" name="register_break_2" {{ old('register_break_2', $report->register_break_2) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Loudness:</span>
                <ul>
                    <li>
                        <span>Excessive</span>&nbsp;
                        <!-- hidden input  for "loudness_ex" -->
                        <input type="hidden" name="loudness_ex" value="0">
                        <input type="checkbox" value="1" name="loudness_ex" {{ old('loudness_ex', $report->loudness_ex) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>Soft</span>&nbsp;
                        <input type="hidden" name="loudness_soft" value="0">
                        <input type="checkbox" value="1" name="loudness_soft" {{ old('loudness_soft', $report->loudness_soft) ? 'checked' : '' }}>
                    </li>
                </ul>
                <div>
                    <span>Glottal attack:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('glottal_attack', $report->glottal_attack) }}" name="glottal_attack">
                </div>
                <label><u>Associated laryngeal functions :</u></label>
                <div>
                    <span>Cough</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('cough', $report->cough) }}" name="cough">
                </div>
                <div>
                    <span>whisper</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('whisper', $report->whisper) }}" name="whisper">
                </div>
                <div>
                    <span>laughter</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('laughter', $report->laughter) }}" name="laughter">
                </div>
                <div>
                    <span>Oral cavity:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('oral_cavity', $report->oral_cavity) }}" name="oral_cavity">
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <label><u>Pharynx :</u></label>
            <div class="row" style="gap: .2rem;">
                <span>Tonsils :</span>
                <ul>
                    <li>
                        <span>+ ve</span>&nbsp;
                        <!-- hidden input  for "tonsils_postive" -->
                        <input type="hidden" name="tonsils_postive" value="0">
                        <input type="checkbox" value="1" name="tonsils_postive" {{ old('tonsils_postive', $report->tonsils_postive) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>- ve</span>&nbsp;
                        <input type="hidden" name="tonsils_negative" value="0">
                        <input type="checkbox" value="1" name="tonsils_negative" {{ old('tonsils_negative', $report->tonsils_negative) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Post nasal discharge:</span>
                <ul>
                    <li>
                        <span>+ ve</span>&nbsp;
                        <input type="hidden" name="post_nasal_discharge_postive" value="0">
                        <input type="checkbox" value="1" name="post_nasal_discharge_postive" {{ old('post_nasal_discharge_postive', $report->post_nasal_discharge_postive) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>- ve</span>&nbsp;
                        <input type="hidden" name="post_nasal_discharge_negative" value="0">
                        <input type="checkbox" value="1" name="post_nasal_discharge_negative" {{ old('post_nasal_discharge_negative', $report->post_nasal_discharge_negative) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Laryngeal skeleton:</span>
                <ul>
                    <li>
                        Normal configuration&nbsp;
                        <input type="hidden" name="laryngeal_skeleton_normal" value="0">
                        <input type="checkbox" value="1" name="laryngeal_skeleton_normal" {{ old('laryngeal_skeleton_normal', $report->laryngeal_skeleton_normal) ? 'checked' : '' }}>
                    </li>
                    <li>
                        Fractures:&nbsp;
                        <input type="hidden" name="fractures" value="0">
                        <input type="checkbox" value="1" name="fractures" {{ old('fractures', $report->fractures) ? 'checked' : '' }}><br>
                        site&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('fracture_site', $report->fracture_site) }}" name="fracture_site"><br>
                        type&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('fracture_type', $report->fracture_type) }}" name="fracture_type">
                    </li>
                    <li>
                        other abnormalities&nbsp;
                        <input type="hidden" name="abnormalities" value="0">
                        <input type="checkbox" value="1" name="abnormalities" {{ old('abnormalities', $report->abnormalities) ? 'checked' : '' }}>
                    </li>
                </ul>
                <div>
                    <span>Laryngeal click</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('laryngeal_click', $report->laryngeal_click) }}" name="laryngeal_click">
                </div>
                <div>
                    <span>Laryngeal position</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('laryngeal_position', $report->laryngeal_position) }}" name="laryngeal_position">
                </div>
                <div>
                    <span>Cervical veins</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('cervical_veins', $report->cervical_veins) }}" name="cervical_veins">
                </div>
                <label>Neck scars :</label>
                <ul>
                    <li>
                        Yes :&nbsp;
                        <input type="hidden" name="neck_scars_yes" value="0">
                        <input type="checkbox" value="1" name="neck_scars_yes" {{ old('neck_scars_yes', $report->neck_scars_yes) ? 'checked' : '' }}><br>
                        type&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('scar_type', $report->scar_type) }}" name="scar_type"><br>
                        site&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('scar_site', $report->scar_site) }}" name="scar_site"> <br>
                        size&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('scar_size', $report->scar_size) }}" name="scar_size">
                    </li>
                    <li>
                        No&nbsp;
                        <input type="hidden" name="neck_scars_no" value="0">
                        <input type="checkbox" value="1" name="neck_scars_no" {{ old('neck_scars_no', $report->neck_scars_no) ? 'checked' : '' }}>
                    </li>
                </ul>
                <h4><u>INDIRECT LARYNGOSCOPY</u></h4>
                <label><u>VOCAL FOLDS:</u></label>
                <div>
                    <span>Color:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('vocal_color', $report->vocal_color) }}" name="vocal_color">
                </div>
                <div>
                    <span>Luster:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('vocal_luster', $report->vocal_luster) }}" name="vocal_luster">
                </div>
                <div>
                    <span>Transparency:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('vocal_transparency', $report->vocal_transparency) }}" name="vocal_transparency">
                </div>
                <div>
                    <span>Vascular markings:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('vascular_markings', $report->vascular_markings) }}" name="vascular_markings">
                </div>
                <div>
                    <span>Swelling:</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('swelling', $report->swelling) }}" name="swelling">
                </div>
                <ul>
                    <li>
                        <span>Edge</span>&nbsp;
                        <!-- hidden input  for edge -->
                        <input type="hidden" name="edge" value="0">
                        <input type="checkbox" value="1" name="edge" {{ old('edge', $report->edge) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>Surface</span>&nbsp;
                        <!-- hidden input  for surface -->
                        <input type="hidden" name="surface" value="0">
                        <input type="checkbox" value="1" name="surface" {{ old('surface', $report->surface) ? 'checked' : '' }}>
                    </li>
                </ul>
                <span>Ulcers: </span>
                <ul>
                    <li>
                        <span>No</span>&nbsp;
                        <input type="hidden" name="has_ulcers_1" value="0">
                        <input type="checkbox" value="1" name="has_ulcers_1" {{ old('has_ulcers_1', $report->has_ulcers_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        Yes :&nbsp;
                        <input type="hidden" name="has_ulcers_2" value="0">
                        <input type="checkbox" value="1" name="has_ulcers_2" {{ old('has_ulcers_2', $report->has_ulcers_2) ? 'checked' : '' }}><br>
                        Site&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('ulcer_site', $report->ulcer_site) }}" name="ulcer_site"><br>
                        size&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('ulcer_size', $report->ulcer_size) }}" name="ulcer_size"> <br>
                        floor&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('ulcer_floor', $report->ulcer_floor) }}" name="ulcer_floor"> <br>
                        edge&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('ulcer_edge', $report->ulcer_edge) }}" name="ulcer_edge">
                    </li>
                </ul>
                <div>
                    <span>Girth</span>&nbsp;
                    <input type="text" style="width: 50%" value="{{ old('girth', $report->girth) }}" name="girth">
                </div>
                <span>Glottis :</span>
                <div class="flex">
                    <div style="width: 65%;">
                        <ul>
                            <li>
                                <span>Symmetrical</span>&nbsp;
                                <!-- hidden -->
                                <input type="hidden" name="glottis_symmetry" value="0">
                                <input type="checkbox" value="1" name="glottis_symmetry" {{ old('glottis_symmetry', $report->glottis_symmetry) ? 'checked' : '' }}>
                            </li>
                            <li>
                                <span>Asymmetrical</span>&nbsp;
                                <input type="hidden" name="glottis_asymmetry" value="0">
                                <input type="checkbox" value="1" name="glottis_asymmetry" {{ old('glottis_asymmetry', $report->glottis_asymmetry) ? 'checked' : '' }}>
                            </li>
                        </ul>
                        <span>Deviation:</span>
                        <ul>
                            <li>
                                <span>No</span>&nbsp;
                                <input type="hidden" name="has_deviation_1" value="0">
                                <input type="checkbox" value="1" name="has_deviation_1" {{ old('has_deviation_1', $report->has_deviation_1) ? 'checked' : '' }}>
                            </li>
                            <li>
                                <span>Yes</span>&nbsp;
                                <input type="hidden" name="has_deviation_2" value="0">
                                <input type="checkbox" value="1" name="has_deviation_2" {{ old('has_deviation_2', $report->has_deviation_2) ? 'checked' : '' }}>
                            </li>
                        </ul>
                        <div>
                            <span>To</span>&nbsp;
                            <input type="text" style="width: 90%" value="{{ old('deviation_to', $report->deviation_to) }}" name="deviation_to">
                        </div>
                        <span>Glottic gap</span>
                    </div>
                    <div>
                        <img src="data:image/png;base64,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"
                            alt="Not found">
                    </div>
                </div>
                <ul>
                    <li>
                        <span>No</span>&nbsp;
                        <input type="hidden" name="has_glottic_gap_1" value="0">
                        <input type="checkbox" value="1" name="has_glottic_gap_1" {{ old('has_glottic_gap_1', $report->has_glottic_gap_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        Yes :&nbsp;
                        <!-- hidden input  field -->
                        <input type="hidden" name="has_glottic_gap_2" value="0">
                        <input type="checkbox" value="1" name="has_glottic_gap_2"
                            {{ old('has_glottic_gap_2', $report->has_glottic_gap_2) ? 'checked' : '' }}>
                        ><br>
                        Site&nbsp;
                        <input type="text" style="width: 60%;" value="{{old('glottic_gap_site', $report->glottic_gap_site)}}" name="glottic_gap_site"><br>
                        size&nbsp;
                        <input type="text" style="width: 60%;" value="{{ old('glottic_gap_size', $report->glottic_gap_size) }}" name="glottic_gap_size">
                    </li>
                </ul>
                <span>Phonatory waste :</span>
                <ul>
                    <li>
                        <span>No</span>&nbsp;
                        <!-- hidden input  field -->
                        <input type="hidden" name="phonatory_waste_1" value="0">
                        <input type="checkbox"
                            value="1" name="phonatory_waste_1" {{ old('phonatory_waste_1', $report->phonatory_waste_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>Yes</span>&nbsp;
                        <!-- hidden input  field -->
                        <input type=" hidden" name="phonatory_waste_2" value="0">
                        <input type="checkbox" value="1" name="phonatory_waste_2"
                            {{ old('phonatory_waste_2', $report->phonatory_waste_2) ? 'checked' : '' }}>
                        >
                    </li>
                </ul>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <div class="row" style="gap: .2rem;">
                <div class="flex" style="margin-top: 1rem;">
                    <span class="flex"><span>Respiratory</span>&nbsp; <span>chink</span></span>&nbsp;
                    <input type="text" style="width: 85%" value="{{ old('respiratory_chink', $report->respiratory_chink) }} " name=" respiratory_chink">
                </div>
                <span>Phase closure Predominate</span>
                <ul>
                    <li>
                        <span>Open</span>&nbsp;
                        <!-- hidden input  field -->
                        <input type="hidden" name="phase_closure_open" value="0">
                        <input type="checkbox" value="1" name="phase_closure_open"
                            {{ old('phase_closure_open', $report->phase_closure_open) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>Close</span>&nbsp;
                        <input type="hidden" name="phase_closure_closed" value="0">
                        <input type="checkbox" value="1" name="phase_closure_closed"
                            {{ old('phase_closure_closed', $report->phase_closure_closed) ? 'checked' : '' }}>
                    </li>
                </ul>
                <label><u>Glottic Wave</u></label>
                <span>Stroboscopic fixation :</span>
                <ul>
                    <li>
                        <span>No</span>&nbsp;
                        <!-- hidden input  field -->
                        <input type="hidden" name="stroboscopic_fixation_1" value="0">
                        <input type="checkbox" value="1" name="stroboscopic_fixation_1"
                            {{ old('stroboscopic_fixation_1', $report->stroboscopic_fixation_1) ? 'checked' : '' }}>
                    </li>
                    <li>
                        <span>Yes</span>&nbsp;
                        <input type="hidden" name="stroboscopic_fixation_2" value="0">
                        <input type="checkbox" value="1" name="stroboscopic_fixation_2"
                            {{ old('stroboscopic_fixation_2', $report->stroboscopic_fixation_2) ? 'checked' : '' }}>
                    </li>
                </ul>
                <div>
                    <span>Segment</span>&nbsp;
                    <input type="text" style="width: 70%" value="{{ old('segment', $report->segment) }}" name=" segment">
                </div>
                <div>
                    <span>Additional morphological findings details :</span>&nbsp;
                    <input type="text" style="width: 40%" value="{{ old('morphological_findings', $report->morphological_findings) }}" name="morphological_findings">
                </div>
                <label><u>Ventricular folds : </u></label>
                <div>
                    <span>Color</span>&nbsp;
                    <input type="text" style="width: 70%" value="{{ old('ventricular_color', $report->ventricular_color) }}" name="ventricular_color">
                </div>
                <div>
                    <span>masses</span>&nbsp;
                    <input type="text" style="width: 70%" value="{{ old('ventricular_masses', $report->ventricular_masses) }}" name="ventricular_masses">
                </div>
                <div>
                    <span>Girth</span>&nbsp;
                    <input type="text" style="width: 70%" value="   {{ old('ventricular_girth', $report->ventricular_girth) }}"
                        name="ventricular_girth">
                </div>
                <div>
                    <span>Position at phonation</span>&nbsp;
                    <input type="text" style="width: 70%" value="  {{ old('phonation_position', $report->phonation_position) }}"
                        name="phonation_position">
                </div>
                <label><u>ADDITIONAL INSTRUMENTAL MEASURE</u></label>
                <div>
                    <span>ACOUSTIC ANALYSIS :</span>&nbsp;
                    <input type="text" style="width: 70%" value="
                    {{ old('acoustic_analysis', $report->acoustic_analysis) }} " name=" acoustic_analysis">
                </div>
                <div>
                    <span>RADIOLOGICAL STUDIES</span>&nbsp;
                    <input type="text" style="width: 70%" value="   {{ old('radiological_studies', $report->radiological_studies) }}
                    " name="radiological_studies">
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