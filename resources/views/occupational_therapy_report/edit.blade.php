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
    </style>
</head>

<form action=" {{ route('occupational_therapy_report.update' , $report->id) }}" method="Post">
    @csrf
    @method('PUT')

    <body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
        <div class="border size-fit p-fit">
            <h3>OCCUPATIONAL THERAPY REPORT</h3>
            <div style="display: flex; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; gap: 1rem; width: 45%;">
                    <div class="flex">
                        <label for="name">Name:</label>&nbsp;&nbsp;
                        <input class="w-full" type="text" value='{{ $report->patient_name }}' name="patient_name" id="name">
                    </div>
                    <div class="flex">
                        <label for="AGE">AGE:</label>&nbsp;&nbsp;
                        <input class="w-full" type="text" value='{{ $report->age }}' name="age" id="AGE">
                    </div>
                    <div class="flex">
                        <label for="GENDER">GENDER:</label>&nbsp;&nbsp;
                        <input class="w-full" type="text" value='{{ $report->gender }}' name="gender" id="GENDER">
                    </div>
                    <div class="flex">
                        <label for="DATE">DATE:</label>&nbsp;&nbsp;
                        <input class="w-full" type="text" value='{{ $report->date }}' name="date" id="DATE">
                    </div>
                    <div class="flex">
                        <label class="flex" for="THERAPISTNAME"><span>THERAPIST</span>&nbsp; <span>NAME:</span></label>&nbsp;&nbsp;
                        <input class="w-full" type="text" value='{{ $report->therapist_name }}' name="therapist_name" id="THERAPISTNAME">
                    </div>
                    <div>
                        <label for="DIAGNOSIS">DIAGNOSIS:</label>&nbsp;&nbsp;<br>
                        <textarea name="diagnosis" id="DIAGNOSIS" style="width: 95%;" rows="5">{{ $report->diagnosis }}</textarea>
                    </div>
                    <div>
                        <label for="MEDICAL">MEDICAL HISTORY:</label>&nbsp;&nbsp;<br>
                        <textarea name="medical_history" id="MEDICAL" style="width: 95%;" rows="5">{{ $report->medical_history }}</textarea>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 1rem; width: 45%;">
                    <div>
                        <label for="MEDICATION">MEDICATION:</label>&nbsp;&nbsp;<br>
                        <textarea name="medication" id="MEDICATION" style="width: 95%;" rows="5">{{ $report->medication }}</textarea>
                    </div>
                    <div>
                        <label for="PRECAUTIONS">PRECAUTIONS:</label>&nbsp;&nbsp;<br>
                        <textarea name="precautions" id="PRECAUTIONS" style="width: 95%;" rows="5">{{ $report->precautions }}</textarea>
                    </div>
                    <div>
                        <label for="SOCIALHISTORY">SOCIAL HISTORY:</label>&nbsp;&nbsp;<br>
                        <textarea name="social_history" id="SOCIALHISTORY" style="width: 95%;" rows="5">{{ $report->social_history }}</textarea>
                    </div>
                    <div>
                        <h4>MUSCULOSKELETAL FUNCTION:</h4>
                        <div class="flex">
                            <label class="flex" for="GrossMotorSkills"><span>Gross</span>&nbsp; <span>Motor</span>&nbsp; <span>Skills:</span></label>&nbsp;&nbsp;
                            <input class="w-full" type="text" value='{{ $report->gross_motor_skills }}' name="gross_motor_skills" id="GrossMotorSkills">
                        </div>
                        <div style="margin-top: 1rem;" class="flex">
                            <label class="flex" for="FineMotorSkills"><span>Fine</span> &nbsp;<span>Motor</span>&nbsp; <span>Skills:</span></label>&nbsp;&nbsp;
                            <input class="w-full" type="text" value='{{ $report->fine_motor_skills }}' name="fine_motor_skills" id="FineMotorSkills">
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 1.5rem;">
                <span style="font-size: 18px; font-weight: bold; text-decoration: underline; border: 1px solid black; display: inline-block; padding: 0.5rem 2rem;">
                    Range of Motion
                </span>
            </div>

            <h3><u style="text-align: center;">Right Lower Limb</u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">Full ROM</th>
                        <th class="t-center">Limited ROM</th>
                        <th class="t-center">Specify if Limited ROM</th>
                    </tr>
                    <tr>
                        <th>Shoulder</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->shoulder_full_rom }}' name="shoulder_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->shoulder_limited_rom }}' name="shoulder_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->shoulder_specify_limited_rom }}' name="shoulder_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Elbow</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->elbow_full_rom }}' name="elbow_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->elbow_limited_rom }}' name="elbow_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->elbow_specify_limited_rom }}' name="elbow_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Wrist</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->wrist_full_rom }}' name="wrist_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->wrist_limited_rom }}' name="wrist_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->wrist_specify_limited_rom }}' name="wrist_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Fingers</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->fingers_full_rom }}' name="fingers_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->fingers_limited_rom }}' name="fingers_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->fingers_specify_limited_rom }}' name="fingers_specify_limited_rom"></th>
                    </tr>
                </tbody>
            </table>
            </table>
        </div>


        <div class="border size-fit p-fit">
            <h3>
                <u style="text-align: center;">Left Upper Limb</u>
            </h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">Full ROM</th>
                        <th class="t-center">Limited ROM</th>
                        <th class="t-center">Specify if Limited ROM</th>
                    </tr>
                    <tr>
                        <th>Shoulder</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_full_rom }}' name="left_shoulder_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_limited_rom }}' name="left_shoulder_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_specify_limited_rom }}' name="left_shoulder_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Elbow</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_full_rom }}' name="left_elbow_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_limited_rom }}' name="left_elbow_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_specify_limited_rom }}' name="left_elbow_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Wrist</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_full_rom }}' name="left_wrist_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_limited_rom }}' name="left_wrist_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_specify_limited_rom }}' name="left_wrist_specify_limited_rom"></th>
                    </tr>
                    <tr>
                        <th>Fingers</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_full_rom }}' name="left_fingers_full_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_limited_rom }}' name="left_fingers_limited_rom"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_specify_limited_rom }}' name="left_fingers_specify_limited_rom"></th>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: center; margin-bottom:1rem; margin-top: 1.5rem;">
                <span style="font-size: 18px; font-weight: bold; text-decoration: underline; border: 1px solid black; display: inline-block; padding: 0.5rem 2rem;">
                    Muscle Power ( Oxford Scale )
                </span>
            </div>

            <h3><u style="text-align: center;">Right Lower Limb</u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">1/5</th>
                        <th class="t-center">2/5</th>
                        <th class="t-center">3/5</th>
                        <th class="t-center">4/5</th>
                        <th class="t-center">5/5</th>
                    </tr>
                    <tr>
                        <th>Hip</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_hip_1_5 }}' name="right_hip_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_hip_2_5 }}' name="right_hip_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_hip_3_5 }}' name="right_hip_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_hip_4_5 }}' name="right_hip_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_hip_5_5 }}' name="right_hip_5_5"></th>
                    </tr>
                    <tr>
                        <th>Knee</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_knee_1_5 }}' name="right_knee_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_knee_2_5 }}' name="right_knee_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_knee_3_5 }}' name="right_knee_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_knee_4_5 }}' name="right_knee_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_knee_5_5 }}' name="right_knee_5_5"></th>
                    </tr>
                    <tr>
                        <th>Ankle</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_ankle_1_5 }}' name="right_ankle_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_ankle_2_5 }}' name="right_ankle_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_ankle_3_5 }}' name="right_ankle_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_ankle_4_5 }}' name="right_ankle_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_ankle_5_5 }}' name="right_ankle_5_5"></th>
                    </tr>
                    <tr>
                        <th>Toes</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_toes_1_5 }}' name="right_toes_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_toes_2_5 }}' name="right_toes_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_toes_3_5 }}' name="right_toes_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_toes_4_5 }}' name="right_toes_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_toes_5_5 }}' name="right_toes_5_5"></th>
                    </tr>
            </table>

            <h3><u style="text-align: center;">Left Lower Limb</u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">1/5</th>
                        <th class="t-center">2/5</th>
                        <th class="t-center">3/5</th>
                        <th class="t-center">4/5</th>
                        <th class="t-center">5/5</th>
                    </tr>
                    <tr>
                        <th>Hip</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_hip_1_5 }}' name="left_hip_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_hip_2_5 }}' name="left_hip_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_hip_3_5 }}' name="left_hip_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_hip_4_5 }}' name="left_hip_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_hip_5_5 }}' name="left_hip_5_5"></th>
                    </tr>
                    <tr>
                        <th>Knee</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_knee_1_5 }}' name="left_knee_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_knee_2_5 }}' name="left_knee_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_knee_3_5 }}' name="left_knee_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_knee_4_5 }}' name="left_knee_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_knee_5_5 }}' name="left_knee_5_5"></th>
                    </tr>
                    <tr>
                        <th>Ankle</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_ankle_1_5 }}' name="left_ankle_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_ankle_2_5 }}' name="left_ankle_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_ankle_3_5 }}' name="left_ankle_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_ankle_4_5 }}' name="left_ankle_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_ankle_5_5 }}' name="left_ankle_5_5"></th>
                    </tr>
                    <tr>
                        <th>Toes</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_toes_1_5 }}' name="left_toes_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_toes_2_5 }}' name="left_toes_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_toes_3_5 }}' name="left_toes_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_toes_4_5 }}' name="left_toes_4_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_toes_5_5 }}' name="left_toes_5_5"></th>
                    </tr>
                </tbody>
            </table>



            <div style="text-align: center; margin-bottom:1rem; margin-top: 1.5rem;">
                <span style="font-size: 18px; font-weight: bold; text-decoration: underline; border: 1px solid black; display: inline-block; padding: 0.5rem 2rem;">
                    Muscle Tone (MAS)
                </span>
            </div>

            <h3><u style="text-align: center;">Right Lower Limb</u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">1/4</th>
                        <th class="t-center">2/4</th>
                        <th class="t-center">3/4</th>
                        <th class="t-center">4/4</th>
                    </tr>
                    <tr>
                        <th>Shoulder</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_shoulder_1_5 }}' name="right_shoulder_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_shoulder_2_5 }}' name="right_shoulder_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_shoulder_3_5 }}' name="right_shoulder_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_shoulder_4_5 }}' name="right_shoulder_4_5"></th>
                    </tr>
                    <tr>
                        <th>Elbow</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_elbow_1_5 }}' name="right_elbow_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_elbow_2_5 }}' name="right_elbow_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_elbow_3_5 }}' name="right_elbow_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_elbow_4_5 }}' name="right_elbow_4_5"></th>
                    </tr>
                    <tr>
                        <th>Wrist</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_wrist_1_5 }}' name="right_wrist_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_wrist_2_5 }}' name="right_wrist_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_wrist_3_5 }}' name="right_wrist_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_wrist_4_5 }}' name="right_wrist_4_5"></th>
                    </tr>
                    <tr>
                        <th>Fingers</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_fingers_1_5 }}' name="right_fingers_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_fingers_2_5 }}' name="right_fingers_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_fingers_3_5 }}' name="right_fingers_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->right_fingers_4_5 }}' name="right_fingers_4_5"></th>
                    </tr>
                </tbody>
            </table>

            <h3><u style="text-align: center;">
                    Left Upper Limb
                </u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">1/4</th>
                        <th class="t-center">2/4</th>
                        <th class="t-center">3/4</th>
                        <th class="t-center">4/4</th>
                    </tr>
                    <tr>
                        <th>Shoulder</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_1_5 }}' name="left_shoulder_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_2_5 }}' name="left_shoulder_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_3_5 }}' name="left_shoulder_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_shoulder_4_5 }}' name="left_shoulder_4_5"></th>
                    </tr>
                    <tr>
                        <th>Elbow</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_1_5 }}' name="left_elbow_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_2_5 }}' name="left_elbow_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_3_5 }}' name="left_elbow_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_elbow_4_5 }}' name="left_elbow_4_5"></th>
                    </tr>
                    <tr>
                        <th>Wrist</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_1_5 }}' name="left_wrist_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_2_5 }}' name="left_wrist_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_3_5 }}' name="left_wrist_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_wrist_4_5 }}' name="left_wrist_4_5"></th>
                    </tr>
                    <tr>
                        <th>Fingers</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_1_5 }}' name="left_fingers_1_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_2_5 }}' name="left_fingers_2_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_3_5 }}' name="left_fingers_3_5"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->left_fingers_4_5 }}' name="left_fingers_4_5"></th>
                    </tr>
                </tbody>
            </table>


            <div style="text-align: center; margin-bottom:1rem; margin-bottom:1rem; margin-top: 2rem;">
                <span style="font-size: 18px; font-weight: bold; text-decoration: underline; border: 1px solid black; display: inline-block; padding: 0.5rem 2rem;">
                    Fine Motor Skills Assessment
                </span>
            </div>

            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">Impaired</th>
                        <th class="t-center">Intact</th>
                    </tr>
                    <tr>
                        <th>Reach</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->reach_impaired }}' name="reach_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->reach_intact }}' name="reach_intact"></th>
                    </tr>
                    <tr>
                        <th>Grasp</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->grasp_impaired }}' name="grasp_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->grasp_intact }}' name="grasp_intact"></th>
                    </tr>
                    <tr>
                        <th>Release</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->release_impaired }}' name="release_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->release_intact }}' name="release_intact"></th>
                    </tr>
                    <tr>
                        <th>Power Grip</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->power_grip_impaired }}' name="power_grip_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->power_grip_intact }}' name="power_grip_intact"></th>
                    </tr>
                    <tr>
                        <th>Pinch Grip</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->pinch_grip_impaired }}' name="pinch_grip_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->pinch_grip_intact }}' name="pinch_grip_intact"></th>
                    </tr>
                    <tr>
                        <th>Lateral Grip</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->lateral_grip_impaired }}' name="lateral_grip_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->lateral_grip_intact }}' name="lateral_grip_intact"></th>
                    </tr>
                    <tr>
                        <th>Manipulation</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->manipulation_impaired }}' name="manipulation_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->manipulation_intact }}' name="manipulation_intact"></th>
                    </tr>
                    <tr>
                        <th>Eye-Hand Coordination</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->eye_hand_coordination_impaired }}' name="eye_hand_coordination_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->eye_hand_coordination_intact }}' name="eye_hand_coordination_intact"></th>
                    </tr>
                    <tr>
                        <th>Bilateral Integration</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->bilateral_integration_impaired }}' name="bilateral_integration_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->bilateral_integration_intact }}' name="bilateral_integration_intact"></th>
                    </tr>
                    <tr>
                        <th>Handwriting</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->handwriting_impaired }}' name="handwriting_impaired"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->handwriting_intact }}' name="handwriting_intact"></th>
                    </tr>
                </tbody>
            </table>


            <h3><u>SENSORY- PROCESSING FUNCTION:</u></h3>
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">Seeker</th>
                        <th class="t-center">Avoider</th>
                        <th class="t-center">Mix</th>
                    </tr>
                    <tr>
                        <th>Visual</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->visual_seeker }}' name="visual_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->visual_avoider }}' name="visual_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->visual_mix }}' name="visual_mix"></th>
                    </tr>
                    <tr>
                        <th>Auditory</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->auditory_seeker }}' name="auditory_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->auditory_avoider }}' name="auditory_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->auditory_mix }}' name="auditory_mix"></th>
                    </tr>
                    <tr>
                        <th>Olfactory</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->olfactory_seeker }}' name="olfactory_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->olfactory_avoider }}' name="olfactory_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->olfactory_mix }}' name="olfactory_mix"></th>
                    </tr>
                    <tr>
                        <th>Gustatory</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->gustatory_seeker }}' name="gustatory_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->gustatory_avoider }}' name="gustatory_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->gustatory_mix }}' name="gustatory_mix"></th>
                    </tr>
                    <tr>
                        <th>Proprioception</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->proprioception_seeker }}' name="proprioception_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->proprioception_avoider }}' name="proprioception_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->proprioception_mix }}' name="proprioception_mix"></th>
                    </tr>
                    <tr>
                        <th>Vestibular</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->vestibular_seeker }}' name="vestibular_seeker"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->vestibular_avoider }}' name="vestibular_avoider"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->vestibular_mix }}' name="vestibular_mix"></th>
                    </tr>
            </table>
            <h3><u>BALANCE: </u></h3>

            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th class="t-center">Static</th>
                        <th class="t-center">Dynamic</th>
                    </tr>
                    <tr>
                        <th>Sitting Balance</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->sitting_static }}' name="sitting_static"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->sitting_dynamic }}' name="sitting_dynamic"></th>
                    </tr>
                    <tr>
                        <th>Standing Balance</th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->standing_static }}' name="standing_static"></th>
                        <th class="t-center"><input type="text" style="width: 96%;" value='{{ $report->standing_dynamic }}' name="standing_dynamic"></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="border size-fit p-fit">
            <h3>COGNITIVE FUNCTION: </h3>
            <table>
                <tbody>
                    <tr>
                        <th>Orientation</th>
                        <th class="t-center">
                            <input type="hidden" name="orientation_person" value="0">
                            Person&nbsp;&nbsp;<input type="checkbox" value="1" name="orientation_person" {{ $report->orientation_person ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="orientation_place" value="0">
                            Place&nbsp;&nbsp;<input type="checkbox" value="1" name="orientation_place" {{ $report->orientation_place ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="orientation_time" value="0">
                            Time&nbsp;&nbsp;<input type="checkbox" value="1" name="orientation_time" {{ $report->orientation_time ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Follows Commands</th>
                        <th class="t-center">
                            <input type="hidden" name="follows_commands_one_step" value="0">
                            One-Step&nbsp;&nbsp;<input type="checkbox" value="1" name="follows_commands_one_step" {{ $report->follows_commands_one_step ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="follows_commands_multi_step" value="0">
                            Multi-Step&nbsp;&nbsp;<input type="checkbox" value="1" name="follows_commands_multi_step" {{ $report->follows_commands_multi_step ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="follows_commands_unable" value="0">
                            Unable&nbsp;&nbsp;<input type="checkbox" value="1" name="follows_commands_unable" {{ $report->follows_commands_unable ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Communication</th>
                        <th class="t-center">
                            <input type="hidden" name="communication_verbal" value="0">
                            Verbal&nbsp;&nbsp;<input type="checkbox" value="1" name="communication_verbal" {{ $report->communication_verbal ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="communication_non_verbal" value="0">
                            Non-Verbal&nbsp;&nbsp;<input type="checkbox" value="1" name="communication_non_verbal" {{ $report->communication_non_verbal ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="communication_none" value="0">
                            None&nbsp;&nbsp;<input type="checkbox" value="1" name="communication_none" {{ $report->communication_none ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Attention Span</th>
                        <th class="t-center">
                            <input type="hidden" name="attention_span_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="attention_span_impaired" {{ $report->attention_span_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="attention_span_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="attention_span_intact" {{ $report->attention_span_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="attention_span_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="attention_span_note" {{ $report->attention_span_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Judgment</th>
                        <th class="t-center">
                            <input type="hidden" name="judgment_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="judgment_impaired" {{ $report->judgment_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="judgment_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="judgment_intact" {{ $report->judgment_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="judgment_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="judgment_note" {{ $report->judgment_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Concentration</th>
                        <th class="t-center">
                            <input type="hidden" name="concentration_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="concentration_impaired" {{ $report->concentration_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="concentration_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="concentration_intact" {{ $report->concentration_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="concentration_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="concentration_note" {{ $report->concentration_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>تمييز</th>
                        <th class="t-center">
                            <input type="hidden" name="discrimination_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="discrimination_impaired" {{ $report->discrimination_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="discrimination_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="discrimination_intact" {{ $report->discrimination_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="discrimination_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="discrimination_note" {{ $report->discrimination_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Matching</th>
                        <th class="t-center">
                            <input type="hidden" name="matching_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="matching_impaired" {{ $report->matching_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="matching_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="matching_intact" {{ $report->matching_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="matching_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="matching_note" {{ $report->matching_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Extraction</th>
                        <th class="t-center">
                            <input type="hidden" name="extraction_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="extraction_impaired" {{ $report->extraction_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="extraction_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="extraction_intact" {{ $report->extraction_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="extraction_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="extraction_note" {{ $report->extraction_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Long Term Memory</th>
                        <th class="t-center">
                            <input type="hidden" name="long_term_memory_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="long_term_memory_impaired" {{ $report->long_term_memory_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="long_term_memory_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="long_term_memory_intact" {{ $report->long_term_memory_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="long_term_memory_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="long_term_memory_note" {{ $report->long_term_memory_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Short Term Memory</th>
                        <th class="t-center">
                            <input type="hidden" name="short_term_memory_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="short_term_memory_impaired" {{ $report->short_term_memory_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="short_term_memory_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="short_term_memory_intact" {{ $report->short_term_memory_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="short_term_memory_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="short_term_memory_note" {{ $report->short_term_memory_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Problem Solving</th>
                        <th class="t-center">
                            <input type="hidden" name="problem_solving_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="problem_solving_impaired" {{ $report->problem_solving_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="problem_solving_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="problem_solving_intact" {{ $report->problem_solving_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="problem_solving_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="problem_solving_note" {{ $report->problem_solving_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Eye Contact</th>
                        <th class="t-center">
                            <input type="hidden" name="eye_contact_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="eye_contact_impaired" {{ $report->eye_contact_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="eye_contact_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="eye_contact_intact" {{ $report->eye_contact_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="eye_contact_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="eye_contact_note" {{ $report->eye_contact_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Safety Awareness</th>
                        <th class="t-center">
                            <input type="hidden" name="safety_awareness_impaired" value="0">
                            Impaired&nbsp;&nbsp;<input type="checkbox" value="1" name="safety_awareness_impaired" {{ $report->safety_awareness_impaired ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="safety_awareness_intact" value="0">
                            Intact&nbsp;&nbsp;<input type="checkbox" value="1" name="safety_awareness_intact" {{ $report->safety_awareness_intact ? 'checked' : '' }}>
                        </th>
                        <th class="t-center">
                            <input type="hidden" name="safety_awareness_note" value="0">
                            Note&nbsp;&nbsp;<input type="checkbox" value="1" name="safety_awareness_note" {{ $report->safety_awareness_note ? 'checked' : '' }}>
                        </th>
                    </tr>
                </tbody>
            </table>
            <h3>PSYCHOSOCIAL/ PLAY:</h3>
            <table style="width: 45%;">
                <tbody>
                    <tr>
                        <th>Solo</th>
                        <input type="hidden" name="psychosocial_play_solo" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="psychosocial_play_solo" {{ $report->psychosocial_play_solo ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Interactive</th>
                        <input type="hidden" name="psychosocial_play_interactive" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="psychosocial_play_interactive" {{ $report->psychosocial_play_interactive ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Onlooker</th>
                        <input type="hidden" name="psychosocial_play_onlooker" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="psychosocial_play_onlooker" {{ $report->psychosocial_play_onlooker ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Unoccupied</th>
                        <input type="hidden" name="psychosocial_play_unoccupied" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="psychosocial_play_unoccupied" {{ $report->psychosocial_play_unoccupied ? 'checked' : '' }}>
                        </th>
                    </tr>
                </tbody>
            </table>
            <h3>VISUAL PERCEPTUAL SKILLS:&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" value="1" name="visual_perceptual_skills_intact" {{ $report->visual_perceptual_skills_intact ? 'checked' : '' }}>&nbsp;Intact&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="visual_perceptual_skills_impaired" {{ $report->visual_perceptual_skills_impaired ? 'checked' : '' }}>&nbsp;Impaired</h3>
            <h3>COGNITIVE FUNCTION:</h3>
            <table style="width: 60%;">
                <tbody>
                    <tr>
                        <th>Dominant Hand</th>
                        <th>Rt.</th>
                        <th>Lt.</th>
                    </tr>
                    <tr>
                        <th>Crossing Mid-line</th>
                        <input type="hidden" name="crossing_midline_right" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="crossing_midline_right" {{ $report->crossing_midline_right ? 'checked' : '' }}>
                        </th>
                        <input type="hidden" name="crossing_midline_left" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="crossing_midline_left" {{ $report->crossing_midline_left ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Hand Eye Coordination</th>
                        <input type="hidden" name="hand_eye_coordination_right" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="hand_eye_coordination_right" {{ $report->hand_eye_coordination_right ? 'checked' : '' }}>
                        </th>
                        <input type="hidden" name="hand_eye_coordination_left" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="hand_eye_coordination_left" {{ $report->hand_eye_coordination_left ? 'checked' : '' }}>
                        </th>
                    </tr>
                    <tr>
                        <th>Bilateral Integration</th>
                        <input type="hidden" name="bilateral_integration_right" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="bilateral_integration_right" {{ $report->bilateral_integration_right ? 'checked' : '' }}>
                        </th>
                        <input type="hidden" name="bilateral_integration_left" value="0">
                        <th class="t-center"><input type="checkbox" value="1" name="bilateral_integration_left" {{ $report->bilateral_integration_left ? 'checked' : '' }}>
                        </th>
                    </tr>
                </tbody>
            </table>
            <h4>VISUAL PERCEPTUAL SKILLS:&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="visual_perceptual_skills_fisted_grasp" value="0">
                <input type="checkbox" value="1" name="visual_perceptual_skills_fisted_grasp" {{ $report->visual_perceptual_skills_fisted_grasp ? 'checked' : '' }}>&nbsp;Fisted Grasp &nbsp;&nbsp;&nbsp;
                <input type="hidden" name="visual_perceptual_skills_palmar_grasp" value="0">
                <input type="checkbox" value="1" name="visual_perceptual_skills_palmar_grasp" {{ $report->visual_perceptual_skills_palmar_grasp ? 'checked' : '' }}>&nbsp;Palmar Grasp &nbsp;&nbsp;&nbsp;
                <input type="hidden" name="visual_perceptual_skills_five_finger_grasp" value="0">
                <input type="checkbox" value="1" name="visual_perceptual_skills_five_finger_grasp" {{ $report->visual_perceptual_skills_five_finger_grasp ? 'checked' : '' }}>&nbsp;Five Finger Grasp&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="visual_perceptual_skills_tripod_pencil_grasp" value="0">
                <input type="checkbox" value="1" name="visual_perceptual_skills_tripod_pencil_grasp" {{ $report->visual_perceptual_skills_tripod_pencil_grasp ? 'checked' : '' }}>&nbsp; Tripod Pencil Grasp&nbsp;&nbsp;&nbsp;
            </h4>
            <h3>RECOMMENDATION:</h3>
            <textarea name="recommendation" id="RECOMMENDATION" style="width: 95%;" rows="10">{{ $report->recommendation }}</textarea>
        </div>


        <div class='conta'>
            <button type="submit">
                تحديث التقرير
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