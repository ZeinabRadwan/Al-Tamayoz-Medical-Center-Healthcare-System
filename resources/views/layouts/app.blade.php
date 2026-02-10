<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Almotamez Med') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('styles')

</head>

<body>
    @include('layouts.sidebarmenu')

    <main>
        @yield('content')
    </main>

    <style>
        :root {
            --primary-color: rgba(68, 190, 83, 0.76);
            --primary-color2: #218838;
            --grey-light: #f8f9fa;
            --grey-dark: #343a40;
            --secondary-color: rgb(230, 249, 232);
        }

        .container {
            padding: 0 0 20px 0;
            animation: fadeIn 1s ease-out;
            font-family: 'Cairo', sans-serif;
        }

        .page-title {
            color: var(--primary-color2);
            margin: 20px 0 20px 0;
            text-align: center;
        }

        .page-title h1 {
            font-size: 48px;
        }

        .tab-btn.active {
            background-color: var(--primary-color);
            color: #fff;
        }

        .top-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 20px;
        }

        /* Tabs Style */
        .tabs-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            direction: ltr;
        }

        .tabs,
        .filter-tabs {
            display: flex;
            position: relative;
            padding: 0.5rem;
            box-shadow: 0 0 1px 0 rgba(24, 224, 44, 0.15), 0 6px 12px 0 rgba(109, 210, 115, 0.15);
            border-radius: 99px;
            border: 1px solid var(--primary-color);
            color: rgb(113, 113, 113);
        }

        .tabs * {
            z-index: 2;
        }

        input[type=radio] {
            display: none;
        }

        .tab,
        .filter-tabs button {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 200px;
            font-size: 22px;
            font-weight: 500;
            border-radius: 99px;
            cursor: pointer;
            transition: color 0.15s ease-in;
        }

        .notification {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 0.75rem;
            border-radius: 50%;
            background-color: var(--secondary-color);
            transition: 0.15s ease-in;
        }

        input[type=radio]:checked+label {
            color: var(--primary-color2);
        }

        input[type=radio]:checked+label>.notification {
            background-color: var(--primary-color);
            color: #fff;
        }

        input[id=radio-1]:checked~.glider {
            transform: translateX(0);
        }

        input[id=radio-2]:checked~.glider {
            transform: translateX(100%);
        }

        input[id=radio-3]:checked~.glider {
            transform: translateX(200%);
        }

        .glider {
            position: absolute;
            display: flex;
            height: 40px;
            width: 200px;
            background-color: var(--secondary-color);
            z-index: 1;
            border-radius: 99px;
            transition: 0.25s ease-out;
        }

        @media (max-width: 700px) {
            .tabs {
                transform: scale(0.6);
            }
        }

        /* sub menu */
        .sub-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .sub-tabs button {
            background-color: transparent;
            padding: 8px 20px;
            box-shadow: 0 0 1px 0 rgba(24, 224, 44, 0.15), 0 6px 12px 0 rgba(109, 210, 115, 0.15);
            border-radius: 99px;
            border: 1px solid var(--primary-color);
            color: rgb(113, 113, 113);
            transition: background-color 0.3s;
            font-size: 22px;
        }

        #sub-tab-unread span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 0.75rem;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: #fff;
            padding: 2px;
        }

        /* Search bar */
        .search-bar {
            flex: 1;
            max-width: 500px;
            direction: ltr;
        }

        .search-input {
            width: 100%;
            font-size: 20px;
            box-shadow: 0 0 1px 0 rgba(24, 224, 44, 0.15), 0 6px 12px 0 rgba(109, 210, 115, 0.15);
            border-radius: 99px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            direction: rtl;
        }

        .search-input:focus {
            border: 1px solid var(--primary-color);
            box-shadow: 0 0 4px rgba(40, 167, 69, 0.4);
            outline: none;
        }

        .search-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 9px 20px 9px 20px;
            border-radius: 99px;
            font-size: 22px;
font-family: 'Cairo', sans-serif;
            border: none;
            cursor: pointer;
            margin-left: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .search-btn i {
            font-size: 12px;
        }

        .search-btn:hover {
            background-color: var(--primary-color2);
            transform: scale(1.05);
        }

        /* Statistic list */
        .list-stats {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #2C6E49;
        }

        .list-stats ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .list-stats li {
            margin: 5px 15px;
            display: inline-block;
            font-size: 0.9rem;
        }

        .list-stats .color-box {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 4px;
            margin-right: 8px;
        }

        /* alerts */
        .alert-success,
        .alert-danger {
            background-color: #A5D6A7;
            color: #2C6E49;
            border: 1px solid #81C784;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            opacity: 0;
            text-align: center;
            animation: slideIn 1s forwards;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* table style */
        .no-items {
            text-align: center;
            font-size: 22px;
            color: var(--grey-dark);
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 20px;
            text-align: center;
        }

        .items-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid var(--primary-color2);
        }

        .items-table td {
            padding: 15px;
            border-bottom: 1px solid var(--grey-light);
        }

        .items-table tr:hover {
            background-color: var(--grey-light);
        }

        /* actions style */
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-icon {
            color: var(--primary-color);
            font-size: 20px;
            transition: color 0.3s, transform 0.3s;
        }

        .action-icon:hover {
            color: var(--primary-color2);
            transform: scale(1.1);
        }


.pagination-controls {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    gap: 10px;
}

.pagination-label {
    font-size: 16px;
    color: #2f7e32;
    font-weight: bold;
}

.pagination-select {
    padding: 5px 10px;
    font-size: 14px;
    border: 1px solid #2f7e32;
    border-radius: 5px;
    color: #2f7e32;
    background-color: #f9fff9;
    outline: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.pagination-select:hover {
    border-color: #1e5d23;
    background-color: #e6ffe6;
}

/* Pagination Buttons */
.pagination-container .pagination {
    display: flex;
    justify-content: center; /* Center the buttons */
    margin-top: 20px;
    gap: 5px;
}

.pagination-container .page-item {
    list-style: none;
}

.pagination-container .page-link {
    display: block;
    padding: 8px 12px;
    font-size: 14px;
    color: #fff;
    background-color: #2f7e32; /* Green background */
    border: 1px solid #2f7e32;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination-container .page-link:hover {
    background-color: #1e5d23;
    border-color: #1e5d23;
}

.pagination-container .page-item.active .page-link {
    background-color: #1e5d23;
    border-color: #1e5d23;
    color: #fff;
}

/* Arabic Result Message */
.results-message {
    text-align: center;
    font-size: 16px;
    color: #2f7e32;
    margin-top: 10px;
    font-weight: bold;
}
        /* Filter Form Styling */
        .filter-form {
            display: flex;
            align-items: center;
            gap: 15px;
            justify-content: flex-start;
            padding: 10px 20px;
            box-shadow: 0 0 1px 0 rgba(24, 224, 44, 0.15), 0 6px 12px 0 rgba(109, 210, 115, 0.15);
            border-radius: 99px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Label Styling */
        .filter-form label {
            font-size: 20px;
            font-weight: 500;
            color: #333;
            margin-right: 10px;
        }

        .form-select {
            padding: 8px 12px;
            font-size: 20px;
            border-radius: 6px;
            border: 1px solid #ddd;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        /* Button Styling */
        .btn {
            padding: 8px 20px;
            background-color: var(--primary-color);
            color: white;
            font-size: 20px;
            border: none;
            border-radius: 99px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: var(--primary-color2);
        }

        /* For the badge styles */
        .badgee {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: capitalize;
            background-color: var(--grey-light);
        }

        .bg-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .bg-success {
            background-color: var(--primary-color);
            color: #fff;
        }

        /* form style */
        .form-label {
            font-weight: bold;
            color: var(--primary-color2);
        }

        .form-control {
            border: 1px solid var(--grey-dark);
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: var(--primary-color2);
            box-shadow: 0 0 5px rgba(68, 190, 83, 0.5);
        }

        .form-select:focus {
            border-color: var(--primary-color2);
            box-shadow: 0 0 5px rgba(68, 190, 83, 0.5);
            outline: none;
        }

        .text-danger {
            font-size: 0.875em;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.min.js"></script>
</body>

</html>