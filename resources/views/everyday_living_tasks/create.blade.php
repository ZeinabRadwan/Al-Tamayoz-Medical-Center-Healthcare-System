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

        .RangeOfMotionTable th,
        td {
            padding: 0 0px;
            height: 30px;
            background-color: #f0f0f0;
            height: 30px;
        }

        .b-none {
            border: none;
            color: darkgreen;
        }
    </style>
</head>

<body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">


    <form action="{{ route('everyday_living_tasks.store') }}" method="Post">
        @csrf

        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
        <input type="hidden" name="template_id" value="{{ $template->id }}">

        <div class="border size-fit p-fit">
            <h2 class="text-center">EVERYDAY LIVING TASKS</h2>
            <table class="t-grey">
                <tbody>
                    <tr>
                        <td class="b-none">1/7 (Total Assist – Dependent) </td>
                        <td class="b-none">2/7 (Maximal Assist)</td>
                    </tr>
                    <tr>
                        <td class="b-none">3/7 (Moderate Assist) </td>
                        <td class="b-none">4/7 (Minimal Assist)</td>
                    </tr>
                    <tr>
                        <td class="b-none">5/7 (Supervision) </td>
                        <td class="b-none">6/7 (Modified Independent – Tools)</td>
                    </tr>
                    <tr>
                        <td class="b-none">7/7 (Independent) </td>
                    </tr>
                </tbody>
            </table>
            <p align="left" class="font-bold">Assessment to manage tasks is linked to what you would normally expect a child
                of the
                same age to be able to do.</p>
            <div style="display: flex; justify-content: end;">
                <ul>
                    <li>O OBSERVED</li>
                    <li>R REPORTED</li>
                </ul>
            </div>

            <table style="border-collapse: separate; border-spacing: 20px 0;">
                <tbody class="paddingTable">
                    <tr>
                        <td class="b-none"></td>
                        <th>1/7</th>
                        <th>2/7</th>
                        <th>3/7</th>
                        <th>4/7</th>
                        <th>5/7</th>
                        <th>6/7</th>
                        <th>7/7</th>
                        <th>Comments</th>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="8">TOILET</th>
                        <th class="b-none">Height:</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting on</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i1"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i2"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i3"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i4"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i5"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i6"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i7"></td>
                        <td rowspan="16"><textarea name="i137" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i8"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i9"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i10"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i11"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i12"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i13"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i14"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Managing clothes</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i15"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i16"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i17"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i18"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i19"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i20"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i21"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Wiping self</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i22"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i23"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i24"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i25"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i26"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i27"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i28"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Flushing WC</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i29"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i30"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i31"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i32"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i33"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i34"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i35"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Diapers(dependent)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i36"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i37"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i38"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i39"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i40"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i41"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i42"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Indicate discomfort from wetness in their diapers</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i43"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i44"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i45"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i46"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i47"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i48"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i49"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Demand for toilet when needed</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i50"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i51"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i52"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i53"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i54"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i55"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i56"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hold (urine and feces until reach toilet)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i57"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i58"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i59"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i60"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i61"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i62"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i63"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Pulling down diapers or pants</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i64"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i65"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i66"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i67"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i68"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i69"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i70"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Setting correctly on the toilet</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i71"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i72"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i73"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i74"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i75"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i76"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i77"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Relax to urinate/ defecate</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i78"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i79"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i80"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i81"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i82"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i83"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i84"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Pull up pants</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i85"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i86"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i87"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i88"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i89"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i90"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i91"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Cleaning self when finish (flush)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i92"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i93"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i94"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i95"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i96"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i97"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i98"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Clean the toilet</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i99"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i100"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i101"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i102"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i103"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i104"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i105"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Wash and dry hands</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i106"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i107"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i108"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i109"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i110"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i111"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i112"></td>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="8">BED</th>
                        <th class="b-none">Height:</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting on</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i113"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i114"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i115"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i116"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i117"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i118"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i119"></td>
                        <td rowspan="4"><textarea name="i120" rows="10" id="Getting" class="h-w-full b-none"></textarea></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i121"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i122"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i123"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i124"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i125"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i126"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i127"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Raising self from lying</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i128"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i129"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i130"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i131"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i132"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i133"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i134"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Repositioning</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i135"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i136"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i137"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i138"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i139"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i140"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i141"></td>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="8">CHAIR</th>
                        <th class="b-none">Height:</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting on</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i142"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i143"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i144"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i145"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i146"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i147"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i148"></td>
                        <td rowspan="2"><textarea name="i149" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i150"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i151"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i152"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i153"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i154"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i155"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i156"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="border size-fit p-fit">
            <table style="border-collapse: separate; border-spacing: 20px 0;">
                <tbody class="paddingTable">
                    <tr>
                        <th class="b-none" colspan="8">BATH / SHOWER</th>
                        <th class="b-none">Height / width / depth: Plastic / metal</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting in</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i157"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i158"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i159"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i160"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i161"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i162"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i163"></td>
                        <td rowspan="5"><textarea name="i164" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting out</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i165"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i166"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i167"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i168"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i169"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i170"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i171"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Washing (Including hair)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i172"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i173"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i174"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i175"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i176"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i177"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i178"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Drying</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i179"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i180"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i181"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i182"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i183"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i184"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i185"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Turning taps</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i186"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i187"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i188"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i189"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i190"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i191"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i192"></td>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="6">GROOMING & PERSONAL HYGIENE</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hair styling</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i193"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i194"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i195"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i196"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i197"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i198"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i199"></td>
                        <td rowspan="6"><textarea name="i200" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Tooth brushing</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i201"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i202"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i203"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i204"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i205"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i206"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i207"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Menstrual cycle care</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i208"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i209"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i210"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i211"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i212"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i213"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i214"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Washing hands and face</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i215"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i216"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i217"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i218"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i219"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i220"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i221"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Nose cleaning</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i222"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i223"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i224"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i225"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i226"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i227"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i228"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Nail cutting</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i229"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i230"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i231"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i232"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i233"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i234"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i235"></td>
                    </tr>

                    <tr>
                        <th class="b-none" colspan="6">DRESSING & UNDRESSING</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Upper dressing</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i236"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i237"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i238"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i239"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i240"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i241"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i242"></td>
                        <td rowspan="5"><textarea name="i243" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Lower dressing</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i244"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i245"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i246"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i247"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i248"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i249"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i250"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Fastenings</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i251"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i252"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i253"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i254"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i255"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i256"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i257"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Shoe and sock</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i258"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i259"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i260"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i261"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i262"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i263"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i264"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Tie all kinds and open</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i265"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i266"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i267"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i268"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i269"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i270"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i271"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="border size-fit p-fit">
            <table style="border-collapse: separate; border-spacing: 20px 0;">
                <tbody class="paddingTable">
                    <tr>
                        <th class="b-none">FEEDING</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Nipple suckle(breast, bottle)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i272"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i273"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i274"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i275"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i276"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i277"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i278"></td>
                        <td rowspan="6"><textarea name="i279" rows="10" id="Getting" class="h-w-full b-none"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Spoon suckle (baby food, cereal)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i280"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i281"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i282"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i283"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i284"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i285"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i286"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Munching (finger food- banana- avocado)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i287"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i288"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i289"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i290"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i291"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i292"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i293"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hold bottle or cup by hands</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i294"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i295"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i296"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i297"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i298"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i299"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i300"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Eating by hands</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i301"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i302"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i303"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i304"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i305"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i306"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i307"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Advanced eating (spoon- fork-knife)</th>
                        <td><input class="input-none h-w-full" type="text" value='' name="i308"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i309"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i310"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i311"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i312"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i313"></td>
                        <td><input class="input-none h-w-full" type="text" value='' name="i314"></td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-top: 2rem;">
                <tbody>
                    <tr>
                        <th class="bg-yellow" colspan="2">Equipment & adaptations already in place</th>
                    </tr>
                    <tr>
                        <th>Occupational Therapy</th>
                        <td><textarea name="i315" cols="70" rows="7"></textarea></td>
                    </tr>
                    <tr>
                        <th>Medical / Health equipment</th>
                        <td><textarea name="i316" cols="70" rows="7"></textarea></td>
                    </tr>
                    <tr>
                        <th>Wheelchair service</th>
                        <td><textarea name="i317" cols="70" rows="7"></textarea></td>
                    </tr>
                </tbody>
            </table>
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