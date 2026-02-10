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

<form action=" {{ route('treatment_plan_of_care.update' , $report->id) }} " method="Post">
    @csrf
    @method('PUT')



    <body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">
        <div class="border size-fit p-fit">
            <h3>Treatment Plan of Care:</h3>
            <div style="margin-left: 4rem;">
                @if (!empty($report->problems_list))
                <h4>Problems List:</h4>

                <ul id="problems-list">
                    @foreach ($report->problems_list as $index => $problem)
                    <li>
                        <input type="text" name="problems[]" value="{{ $problem }}" placeholder="{{ $index + 1 }}-">
                    </li>
                    @endforeach
                </ul>
                @endif
                <button type="button" onclick="addProblem()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        @if (!empty($report->short_term_goals))
                        <h4>Short Term Goals:</h4>
                        <ul id="short-term-goals">
                            @foreach ($report->short_term_goals as $index => $goal)
                            <li>
                                <input type="text" name="short_term_goals[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <button type="button" onclick="addShortTermGoal()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        @if (!empty($report->long_term_goals))

                        <h4>Long Term Goals:</h4>
                        <ul id="long-term-goals">
                            @foreach ($report->long_term_goals as $index => $goal)
                            <li>
                                <input type="text" name="long_term_goals[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <button type="button" onclick="addLongTermGoal()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function addProblem() {
                const list = document.getElementById('problems-list');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="problems[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addShortTermGoal() {
                const list = document.getElementById('short-term-goals');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="short_term_goals[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addLongTermGoal() {
                const list = document.getElementById('long-term-goals');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="long_term_goals[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }
        </script>



        <div class="border size-fit p-fit">
            <h3>Re Assessment Plan of care After 6 sessions:</h3>
            <div style="margin-left: 4rem;">
                <h4>Problems List:</h4>
                <ul id="problems-list2">
                    @foreach ($report->problems_list_6 ?? [] as $index => $problem)
                    <li>
                        <input type="text" name="problems2[]" value="{{ $problem }}" placeholder="{{ $index + 1 }}-">
                    </li>
                    @endforeach
                </ul>
                <button type="button" onclick="addProblem2()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        <h4>Short Term Goals:</h4>
                        <ul id="short-term-goals2">
                            @foreach ($report->short_term_goals_6 ?? [] as $index => $goal)
                            <li>
                                <input type="text" name="short_term_goals2[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="addShortTermGoal2()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        <h4>Long Term Goals:</h4>
                        <ul id="long-term-goals2">
                            @foreach ($report->long_term_goals_6 ?? [] as $index => $goal)
                            <li>
                                <input type="text" name="long_term_goals2[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="addLongTermGoal2()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addProblem2() {
                const list = document.getElementById('problems-list2');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="problems2[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addShortTermGoal2() {
                const list = document.getElementById('short-term-goals2');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="short_term_goals2[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addLongTermGoal2() {
                const list = document.getElementById('long-term-goals2');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="long_term_goals2[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }
        </script>


        <div class="border size-fit p-fit">
            <h3>Re Assessment Plan of care After 12 sessions:</h3>
            <div style="margin-left: 4rem;">
                <h4>Problems List:</h4>
                <ul id="problems-list3">
                    @foreach ($report->problems_list_12 ?? [] as $index => $problem)
                    <li>
                        <input type="text" name="problems3[]" value="{{ $problem }}" placeholder="{{ $index + 1 }}-">
                    </li>
                    @endforeach
                </ul>
                <button type="button" onclick="addProblem3()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        <h4>Short Term Goals:</h4>
                        <ul id="short-term-goals3">
                            @foreach ($report->short_term_goals_12 ?? [] as $index => $goal)
                            <li>
                                <input type="text" name="short_term_goals3[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="addShortTermGoal3()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        <h4>Long Term Goals:</h4>
                        <ul id="long-term-goals3">
                            @foreach ($report->long_term_goals_12 ?? [] as $index => $goal)
                            <li>
                                <input type="text" name="long_term_goals3[]" value="{{ $goal }}" placeholder="{{ $index + 1 }}-">
                            </li>
                            @endforeach
                        </ul>
                        <button type="button" onclick="addLongTermGoal3()" style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addProblem3() {
                const list = document.getElementById('problems-list3');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="problems3[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addShortTermGoal3() {
                const list = document.getElementById('short-term-goals3');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="short_term_goals3[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }

            function addLongTermGoal3() {
                const list = document.getElementById('long-term-goals3');
                const newItem = document.createElement('li');
                newItem.innerHTML = `<input type="text" name="long_term_goals3[]" placeholder="${list.children.length + 1}-">`;
                list.appendChild(newItem);
            }
        </script>


        <button class="dko">
            تعديل
        </button>
    </body>
</form>

</html>