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

    <body style="display: flex; flex-direction: column; font-weight: .5rem; align-items: center; gap: 2rem;">
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h3>A) Dysfluency Sheet</h3>
            <label>1) Personal Data:</label>
            <div class="row" style="gap: .3rem;margin-left: 2rem;">
                <div class="flex">
                    <span>Name:</span>&nbsp;
                    <input readonly type="text" value="{{ $report->name }}" name="name">&nbsp;&nbsp;
                    <span>Age:</span>&nbsp;
                    <input readonly style="width: 50px;" type="number" value="{{ $report->age }}" name="age">&nbsp;&nbsp;
                    <span>Sex:</span>&nbsp;
                    <input readonly style="width: 60px;" type="text" value="{{ $report->sex }}" name="sex">&nbsp;&nbsp;
                    <span>Residence:</span>&nbsp;
                    <input readonly type="text" value="{{ $report->residence }}" name="residence">&nbsp;&nbsp;
                    <span>Tel:</span>&nbsp;
                    <input readonly type="text" value="{{ $report->tel }}" name="tel">&nbsp;&nbsp;
                </div>
                <div class="flex">
                    <span>Parent Age:</span>&nbsp;
                    <input readonly type="text" value="{{ $report->parent_age }}" name="parent_age">&nbsp;&nbsp;
                    <span>Job:</span>&nbsp;
                    <input readonly type="text" value="{{ $report->job }}" name="job">
                </div>
                <div class="flex" style="justify-content: space-between;">
                    <div>
                        <span>Socioeconomic Status:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->socioeconomic_status }}" name="socioeconomic_status">&nbsp;&nbsp;
                    </div>
                    <div>
                        <span>Home occupancy:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->home_occupancy }}" name="home_occupancy">
                    </div>
                </div>
                <div class="flex" style="justify-content: space-between;">
                    <div>
                        <span>Handedness:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->handedness }}" name="handedness">&nbsp;&nbsp;
                    </div>
                    <div>
                        <span>Bilingualism:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->bilingualism }}" name="bilingualism">
                    </div>
                </div>
                <div class="flex" style="justify-content: space-between;">
                    <div>
                        <span>Education:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->education }}" name="education">&nbsp;&nbsp;
                    </div>
                    <div>
                        <span>Occupation:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->occupation }}" name="occupation">
                    </div>
                </div>
                <div class="flex" style="justify-content: space-between;">
                    <div>
                        <span>Motor Skill :</span>&nbsp;
                        <input readonly type="text" value="{{ $report->motor_skill }}" name="motor_skill">&nbsp;&nbsp;
                    </div>
                    <div>
                        <span>Hearing Subjectively:</span>&nbsp;
                        <input readonly type="text" value="{{ $report->hearing_subjectively }}" name="hearing_subjectively">
                    </div>
                </div>
                <div>
                    <div>
                        <span>Similar conditions in the family:</span>&nbsp;
                        <input readonly style="width: 70%;" type="text" value="{{ $report->similar_conditions_in_family }}" name="similar_conditions_in_family">
                    </div>
                </div>
            </div>
            <label>2) Complaint & Analysis of Symptoms:</label> <br>
            <span style="color: red;margin: 1rem 0;display: inline-block;">○</span>
            <div class="row">
                <div>
                    <span>Duration:</span>&nbsp;
                    <input readonly style="width: 70%;" type="text" value="{{ $report->duration }}" name="duration">
                </div>
                <div>
                    Onset:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    gradual&nbsp;
                    <input readonly type="checkbox"
                        value="1"
                        name="onset_gradual"
                        onclick="return false;"
                        {{ $report->onset_gradual == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Sudden&nbsp;
                    <input readonly type="checkbox" value="1" name="onset_sudden" onclick="return false;"
                        {{ $report->onset_sudden == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    Course:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    stationary&nbsp;
                    <input readonly type="checkbox"
                        value="1"
                        name="course_stationary"
                        onclick="return false;"
                        {{ $report->course_stationary == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    increasing&nbsp;
                    <input readonly type="checkbox"
                        value="1"
                        name="course_increasing"
                        onclick="return false;"
                        {{ $report->course_increasing == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Intermittent&nbsp;
                    <input readonly type="checkbox" name="course_intermittent"
                        onclick="return false;"
                        {{ $report->course_intermittent == 1 ? 'checked' : '' }}>
                </div>
                <label>3) Impact of Complaint on the Patient:</label>
                <div class="row" style="margin-left: 2rem;gap: .3rem;">
                    <div class="flex">
                        <span class="flex"><span>Patient's</span>&nbsp;<span>rating</span>&nbsp;<span>of</span>&nbsp;<span>the</span>&nbsp;<span>severity:</span>&nbsp;<span>(0-</span>&nbsp;<span>3)</span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->patients_severity_rating}}" name="patients_severity_rating">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>Listener’s</span>&nbsp;<span>&nbsp;</span><span>reaction:</span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->listeners_reaction}}" name="listeners_reaction">
                    </div>
                    <span>Effect on personal, social, heterosexual, home, school, vocational, behavior</span> <br>
                    <textarea class="w-full" name="effect_on_personal_social_behavior">
                    {{$report->effect_on_personal_social_behavior}}
                    </textarea>
                </div>
                <label> 4) Illness of Early Childhood</label>
                <div class="row" style="margin-left: 10rem;gap: .3rem;">
                    <div class="flex" style="justify-content: space-between;">
                        <div>
                            <span>Fits:</span>&nbsp;
                            <input readonly type="text" value="{{$report->fits}}" name="fits">&nbsp;&nbsp;
                        </div>
                        <div>
                            <span>Drugs:</span>&nbsp;
                            <input readonly type="text" value="{{$report->drugs}}" name="drugs">
                        </div>
                    </div>
                    <div class="flex" style="justify-content: space-between;">
                        <div>
                            <span>History of DLD:</span>&nbsp;
                            <input readonly type="text" value="{{$report->history_of_dld}}" name="history_of_dld">&nbsp;&nbsp;
                        </div>
                        <div>
                            <span>Earlier intervention:</span>&nbsp;
                            <input readonly type="text" value="{{$report->earlier_intervention}}" name="earlier_intervention">
                        </div>
                    </div>
                </div>
                <label> 5) Present Illness:</label>
                <div class="row" style="margin-left: 2rem;gap: .3rem;">
                    <div class="flex">
                        <span class="flex"><span>The&nbsp;<span>probable&nbsp;<span>cause:</span></span></span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->probable_cause}}" name="probable_cause">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>The</span>&nbsp;<span>problem</span>&nbsp;<span>gets</span>&nbsp;<span>worse</span>&nbsp;<span>when:</span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->problem_worse_when}}" name="problem_worse_when">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>The</span>&nbsp;<span>problem</span>&nbsp;<span>gets</span>&nbsp;<span>better</span>&nbsp;<span>when:</span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->problem_better_when}}" name="problem_better_when">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>The</span>&nbsp;<span>most</span>&nbsp;<span>difficult</span>&nbsp;<span>phonemes</span>&nbsp;<span>or</span>&nbsp;<span>words</span>&nbsp;<span>are</span>&nbsp;<span>:</span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->difficult_phonemes_words}}" name="difficult_phonemes_words">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>When&nbsp;<span>the&nbsp;<span>patient</span>&nbsp;<span>meets</span>&nbsp;<span>a</span>&nbsp;&nbsp;<span>difficult</span>&nbsp;<span>word:</span></span></span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->reaction_to_difficult_word}}" name="reaction_to_difficult_word">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>Avoidance&nbsp;<span>in&nbsp;<span>speech</span>&nbsp;<span>situations:</span></span></span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->speech_situations_avoidance}}" name="speech_situations_avoidance">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>When&nbsp;<span>the&nbsp;<span>patient</span>&nbsp;<span>reads</span>&nbsp;<span>alone:</span></span></span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->reading_alone_effect}}" name="reading_alone_effect">
                    </div>
                    <div class="flex">
                        <span class="flex"><span>When&nbsp;<span>the&nbsp;<span>patient</span>&nbsp;<span>expects</span>&nbsp;<span>the</span>&nbsp;<span>problem:</span></span></span></span>&nbsp;
                        <input readonly class="w-full" type="text" value="{{$report->anticipation_of_problem_effect}}" name="anticipation_of_problem_effect">
                    </div>
                </div>
            </div>
        </div>
        <div style="min-width: 820px; max-width: 1060px;font-size: 14px;" class="border Subjective_Assessment_con">
            <h3>B) Auditory perceptual Assessment:</h3>
            <label>1) Features of the patient's Speech:</label>
            <div class="row" style="margin-left: 3rem;gap: .3rem;">
                <label>Core Behavior:</label>
                <div>
                    Intraphonemic Disruption :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Part Sound&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="intraphonemic_disruption_part_sound" {{ $report->intraphonemic_disruption_part_sound == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                    Part syllable&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="intraphonemic_disruption_part_syllable" {{ $report->intraphonemic_disruption_part_syllable == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    Adequate initiation of phonation :&nbsp;&nbsp;
                    <input readonly class="w-half" type="text" value=" {{ $report->adequate_phonation}} " name="adequate_phonation">
                </div>
                <label>Secondary Reactions:</label>
                <div>
                    Prolongation&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="secondary_prolongation" {{ $report->secondary_prolongation == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                    Tonic blockage&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="secondary_blockage" {{ $report->secondary_blockage == 1 ? 'checked' : '' }}>
                </div>
                <label>Devices to cancel stuttering:</label>
                <div>
                    Avoidance: <input readonly type="checkbox" onclick="return false;" value="1" name="stuttering_avoidance" {{ $report->stuttering_avoidance == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Mutism&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="stuttering_mutism" {{ $report->stuttering_mutism == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                    Word substitution&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="stuttering_substitution" {{ $report->stuttering_substitution == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp;
                    Talking&nbsp;
                    <input readonly type="checkbox" onclick="return false;" value="1" name="stuttering_talking" {{ $report->stuttering_talking == 1 ? 'checked' : '' }}>
                </div>
                <div>
                    <span>Post ponement pausing</span>&nbsp;
                    <input readonly type="text" value="{{$report->ponement_pausing}}" name="ponement_pausing">&nbsp;&nbsp;&nbsp;
                    Repeating proceeded words&nbsp;
                    <input readonly type="text" value="{{$report->repeating_proceeded_words}}" name="repeating_proceeded_words">
                </div>
            </div>
        </div>
    </body>

    <div class='conta'>
        <a href="{{ route('dysfluency_sheet.edit' , $report->id ) }}" class="dko">
            تعديل
        </a>
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