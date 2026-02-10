@extends('layouts.app')

@section('content')
<div class="container">
   <div class="top-controls">
    <header class="page-title">
        <h1>رسائل الاتصال</h1>
    </header>

    <div class="filter-tabs">
        <button class="tab-btn" onclick="filterMessages('', '')" id="tab-all">الجميع</button>
        <button class="tab-btn" onclick="filterMessages('thanks', '')" id="tab-thanks">شكر</button>
        <button class="tab-btn" onclick="filterMessages('complaint', '')" id="tab-complaint">شكوى</button>
        <button class="tab-btn" onclick="filterMessages('suggestion', '')" id="tab-suggestion">اقتراح</button>
    </div>

    <div class="filter-tabs">
        <button class="tab-btn" type="button" onclick="filterMessages(currentSubject, 'unread')" id="sub-tab-unread">
            <i class="fa-solid fa-filter" style="margin-left: 10px;"></i>
            غير مقروءة
            <span id="unread-count">0</span>
        </button>
        <button class="tab-btn" type="button" onclick="filterMessages(currentSubject, '')" id="sub-tab-unread">
            <i class="fa-solid fa-filter-circle-xmark" style="margin-left: 10px;"></i>
            ازالة الفلتر
        </button>
    </div>
    </div>

    
    <div id="no-results-message" class="no-results-message" style="display: none;">
        <p class="no-items">لا توجد رسائل لعرضها.</p>
    </div>

    <table id="messagesTable" class="items-table">
                <thead>
                    <tr>
                    <th>#</th>

                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الهاتف</th>
                <th>الموضوع</th>
                <th>الرسالة</th>
                <th>الحالة</th>
                <th>حذف</th>
                <th>تم الإرسال في</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $messages->sortByDesc('created_at') as $message)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 message-row {{  $message->is_read ? '' : 'readed' }}"
                data-subject="{{ strtolower( $message->subject) }}"
                data-read="{{  $message->is_read ? 'read' : 'unread' }}">
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->subject }}</td>
                <td>
                    <a href="{{ route('message.show', $message->id) }}" class="action-icon">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" id="toggle-read-{{  $message->id }}"
                            {{  $message->is_read ? 'checked' : '' }}
                            onchange="toggleReadStatus({{  $message->id }})">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $message->is_read ? 'تم قراءة الرسالة' : 'لم تقرأ الرسالة' }}
                        </span>
                    </label>
                </td>
                <td>
                    <form method="POST" action="{{ route('messages.destroy',  $message->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="action-icon">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    
</style>

<script>
    let currentSubject = '';

    function setActiveTab(tabId, type) {
        const tabClass = type === 'main' ? '.tab-btn' : '.sub-tab-btn';
        document.querySelectorAll(tabClass).forEach(btn => btn.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');
    }

    function filterMessages(subjectFilter, readFilter) {
        currentSubject = subjectFilter;
        const rows = document.querySelectorAll('.message-row');
        let visibleRows = 0;
        let unreadCount = 0;

        rows.forEach(row => {
            const subject = row.getAttribute('data-subject');
            const isRead = row.getAttribute('data-read');

            const matchesSubject = !subjectFilter || subject.includes(subjectFilter);
            const matchesRead = !readFilter || isRead === readFilter;

            if (isRead === 'unread' && matchesSubject) {
                unreadCount++;
            }

            row.style.display = matchesSubject && matchesRead ? '' : 'none';

            if (row.style.display === '') visibleRows++;
        });

        const unreadCountSpan = document.getElementById('unread-count');
        unreadCountSpan.textContent = unreadCount;

        if (subjectFilter) setActiveTab(`tab- ${subjectFilter}`, 'main');
        else setActiveTab('tab-all', 'main');

        if (readFilter) setActiveTab(`sub-tab- ${readFilter}`, 'sub');

        const noResultsMessage = document.getElementById('no-results-message');
        const table = document.getElementById('messagesTable');
        noResultsMessage.style.display = visibleRows === 0 ? 'block' : 'none';
        table.style.display = visibleRows === 0 ? 'none' : 'table';
    }

    function toggleReadStatus(messageId) {
        fetch(`/messages/ ${messageId}/toggle-read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                }
            });
    }

    window.onload = function() {
        filterMessages('', '');
    };
</script>
@endsection