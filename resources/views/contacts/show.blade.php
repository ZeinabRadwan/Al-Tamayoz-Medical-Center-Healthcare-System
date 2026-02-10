@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Title -->
    <header>
        <h1>تفاصيل الرسالة</h1>
    </header>

    <!-- Success and Error Messages -->
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

    <!-- Message Details -->
    <div class="message-details">
        <p><strong>الاسم:</strong> {{ $message->name }}</p>
        <p><strong>البريد الإلكتروني:</strong> {{ $message->email }}</p>
        <p><strong>الهاتف:</strong> {{ $message->phone }}</p>
        <p><strong>الموضوع:</strong> {{ $message->subject }}</p>
        <p><strong>الرسالة:</strong></p>
        <p>{{ $message->message_content }}</p>
        <p><strong>تم الإرسال في:</strong> {{ $message->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <!-- Back Button -->
    <a href="{{ route('contacts.index') }}" class="btn">عودة إلى الرسائل</a>
</div>

<style>
    .container {
        direction: rtl;
        text-align: right;
        margin: 0 auto;
        max-width: 94%;
        margin-right: 5%;
    }

    header {
        text-align: center;
        padding: 10px 20px;
        margin-top: 0;
        margin-bottom: 20px;
        border-radius: 0 0 15px 15px;
        background-image: linear-gradient(to right, #cbe4c7, #a3d8a1);
    }

    header h1 {
        color: #567357;
        font-size: 2rem;
        margin: 0;
    }

    .message-details {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .message-details p {
        font-size: 1rem;
        color: #567357;
        line-height: 1.6;
    }

    .message-details strong {
        font-weight: bold;
    }

    .btn{
        display: inline-block;
        padding: 10px 25px;
        background-color: #567357;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #4a6b4a;
    }
</style>

@endsection
