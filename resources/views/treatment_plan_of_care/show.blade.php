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

<form>



    <body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
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

        <div class='conta' style="display: flex; justify-content: center; gap: 2rem;">

            <a href="{{ route('treatment_plan_of_care.edit' , $report->id) }}" class="dko">
                تعديل
            </a>
            <div class="dko" onclick="window.print();">
                طباعة
            </div>
        </div>
    </body>
</form>

</html>