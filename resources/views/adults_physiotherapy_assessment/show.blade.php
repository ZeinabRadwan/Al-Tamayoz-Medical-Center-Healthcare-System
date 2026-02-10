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

        .input readonly-none {
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
24

<form>

    <body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">

        <!DOCTYPE html>

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
                padding: 2rem 1rem;
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

            .RangeOfMotionTable th,
            td {
                padding: 0 4px;
            }
        </style>

        <body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
            <div class="border size-fit p-fit">

                <h3>
                    PEDIATRECS PHYSIO THERAPY ASSESSMENT
                </h3>
                <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 1rem;">
                    <div style="flex: 2;">
                        <label>Patient Name:</label>
                        <input readonly style="width: 100%; margin-bottom: 0.5rem;" type="text" value="{{ $report->patient_name }}" name="patient_name">
                        <label>Diagnosis:</label>
                        <input readonly style="width: 100%;" type="text" value="{{ $report->diagnosis }}" name="diagnosis">
                    </div>
                    <div style="flex: 1;">
                        <label>Nationality:</label>
                        <input readonly style="width: 100%; margin-bottom: 0.5rem;" type="text" value="{{ $report->nationality }}" name="nationality">
                        <label>Patient Age:</label>
                        <input readonly style="width: 100%;" type="text" value="{{ $report->patient_age }}" name="patient_age">
                    </div>
                    <div style="flex: 2;">
                        <label>Occupation:</label>
                        <input readonly style="width: 100%; margin-bottom: 0.5rem;" type="text" value="{{ $report->occupation }}" name="occupation">
                        <label>ID/MRN:</label>
                        <input readonly style="width: 100%;" type="text" value="{{ $report->id_mrn }}" name="id_mrn">
                    </div>

                    <div style="flex:1 ;">
                        <label>Gender:</label>
                        <input readonly type="checkbox" onclick="return false;" id="female" value="1" name="gender_female" {{ $report->gender_female ? 'checked' : '' }}>
                        <label for="female">F</label>
                        <input readonly type="checkbox" onclick="return false;" id="male" value="1" name="gender_male" {{ $report->gender_male ? 'checked' : '' }}>
                        <label for="male">M</label>
                    </div>

                </div>
                <table>
                    <tr>
                        <th>1.</th>
                        <td>Civil Status</td>
                        <td align=center style='border-left: 1px solid black;'>
                            <label for='single'>Single</label>
                            <input readonly class="keda" type="checkbox" onclick="return false;" id='single' value="1" name='civil_status_single' {{ $report->civil_status_single ? 'checked' : '' }}>
                        </td>
                        <td align=center style='border-left: 1px solid black;'>
                            Married
                            <input readonly class="keda" type="checkbox" onclick="return false;" id='married' value="1" name='civil_status_married' {{ $report->civil_status_married ? 'checked' : '' }}>
                            <label for='married'></label>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>2.</th>
                        <td>History of trauma/ illness</td>
                        <td colspan="2" align=center style='border-left: 1px solid black;'>
                            <textarea name="history_of_trauma_illness" rows="3" style="width: 100%;">{{ $report->history_of_trauma_illness }}</textarea>
                        </td>
                        <td>
                            <label for='history_of_trauma_illness_date'>Date</label>
                            <input readonly type='text' id='history_of_trauma_illness_date' value="{{ $report->history_of_trauma_illness_date }}" name='history_of_trauma_illness_date'>
                        </td>
                    </tr>
                    <tr>
                        <th>3.</th>
                        <td>Medical History/Chief Complain:</td>
                        <td colspan="4" align=center style='border-left: 1px solid black;'>
                            <textarea name="medical_history_chief_complain" rows="3" style="width: 100%;">{{ $report->medical_history_chief_complain }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>4.</th>
                        <td>X-ray/ Other ex:</td>
                        <td colspan="4" align=center style='border-left: 1px solid black;'>
                            <textarea name="xray_other_ex" rows="3" style="width: 100%;">{{ $report->xray_other_ex }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>5.</th>
                        <td>Pain level VAS</td>
                        <td colspan="4" align=center style='border-left: 1px solid black;'>
                            <textarea name="pain_level_vas" rows="3" style="width: 100%;">{{ $report->pain_level_vas }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="border size-fit p-fit">
                <div style="margin-right: 2rem; margin-top: 1rem;">
                    <h3>Examination and Assessment:</h3>
                    <h5>
                        Physical Examination: Mark on the body-chart deformities or joint anomalies, back deformities or anomalies, edema, shoulder subluxatio
                    </h5>
                </div>
                <div style="display: flex; justify-content: center;">
                    <img src="data:image/png;base64,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"
                        alt="Not found">
                </div>
                </table>
            </div>
            <div>
                <h5 style="margin: 1rem 0;">Skin, Soft tissues problem</h5>
                <table>
                    <tr>
                        <th class="bg-grey">DISORDERS</th>
                        <th class="bg-grey">Right</th>
                        <th class="bg-grey">Left</th>
                    </tr>
                    <tr>
                        <th class="bg-grey">Swelling</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->swelling_right }}" name="swelling_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->swelling_left }}" name="swelling_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Callus</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->callus_right }}" name="callus_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->callus_left }}" name="callus_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Scar</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->scar_right }}" name="scar_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->scar_left }}" name="scar_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Wound</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->wound_right }}" name="wound_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->wound_left }}" name="wound_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Temperature</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->temperature_right }}" name="temperature_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->temperature_left }}" name="temperature_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Infection</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->infection_right }}" name="infection_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->infection_left }}" name="infection_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Pain</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->pain_right }}" name="pain_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->pain_left }}" name="pain_left"></td>
                    </tr>
                    <tr>
                        <th class="bg-grey">Abnormal Sensation</th>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->abnormal_sensation_right }}" name="abnormal_sensation_right"></td>
                        <td><input readonly type="text" style="width: 95%;" value="{{ $report->abnormal_sensation_left }}" name="abnormal_sensation_left"></td>
                    </tr>
                    <tr>
                        <td>Extension 0</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->extension_0_1 }}" name="extension_0_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->extension_0_2 }}" name="extension_0_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->extension_0_3 }}" name="extension_0_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->extension_0_4 }}" name="extension_0_4"></td>
                    </tr>
                    <tr>
                        <td>ANKLE-FOOT</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->ankle_foot_1 }}" name="ankle_foot_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->ankle_foot_2 }}" name="ankle_foot_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->ankle_foot_3 }}" name="ankle_foot_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->ankle_foot_4 }}" name="ankle_foot_4"></td>
                    </tr>
                    <tr>
                        <td>Dorsi Flexion 30</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->dorsi_flexion_1 }}" name="dorsi_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->dorsi_flexion_2 }}" name="dorsi_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->dorsi_flexion_3 }}" name="dorsi_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->dorsi_flexion_4 }}" name="dorsi_flexion_4"></td>
                    </tr>
                    <tr>
                        <td>Plantar Flexion 45</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->plantar_flexion_1 }}" name="plantar_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->plantar_flexion_2 }}" name="plantar_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->plantar_flexion_3 }}" name="plantar_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->plantar_flexion_4 }}" name="plantar_flexion_4"></td>
                    </tr>
                    <tr>
                        <td>Inversion 35</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->inversion_1 }}" name="inversion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->inversion_2 }}" name="inversion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->inversion_3 }}" name="inversion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->inversion_4 }}" name="inversion_4"></td>
                    </tr>
                    <tr>
                        <td>Eversion 15</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->eversion_1 }}" name="eversion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->eversion_2 }}" name="eversion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->eversion_3 }}" name="eversion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->eversion_4 }}" name="eversion_4"></td>
                    </tr>
                    <tr>
                        <th colspan="5">NECK</th>
                    </tr>
                    <tr>
                        <td>Flexion cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_flexion_1 }}" name="neck_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_flexion_2 }}" name="neck_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_flexion_3 }}" name="neck_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_flexion_4 }}" name="neck_flexion_4"></td>
                    </tr>
                    <tr>
                        <td>Extension cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_extension_1 }}" name="neck_extension_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_extension_2 }}" name="neck_extension_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_extension_3 }}" name="neck_extension_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_extension_4 }}" name="neck_extension_4"></td>
                    </tr>
                    <tr>
                        <td>Latero-Flexion R cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_r_1 }}" name="neck_latero_flexion_r_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_r_2 }}" name="neck_latero_flexion_r_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_r_3 }}" name="neck_latero_flexion_r_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_r_4 }}" name="neck_latero_flexion_r_4"></td>
                    </tr>
                    <tr>
                        <td>Latero-Flexion L cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_l_1 }}" name="neck_latero_flexion_l_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_l_2 }}" name="neck_latero_flexion_l_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_l_3 }}" name="neck_latero_flexion_l_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->neck_latero_flexion_l_4 }}" name="neck_latero_flexion_l_4"></td>
                    </tr>
                    <tr>
                        <th colspan="5">TRUNK</th>
                    </tr>
                    <tr>
                        <td>Global Flexion cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_flexion_1 }}" name="global_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_flexion_2 }}" name="global_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_flexion_3 }}" name="global_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_flexion_4 }}" name="global_flexion_4"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Thoracic Flexion (Ott Test) cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->thoracic_flexion_1 }}" name="thoracic_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->thoracic_flexion_2 }}" name="thoracic_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->thoracic_flexion_3 }}" name="thoracic_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->thoracic_flexion_4 }}" name="thoracic_flexion_4"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Lumbar Flexion (Schober test)</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->lumbar_flexion_1 }}" name="lumbar_flexion_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->lumbar_flexion_2 }}" name="lumbar_flexion_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->lumbar_flexion_3 }}" name="lumbar_flexion_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->lumbar_flexion_4 }}" name="lumbar_flexion_4"></td>
                    </tr>
                    <tr>
                        <td>Global Extension cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_extension_1 }}" name="global_extension_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_extension_2 }}" name="global_extension_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_extension_3 }}" name="global_extension_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->global_extension_4 }}" name="global_extension_4"></td>
                    </tr>
                    <tr>
                        <td>Latero-Flexion R cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_r_1 }}" name="latero_flexion_r_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_r_2 }}" name="latero_flexion_r_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_r_3 }}" name="latero_flexion_r_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_r_4 }}" name="latero_flexion_r_4"></td>
                    </tr>
                    <tr>
                        <td>Latero-Flexion L cm</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_l_1 }}" name="latero_flexion_l_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_l_2 }}" name="latero_flexion_l_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_l_3 }}" name="latero_flexion_l_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->latero_flexion_l_4 }}"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Rotation R (write OK or imp.)</td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->rotation_r_1 }}" name="rotation_r_1"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->rotation_r_2 }}" name="rotation_r_2"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->rotation_r_3 }}" name="rotation_r_3"></td>
                        <td><input readonly style="width:50px;" type="text" value="{{ $report->rotation_r_4 }}" name="rotation_r_4"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Rotation L (write OK or imp.)</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->rotation_l_1 }}" name="rotation_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->rotation_l_2 }}" name="rotation_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->rotation_l_3 }}" name="rotation_l_3"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->rotation_l_4 }}" name="rotation_l_4"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Supination 80</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->forearm_supination_l_1 }}" name="forearm_supination_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->forearm_supination_r_1 }}" name="forearm_supination_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->forearm_supination_l_2 }}" name="forearm_supination_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->forearm_supination_r_2 }}" name="forearm_supination_r_2"></td>
                    </tr>
                    <tr>
                        <th colspan="5">WRIST</th>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Flexion 80</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_flexion_l_1 }}" name="wrist_flexion_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_flexion_r_1 }}" name="wrist_flexion_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_flexion_l_2 }}" name="wrist_flexion_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_flexion_r_2 }}" name="wrist_flexion_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Extension 80</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_extension_l_1 }}" name="wrist_extension_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_extension_r_1 }}" name="wrist_extension_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_extension_l_2 }}" name="wrist_extension_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_extension_r_2 }}" name="wrist_extension_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Abduction 20</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_abduction_l_1 }}" name="wrist_abduction_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_abduction_r_1 }}" name="wrist_abduction_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_abduction_l_2 }}" name="wrist_abduction_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_abduction_r_2 }}" name="wrist_abduction_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Adduction 35</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_adduction_l_1 }}" name="wrist_adduction_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_adduction_r_1 }}" name="wrist_adduction_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_adduction_l_2 }}" name="wrist_adduction_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->wrist_adduction_r_2 }}" name="wrist_adduction_r_2"></td>
                    </tr>
                    <tr>
                        <th colspan="5">FINGERS</th>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">Thumb opposition</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_thumb_opposition_l_1 }}" name="finger_thumb_opposition_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_thumb_opposition_r_1 }}" name="finger_thumb_opposition_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_thumb_opposition_l_2 }}" name="finger_thumb_opposition_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_thumb_opposition_r_2 }}" name="finger_thumb_opposition_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">MP Flexion 90</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_flexion_l_1 }}" name="finger_mp_flexion_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_flexion_r_1 }}" name="finger_mp_flexion_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_flexion_l_2 }}" name="finger_mp_flexion_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_flexion_r_2 }}" name="finger_mp_flexion_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">MP Extension 40</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_extension_l_1 }}" name="finger_mp_extension_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_extension_r_1 }}" name="finger_mp_extension_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_extension_l_2 }}" name="finger_mp_extension_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_mp_extension_r_2 }}" name="finger_mp_extension_r_2"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px;">IP Flexion 120</td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_ip_flexion_l_1 }}" name="finger_ip_flexion_l_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_ip_flexion_r_1 }}" name="finger_ip_flexion_r_1"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_ip_flexion_l_2 }}" name="finger_ip_flexion_l_2"></td>
                        <td><input readonly style="width: 50px;" type="text" value="{{ $report->finger_ip_flexion_r_2 }}" name="finger_ip_flexion_r_2"></td>
                    </tr>
                    </tbody>
                </table>
                <br><br>
                <label for="Remarks5">Remarks:</label><br>
                <textarea name="remarks" id="Remarks5" cols="40" rows="6">{{ $report->remarks }}</textarea>
            </div>
            </div>
            </div>
            <div class="border size-fit p-fit">
                <div style="display: flex; gap: .5rem;">
                    <div style="width: 295px;">
                        <h3 style="font-size: 15px;">Muscle Test:</h3>
                        <p style="font-size: 13px;">
                            <input readonly type="checkbox" onclick="return false;" value='1' name="muscle_test" id="RangeOfMotion">Muscle test should be
                            recorded during first
                            assessment and before
                            discharging the patient
                        </p>
                    </div>
                    <div>
                        <table style="width: 100%; font-size: 12px;" class="RangeOfMotionTable" border="1">
                            <tbody>
                                <tr style="height: 60px; width: 100%;">
                                    <th colspan="3">LOWER LIMB</th>
                                    <th rowspan="1" class="t-center" colspan="4">RT<input readonly
                                            style="border: 1px solid rgb(10, 226, 10); width: 100%;" type="text" value="{{ $report->lower_limb_rt }}" name="lower_limb_rt">
                                    </th>
                                    <th rowspan="1" class="t-center" colspan="4">LT <input readonly
                                            style="border: 1px solid rgb(10, 226, 10); width: 55%;" type="text" value="{{ $report->lower_limb_lt }}" name="lower_limb_lt">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <span class="mt-3"> Neck:
                            <input readonly type="text" value="{{ $report->neck_span }}" name="neck_span">
                        </span>
                    </div>
                    <div>
                        <table style="" class="RangeOfMotionTable" border="1">
                            <tbody>
                                <table style="width: 100%; font-size: 12px;" class="RangeOfMotionTable" border="1">
                                    <tbody class="mb-4">
                                        <tr style="height: 60px; width: 100%;">
                                            <th colspan="3">Upper LIMB</th>
                                            <th rowspan="1" class="t-center" colspan="4">RT<input readonly
                                                    style="border: 1px solid rgb(10, 226, 10); width: 100%;" type="text" value="{{ $report->upper_limb_rt }}" name="upper_limb_rt">
                                            </th>
                                            <th rowspan="1" class="t-center" colspan="4">LT <input readonly
                                                    style="border: 1px solid rgb(10, 226, 10); width: 100%;" type="text" value="{{ $report->upper_limb_lt }}" name="upper_limb_lt">
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <span> Trunk:
                                    <input readonly class="mt-3" type="text" value="{{ $report->trunk_span }}" name="trunk_span">
                                </span>
                    </div>
                </div>
            </div>
            <div class="border size-fit p-fit">
                <div style="display: flex; gap: .5rem;">
                    <div style="width: 295px; display: flex;">
                        <h3 style="font-size: 15px;">Muscle Tone:</h3>
                        <p style="font-size: 13px;">
                            <input readonly type="checkbox" onclick="return false;" value='1' name="hypertonia" id="hypertonia" {{ $report->hypertonia ? 'checked' : '' }}>
                            Hypertonia

                            <input readonly type="checkbox" onclick="return false;" value='1' name="hypotonia" id="hypotonia" {{ $report->hypotonia ? 'checked' : '' }}>
                            Hypotonia
                        </p>
                    </div>
                </div>
            </div>
            <div class="border size-fit p-fit">
                <h3>Functional Evaluation:</h3>
                <div style="display: flex; margin-left: 4rem; gap: 3rem;">
                    <div>
                        <h4>Balance</h4>
                        <table class="RangeOfMotionTable" border="1">
                            <tbody>
                                <tr>
                                    <th class="t-center" rowspan="4">Sitting Static</th>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_sitting_normal" {{ $report->static_sitting_normal ? 'checked' : '' }}> Normal</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_sitting_good" {{ $report->static_sitting_good ? 'checked' : '' }}> Good</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_sitting_poor" {{ $report->static_sitting_poor ? 'checked' : '' }}> Poor</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_sitting_not_possible" {{ $report->static_sitting_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>
                                <tr>
                                    <th class="t-center" rowspan="4">Standing Static</th>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_standing_normal" {{ $report->static_standing_normal ? 'checked' : '' }}> Normal</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_standing_good" {{ $report->static_standing_good ? 'checked' : '' }}> Good</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="static_standing_poor" {{ $report->static_standing_poor ? 'checked' : '' }}> Poor</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="sstatic_tanding_not_possible" {{ $report->sstatic_tanding_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>

                                <tr>
                                    <th class="t-center" rowspan="4">Dynamic Static</th>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_sitting_normal" {{ $report->dynamic_sitting_normal ? 'checked' : '' }}> Normal</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_sitting_good" {{ $report->dynamic_sitting_good ? 'checked' : '' }}> Good</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_sitting_poor" {{ $report->dynamic_sitting_poor ? 'checked' : '' }}> Poor</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_sitting_not_possible" {{ $report->dynamic_sitting_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>
                                <tr>
                                    <th class="t-center" rowspan="4">Dynamic Static</th>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_standing_normal" {{ $report->dynamic_standing_normal ? 'checked' : '' }}> Normal</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_standing_good" {{ $report->dynamic_standing_good ? 'checked' : '' }}> Good</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_standing_poor" {{ $report->dynamic_standing_poor ? 'checked' : '' }}> Poor</th>
                                </tr>
                                <tr>
                                    <th class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="dynamic_standing_not_possible" {{ $report->dynamic_standing_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h4>Coordination:</h4>
                        <table class="RangeOfMotionTable" border="1">
                            <tbody>
                                <tr>
                                    <th rowspan="2" class="t-center">UPPER LIMBS</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="upper_limbs_good" {{ $report->upper_limbs_good ? 'checked' : '' }}> Good</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="upper_limbs_poor" {{ $report->upper_limbs_poor ? 'checked' : '' }}> Poor</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="upper_limbs_not_possible" {{ $report->upper_limbs_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>
                                <tr>
                                    <th>L</th>
                                    <th>R</th>
                                    <th>L</th>
                                    <th>R</th>
                                    <th>L</th>
                                    <th>R</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="t-center">LOWER LIMBS</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="lower_limbs_good" {{ $report->lower_limbs_good ? 'checked' : '' }}> Good</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="lower_limbs_poor" {{ $report->lower_limbs_poor ? 'checked' : '' }}> Poor</th>
                                    <th colspan="2" class="t-center"><input readonly class="keda" type="checkbox" onclick="return false;" value="1" name="lower_limbs_not_possible" {{ $report->lower_limbs_not_possible ? 'checked' : '' }}> Not Possible</th>
                                </tr>
                                <tr>
                                    <th>L</th>
                                    <th>R</th>
                                    <th>L</th>
                                    <th>R</th>
                                    <th>L</th>
                                    <th>R</th>
                                </tr>
                                <tr>
                                    <th>
                                        Comments
                                    </th>
                                    <td colspan="6">
                                        <textarea name="coordination_comments" cols="30" rows="3">{{ $report->coordination_comments }}</textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="border size-fit p-fit">
                <h3>Treatment Plan of Care:</h3>
                <div style="margin-left: 4rem;">
                    <h4>Problems List:</h4>
                    <ul>
                        @foreach ($report->problems_list ?? [] as $index => $problem)
                        <li>{{ $index + 1 }}- {{ $problem }}</li>
                        @endforeach
                    </ul>

                    <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                        <div>
                            <h4>Short Term Goals:</h4>
                            <ul>
                                @foreach ($report->short_term_goals ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h4>Long Term Goals:</h4>
                            <ul>
                                @foreach ($report->long_term_goals ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="border size-fit p-fit">
                <h3>Re Assessment Plan of care After 6 sessions: </h3>
                <div style="margin-left: 4rem;">
                    <h4>Problems List:</h4>
                    <ul>
                        @foreach ($report->problems_list_6 ?? [] as $index => $problem)
                        <li>{{ $index + 1 }}- {{ $problem }}</li>
                        @endforeach
                    </ul>

                    <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                        <div>
                            <h4>Short Term Goals:</h4>
                            <ul>
                                @foreach ($report->short_term_goals_6 ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h4>Long Term Goals:</h4>
                            <ul>
                                @foreach ($report->long_term_goals_6 ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="border size-fit p-fit">
                <h3>Re Assessment Plan of care After 12 sessions: </h3>
                <div style="margin-left: 4rem;">
                    <h4>Problems List:</h4>
                    <ul>
                        @foreach ($report->problems_list_12 ?? [] as $index => $problem)
                        <li>{{ $index + 1 }}- {{ $problem }}</li>
                        @endforeach
                    </ul>

                    <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                        <div>
                            <h4>Short Term Goals:</h4>
                            <ul>
                                @foreach ($report->short_term_goals_12 ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h4>Long Term Goals:</h4>
                            <ul>
                                @foreach ($report->long_term_goals_12 ?? [] as $index => $goal)
                                <li>{{ $index + 1 }}- {{ $goal }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </body>

</html>
<div class='conta'>
    <a
        href="{{ route('adults_physiotherapy_assessment.edit' , $report->id) }}" class="dko">
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
</body>
<style>
    .keda {

        color: red;
        /* border-radius: 50%; */
        box-shadow: 0 0 3px darkgreen;
        height: 60px;
        /* font-size: 22px; */
        width: 1em;
        height: 1rem;
        accent-color: green;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border: 1px dashed black;
        border-radius: 50%;
        outline: none;
        cursor: pointer;

    }

    .keda:checked {
        background: linear-gradient(0.25turn, #66AA3E, #92C641, #66AA3E);
    }
</style>

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