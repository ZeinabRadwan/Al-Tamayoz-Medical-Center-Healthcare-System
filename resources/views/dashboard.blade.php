@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">

<div class="container">
<header class="page-header">
    <div class="header-content">
        <h1 class="header-title">لوحة التحكم</h1>
        <p class="header-subtitle">احصل على نظرة عامة حول الإحصائيات المهمة لمجمعك</p>
    </div>
</header>

<style>
    /* Header Container Styling */
.page-header {
    background-color: #f3f4f6; /* Light background for the header */
    padding: 40px 24px;
    margin-bottom: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Header Content Styling */
.header-content {
    margin: 0 auto;
}

/* Header Title Styling */
.header-title {
    font-size: 32px;
    font-weight: 700;
    color: #73C36A;
    margin-bottom: 8px;
    font-family: 'Cairo', sans-serif; /* Good Arabic font */
}

/* Header Subtitle Styling */
.header-subtitle {
    font-size: 18px;
    color: #9C80D7;
    font-weight: 400;
    font-family: 'Cairo', sans-serif; /* Arabic font for subtitle */
}

</style>    
    
<div class="cardd-container">
    <div class="cardd">
        <div class="cardd-content">
            <div class="cardd-icon blue">
                <i class="fa-regular fa-calendar-check"></i>
            </div>
            <div class="cardd-details">
                <p class="cardd-title">مواعيد اليوم</p>
                <p class="cardd-value">{{ $todayAppointments }}</p>
            </div>
            <div class="cardd-stat">
                <span class="stat-value green">+{{ number_format(($weeklyStats['appointments'] / 7), 1) }}</span>
                <span class="stat-text">المتوسط اليومي</span>
            </div>
        </div>
    </div>

    <div class="cardd">
        <div class="cardd-content">
            <div class="cardd-icon green">
                <i class="fa-solid fa-hospital-user"></i>
            </div>
            <div class="cardd-details">
                <p class="cardd-title">إجمالي المرضى</p>
                <p class="cardd-value">{{ number_format($totalPatients) }}</p>
            </div>
            <div class="cardd-stat">
                <span class="stat-value green">+{{ $weeklyStats['newPatients'] }}</span>
                <span class="stat-text">هذا الأسبوع</span>
            </div>
        </div>
    </div>

    <div class="cardd">
        <div class="cardd-content">
            <div class="cardd-icon yellow">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <div class="cardd-details">
                <p class="carddd-title">رسائل جديدة</p>
                <p class="cardd-value">{{ $unreadMessages }}</p>
            </div>
            <div class="cardd-link">
                <a href="{{ route('contacts.index') }}" class="cardd-button">عرض الرسائل →</a>
            </div>
        </div>
    </div>

    <div class="cardd">
        <div class="cardd-content">
            <div class="cardd-icon purple">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <div class="cardd-details">
                <p class="cardd-title">إيرادات اليوم</p>
                <p class="cardd-value">{{ number_format($todayRevenue) }} ر.س</p>
            </div>
            <div class="cardd-stat">
                <span class="stat-value green">{{ number_format($weeklyStats['revenue']) }} ر.س</span>
                <span class="stat-text"> هذا الأسبوع </span>
            </div>
        </div>
    </div>

    <div class="cardd">
    <div class="cardd-content">
        <div class="cardd-icon red">
            <i class="fa-solid fa-hand"></i>
        </div>
        <div class="cardd-details">
            <p class="cardd-title">طلبات الأجازات</p>
            <p class="cardd-value">{{ $pendingVacations }}</p>
        </div>
        <div class="cardd-link">
            <a href="{{ route('vacations.admin') }}" class="cardd-button">عرض الأجازات →</a>
        </div>
    </div>
</div>
</div>


<style>
.cardd-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr); 
    gap: 20px;
    margin-bottom: 40px;
        font-family: 'Cairo', sans-serif;
}

.cardd {
    background-color: #ffffff;
    border-radius: 25px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.cardd:hover {
    transform: translateY(-10px);
}

.cardd-content {
    padding: 24px;
}

.cardd-icon {
    width: 48px;
    height: 48px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color: #fff;
    margin-right: 16px;
}

.cardd-icon.blue {
    background-color: #93c5fd;
}

.cardd-icon.green {
    background-color: #34d399;
}

.cardd-icon.yellow {
    background-color: #fbbf24;
}

.cardd-icon.purple {
    background-color: #a78bfa;
}

.cardd-icon.red {
    background-color: #f87171; 
}

.cardd-details {
    display: flex;
    flex-direction: column;
}

.cardd-title {
    font-size: 14px;
    color: #4b5563;
}

.cardd-value {
    font-size: 24px;
    font-weight: 600;
    color: #1f2937;
}

.cardd-stat {
    margin-top: 16px;
    display: flex;
    align-items: center;
    font-size: 14px;
}

.stat-value {
    color: #10b981;
    margin-right: 8px;
}

.stat-text {
    color: #6b7280;
}

.cardd-link {
    margin-top: 16px;
}

.cardd-button {
    font-size: 14px;
    color: #3b82f6;
    text-decoration: none;
    transition: color 0.3s ease;
}

.cardd-button:hover {
    color: #1e40af;
}
</style>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg text-gray-900 mb-6" style="font-family: 'Cairo', sans-serif;">إحصائيات المواعيد</h3>
            <canvas id="appointmentsChart" height="300"></canvas>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg text-gray-900 mb-6" style="font-family: 'Cairo', sans-serif;">إحصائيات الإيرادات</h3>
            <canvas id="revenueChart" height="300"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const appointmentCtx = document.getElementById('appointmentsChart').getContext('2d');
    new Chart(appointmentCtx, {
        type: 'line',
        data: {
            labels: {!!json_encode($appointmentTrends -> pluck('date')) !!},
            datasets: [{
                label: 'المواعيد',
                data: {!!json_encode($appointmentTrends -> pluck('count')) !!},
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    rtl: true,
                    labels: {
                        font: {
                            family: 'Cairo'
                        }
                    }
                },
                tooltip: {
                    rtl: true,
                    titleFont: {
                        family: 'Cairo'
                    },
                    bodyFont: {
                        family: 'Cairo'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            family: 'Cairo'
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: 'Cairo'
                        }
                    }
                }
            }
        }
    });

    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: {!!json_encode($revenueTrends -> pluck('date')) !!},
            datasets: [{
                label: 'الإيرادات',
                data: {!!json_encode($revenueTrends -> pluck('amount')) !!},
                backgroundColor: 'rgba(147, 51, 234, 0.5)',
                borderColor: 'rgb(147, 51, 234)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    rtl: true,
                    labels: {
                        font: {
                            family: 'Cairo'
                        }
                    }
                },
                tooltip: {
                    rtl: true,
                    titleFont: {
                        family: 'Cairo'
                    },
                    bodyFont: {
                        family: 'Cairo'
                    },
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += new Intl.NumberFormat('ar-EG', {
                                style: 'currency',
                                currency: 'EGP'
                            }).format(context.parsed.y);
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            family: 'Cairo'
                        },
                        callback: function(value) {
                            return new Intl.NumberFormat('ar-EG', {
                                style: 'currency',
                                currency: 'EGP'
                            }).format(value);
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: 'Cairo'
                        }
                    }
                }
            }
        }
    });
</script>
