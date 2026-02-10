@extends('layouts.app')

@section('content')
<div class="container">
    <div class="top-controls">
        <header class="page-title">
            <h1>طلبات الإجازات</h1>
        </header>
    </div>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    <table class="items-table">
        <thead>
            <tr>
                <th>#</th>
                <th>الموظف</th>
                <th>تاريخ البدء</th>
                <th>تاريخ الانتهاء</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vacations as $vacation)
                <tr class="fade-in">
                    <td>{{ $vacation->id }}</td>
                    <td>{{ $vacation->employee->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($vacation->start_date)->format('d M, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($vacation->end_date)->format('d M, Y') }}</td>
                    <td>
                        <span class="badge 
                                                @if($vacation->status == 'pending') badge-warning 
                                                @elseif($vacation->status == 'approved') badge-success 
                                                @elseif($vacation->status == 'rejected') badge-danger 
                                                    @else badge-secondary 
                                                @endif">
                            {{ ucfirst($vacation->status) }}
                        </span>
                    </td>
                    <td>
                        @if ($vacation->status === 'pending')
                            <div class="d-flex justify-content-center">
                                <!-- Approve Button -->
                                <form method="POST" action="{{ route('vacations.updateStatus', $vacation) }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success btn-sm me-2">
                                        <i class="fas fa-check"></i> موافقة
                                    </button>
                                </form>

                                <!-- Reject Button -->
                                <form method="POST" action="{{ route('vacations.updateStatus', $vacation) }}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                                        <i class="fas fa-times"></i> رفض
                                    </button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">لا يوجد طلبات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<script>
    setTimeout(function () {
        let successAlert = document.getElementById('success-alert');
        let errorAlert = document.getElementById('error-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 2000);
</script>
