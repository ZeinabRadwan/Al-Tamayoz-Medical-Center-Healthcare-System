<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatment Plan</title>
    <link rel="stylesheet" href="vv0all.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <style>
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
            margin-bottom: 20px;
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
            background-color: #f0f0f0;
            height: 30px;
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
            text-align: center;
        }

        .conta {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            width: block;
        }

        input , li {
            width: 100%;
        }

        #short-term-goals , #long-term-goals ,
        #short-term-goals2 , #long-term-goals2 ,
        #short-term-goals3 , #long-term-goals3        
        {
            width: 350px;
        }

        @media print {

            .bcont,
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

            input {
                border: none !important;
                outline: none !important;
            }

            #short-term-goals input {
                border: none !important;
                outline: none !important;
            }

            @page {
                size: landscape;
            }
        }

        ul {
        list-style-type: none !important;
        padding-left: 0 !important; 
    }
    </style>
</head>

<body style="display: flex; flex-direction: column; gap: 2rem; align-items: center;">

    <form action=" {{ route('treatment_plan_of_care.store') }} " method="Post">
        @csrf

        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

        <input type="hidden" name="template_id" value="{{ $template->id }}">

        <div class="border size-fit p-fit">
            <h3>Treatment plan of care:</h3>
            <div style="margin-left: 4rem;">
                <h4>Problems List:</h4>
                <ul id="problems-list">
                    <li><input type="text" name="problems[]" placeholder="1-"></li>
                </ul>
                <button type="button" onclick="addProblem()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        <h4>Short term goals:</h4>
                        <ul id="short-term-goals">
                            <li><input type="text" name="short_term_goals[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addShortTermGoal()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        <h4>Long term goals:</h4>
                        <ul id="long-term-goals">
                            <li><input type="text" name="long_term_goals[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addLongTermGoal()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border size-fit p-fit">
            <h3>Re Assessment Plan of care After 6 sessions:</h3>
            <div style="margin-left: 4rem;">
                <h4>Problems List:</h4>
                <ul id="problems-list2">
                    <li><input type="text" name="problems2[]" placeholder="1-"></li>
                </ul>
                <button type="button" onclick="addProblem2()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        <h4>Short term goals:</h4>
                        <ul id="short-term-goals2">
                            <li><input type="text" name="short_term_goals2[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addShortTermGoal2()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        <h4>Long term goals:</h4>
                        <ul id="long-term-goals2">
                            <li><input type="text" name="long_term_goals2[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addLongTermGoal2()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border size-fit p-fit">
            <h3>Re Assessment Plan of care After 12 sessions:</h3>
            <div style="margin-left: 4rem;">
                <h4>Problems List:</h4>
                <ul id="problems-list3">
                    <li><input type="text" name="problems3[]" placeholder="1-"></li>
                </ul>
                <button type="button" onclick="addProblem3()" style="font-size: 12px; padding: 2px 5px;">+</button>

                <div style="display: flex; gap: 2rem; margin-top: 1rem;">
                    <div>
                        <h4>Short term goals:</h4>
                        <ul id="short-term-goals3">
                            <li><input type="text" name="short_term_goals3[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addShortTermGoal3()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                    <div>
                        <h4>Long term goals:</h4>
                        <ul id="long-term-goals3">
                            <li><input type="text" name="long_term_goals3[]" placeholder="1-"></li>
                        </ul>
                        <button type="button" onclick="addLongTermGoal3()"
                            style="font-size: 12px; padding: 2px 5px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div class='conta'>
            <button class='dko' type="submit">حفظ</button>

            <div class='dko' name='btn4' onclick="printPage()">
                طباعة
            </div>
        </div>
    </form>
</body>

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

</html>