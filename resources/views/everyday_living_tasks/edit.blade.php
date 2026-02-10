<link rel="stylesheet" href="vv0all.css">

<style>
    <style>@media print {
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
            background-color: height: 30px;
        }

        .b-none {
            border: none;
            color: darkgreen;
        }
    </style>
</head>

<body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">


    <form action="{{ route('everyday_living_tasks.update' , $report->id) }}" method="Post">
        @csrf
        @method('PUT')


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
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i1 }}' name="i1"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i2 }}' name="i2"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i3 }}' name="i3"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i4 }}' name="i4"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i5 }}' name="i5"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i6 }}' name="i6"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i7 }}' name="i7"></td>
                        <td rowspan="16"><textarea name="i137" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i137 }}</textarea></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i8 }}' name="i8"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i9 }}' name="i9"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i10 }}' name="i10"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i11 }}' name="i11"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i12 }}' name="i12"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i13 }}' name="i13"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i14 }}' name="i14"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Managing clothes</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i15 }}' name="i15"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i16 }}' name="i16"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i17 }}' name="i17"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i18 }}' name="i18"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i19 }}' name="i19"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i20 }}' name="i20"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i21 }}' name="i21"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Wiping self</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i22 }}' name="i22"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i23 }}' name="i23"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i24 }}' name="i24"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i25 }}' name="i25"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i26 }}' name="i26"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i27 }}' name="i27"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i28 }}' name="i28"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Flushing WC</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i29 }}' name="i29"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i30 }}' name="i30"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i31 }}' name="i31"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i32 }}' name="i32"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i33 }}' name="i33"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i34 }}' name="i34"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i35 }}' name="i35"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Diapers(dependent)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i36 }}' name="i36"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i37 }}' name="i37"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i38 }}' name="i38"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i39 }}' name="i39"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i40 }}' name="i40"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i41 }}' name="i41"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i42 }}' name="i42"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Indicate discomfort from wetness in their diapers</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i43 }}' name="i43"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i44 }}' name="i44"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i45 }}' name="i45"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i46 }}' name="i46"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i47 }}' name="i47"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i48 }}' name="i48"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i49 }}' name="i49"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Demand for toilet when needed</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i50 }}' name="i50"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i51 }}' name="i51"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i52 }}' name="i52"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i53 }}' name="i53"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i54 }}' name="i54"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i55 }}' name="i55"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i56 }}' name="i56"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hold (urine and feces until reach toilet)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i57 }}' name="i57"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i58 }}' name="i58"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i59 }}' name="i59"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i60 }}' name="i60"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i61 }}' name="i61"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i62 }}' name="i62"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i63 }}' name="i63"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Pulling down diapers or pants</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i64 }}' name="i64"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i65 }}' name="i65"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i66 }}' name="i66"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i67 }}' name="i67"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i68 }}' name="i68"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i69 }}' name="i69"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i70 }}' name="i70"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Setting correctly on the toilet</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i71 }}' name="i71"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i72 }}' name="i72"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i73 }}' name="i73"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i74 }}' name="i74"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i75 }}' name="i75"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i76 }}' name="i76"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i77 }}' name="i77"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Relax to urinate/ defecate</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i78 }}' name="i78"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i79 }}' name="i79"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i80 }}' name="i80"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i81 }}' name="i81"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i82 }}' name="i82"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i83 }}' name="i83"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i84 }}' name="i84"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Pull up pants</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i85 }}' name="i85"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i86 }}' name="i86"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i87 }}' name="i87"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i88 }}' name="i88"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i89 }}' name="i89"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i90 }}' name="i90"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i91 }}' name="i91"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Cleaning self when finish (flush)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i92 }}' name="i92"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i93 }}' name="i93"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i94 }}' name="i94"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i95 }}' name="i95"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i96 }}' name="i96"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i97 }}' name="i97"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i98 }}' name="i98"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Clean the toilet</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i99 }}' name="i99"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i100 }}' name="i100"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i101 }}' name="i101"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i102 }}' name="i102"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i103 }}' name="i103"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i104 }}' name="i104"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i105 }}' name="i105"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Wash and dry hands</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i106 }}' name="i106"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i107 }}' name="i107"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i108 }}' name="i108"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i109 }}' name="i109"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i110 }}' name="i110"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i111 }}' name="i111"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i112 }}' name="i112"></td>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="8">BED</th>
                        <th class="b-none">Height:</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting on</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i113 }}' name="i113"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i114 }}' name="i114"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i115 }}' name="i115"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i116 }}' name="i116"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i117 }}' name="i117"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i118 }}' name="i118"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i119 }}' name="i119"></td>
                        <td rowspan="4"><textarea name="i120" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i120 }}</textarea></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i121 }}' name="i121"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i122 }}' name="i122"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i123 }}' name="i123"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i124 }}' name="i124"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i125 }}' name="i125"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i126 }}' name="i126"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i127 }}' name="i127"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Raising self from lying</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i128 }}' name="i128"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i129 }}' name="i129"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i130 }}' name="i130"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i131 }}' name="i131"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i132 }}' name="i132"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i133 }}' name="i133"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i134 }}' name="i134"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Repositioning</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i135 }}' name="i135"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i136 }}' name="i136"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i137 }}' name="i137"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i138 }}' name="i138"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i139 }}' name="i139"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i140 }}' name="i140"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i141 }}' name="i141"></td>
                    </tr>

                    <tr>
                        <th class="b-none" colspan="8">CHAIR</th>
                        <th class="b-none">Height:</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting on</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i142 }}' name="i142"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i143 }}' name="i143"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i144 }}' name="i144"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i145 }}' name="i145"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i146 }}' name="i146"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i147 }}' name="i147"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i148 }}' name="i148"></td>
                        <td rowspan="2"><textarea name="i149" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i149 }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting off</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i150 }}' name="i150"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i151 }}' name="i151"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i152 }}' name="i152"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i153 }}' name="i153"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i154 }}' name="i154"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i155 }}' name="i155"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i156 }}' name="i156"></td>
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
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i157 }}' name="i157"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i158 }}' name="i158"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i159 }}' name="i159"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i160 }}' name="i160"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i161 }}' name="i161"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i162 }}' name="i162"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i163 }}' name="i163"></td>
                        <td rowspan="5"><textarea name="i164" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i164 }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Getting out</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i165 }}' name="i165"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i166 }}' name="i166"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i167 }}' name="i167"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i168 }}' name="i168"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i169 }}' name="i169"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i170 }}' name="i170"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i171 }}' name="i171"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Washing (Including hair)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i172 }}' name="i172"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i173 }}' name="i173"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i174 }}' name="i174"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i175 }}' name="i175"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i176 }}' name="i176"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i177 }}' name="i177"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i178 }}' name="i178"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Drying</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i179 }}' name="i179"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i180 }}' name="i180"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i181 }}' name="i181"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i182 }}' name="i182"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i183 }}' name="i183"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i184 }}' name="i184"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i185 }}' name="i185"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Turning taps</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i186 }}' name="i186"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i187 }}' name="i187"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i188 }}' name="i188"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i189 }}' name="i189"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i190 }}' name="i190"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i191 }}' name="i191"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i192 }}' name="i192"></td>
                    </tr>
                    <tr>
                        <th class="b-none" colspan="6">GROOMING & PERSONAL HYGIENE</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hair styling</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i193 }}' name="i193"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i194 }}' name="i194"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i195 }}' name="i195"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i196 }}' name="i196"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i197 }}' name="i197"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i198 }}' name="i198"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i199 }}' name="i199"></td>
                        <td rowspan="6"><textarea name="i200" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i200 }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Tooth brushing</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i201 }}' name="i201"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i202 }}' name="i202"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i203 }}' name="i203"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i204 }}' name="i204"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i205 }}' name="i205"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i205 }}' name="i206"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i207 }}' name="i207"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Menstrual cycle care</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i208 }}' name="i208"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i209 }}' name="i209"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i210 }}' name="i210"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i211 }}' name="i211"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i212 }}' name="i212"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i213 }}' name="i213"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i214 }}' name="i214"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Washing hands and face</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i215 }}' name="i215"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i216 }}' name="i216"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i217 }}' name="i217"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i218 }}' name="i218"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i219 }}' name="i219"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i220 }}' name="i220"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i221 }}' name="i221"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Nose cleaning</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i222 }}' name="i222"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i223 }}' name="i223"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i224 }}' name="i224"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i225 }}' name="i225"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i226 }}' name="i226"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i227 }}' name="i227"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i228 }}' name="i228"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Nail cutting</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i229 }}' name="i229"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i230 }}' name="i230"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i231 }}' name="i231"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i232 }}' name="i232"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i233 }}' name="i233"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i234 }}' name="i234"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i235 }}' name="i235"></td>
                    </tr>

                    <tr>
                        <th class="b-none" colspan="6">DRESSING & UNDRESSING</th>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Upper dressing</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i236 }}' name="i236"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i237 }}' name="i237"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i238 }}' name="i238"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i239 }}' name="i239"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i240 }}' name="i240"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i241 }}' name="i241"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i242 }}' name="i242"></td>
                        <td rowspan="5"><textarea name="i243" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i243 }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Lower dressing</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i244 }}' name="i244"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i245 }}' name="i245"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i246 }}' name="i246"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i247 }}' name="i247"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i248 }}' name="i248"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i249 }}' name="i249"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i250 }}' name="i250"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Fastenings</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i251 }}' name="i251"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i252 }}' name="i252"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i253 }}' name="i253"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i254 }}' name="i254"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i255 }}' name="i255"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i256 }}' name="i256"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i257 }}' name="i257"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Shoe and sock</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i258 }}' name="i258"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i259 }}' name="i259"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i260 }}' name="i260"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i261 }}' name="i261"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i262 }}' name="i262"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i263 }}' name="i263"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i264 }}' name="i264"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Tie all kinds and open</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i265 }}' name="i265"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i266 }}' name="i266"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i267 }}' name="i267"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i268 }}' name="i268"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i269 }}' name="i269"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i270 }}' name="i270"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i271 }}' name="i271"></td>
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
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i272 }}' name="i272"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i273 }}' name="i273"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i274 }}' name="i274"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i275 }}' name="i275"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i276 }}' name="i276"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i277 }}' name="i277"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i278 }}' name="i278"></td>
                        <td rowspan="6"><textarea name="i279" rows="10" id="Getting" class="h-w-full b-none">{{ $report->i279 }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Spoon suckle (baby food, cereal)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i280 }}' name="i280"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i281 }}' name="i281"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i282 }}' name="i282"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i283 }}' name="i283"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i284 }}' name="i284"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i285 }}' name="i285"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i286 }}' name="i286"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Munching (finger food- banana- avocado)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i287 }}' name="i287"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i288 }}' name="i288"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i289 }}' name="i289"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i290 }}' name="i290"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i291 }}' name="i291"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i292 }}' name="i292"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i293 }}' name="i293"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Hold bottle or cup by hands</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i294 }}' name="i294"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i295 }}' name="i295"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i296 }}' name="i296"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i297 }}' name="i297"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i298 }}' name="i298"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i299 }}' name="i299"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i300 }}' name="i300"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Eating by hands</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i301 }}' name="i301"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i302 }}' name="i302"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i303 }}' name="i303"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i304 }}' name="i304"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i305 }}' name="i305"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i306 }}' name="i306"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i307 }}' name="i307"></td>
                    </tr>
                    <tr>
                        <th class="bg-yellow">Advanced eating (spoon- fork-knife)</th>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i308 }}' name="i308"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i309 }}' name="i309"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i310 }}' name="i310"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i311 }}' name="i311"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i312 }}' name="i312"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i313 }}' name="i313"></td>
                        <td><input class="input-none h-w-full" type="text" value='{{ $report->i314 }}' name="i314"></td>
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
                        <td><textarea name="i315" cols="70" rows="7">{{ $report->i315 }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Medical / Health equipment</th>
                        <td><textarea name="i316" cols="70" rows="7">{{ $report->i316 }}</textarea></td>
                    </tr>
                    <tr>
                        <th>Wheelchair service</th>
                        <td><textarea name="i317" cols="70" rows="7">{{ $report->i317 }}</textarea></td>
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