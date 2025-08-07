@extends('layout.admin')
@section('title', 'Dashboard - ')

@section('content')

<style>
    #enquiryChart {
        max-height: 400px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">

            <!-- Enquiry Summary Cards -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-light bg-opacity-50 rounded">
                                    <iconify-icon icon="solar:leaf-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">Today Enquiries</p>
                                <h3 class="text-dark mt-1 mb-0">{{ \App\Models\Contact::whereDate('created_at', today())->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-light bg-opacity-50 rounded">
                                    <iconify-icon icon="solar:cpu-bolt-line-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">Total Enquiries</p>
                                <h3 class="text-dark mt-1 mb-0">{{ \App\Models\Contact::count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blogs & Partners -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-light bg-opacity-50 rounded">
                                    <iconify-icon icon="solar:layers-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">Total Blogs</p>
                                <h3 class="text-dark mt-1 mb-0">{{ DB::table('blogs')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-light bg-opacity-50 rounded">
                                    <iconify-icon icon="solar:layers-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">Total Partners</p>
                                <h3 class="text-dark mt-1 mb-0">{{ DB::table('partners')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart with Filter -->
            <div class="col-md-12">
                <div class="card shadow-sm border rounded">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">📊 Enquiries Overview</h5>

                        <!-- Filter Dropdown -->
                        <form method="GET" action="{{ route('dashboard') }}">
                            <select name="filter" class="form-select" onchange="this.form.submit()">
                                <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Today</option>
                                <option value="this_week" {{ $filter == 'this_week' ? 'selected' : '' }}>This Week</option>
                                <option value="this_month" {{ $filter == 'this_month' ? 'selected' : '' }}>This Month</option>
                                <option value="30_days" {{ $filter == '30_days' ? 'selected' : '' }}>Last 30 Days</option>
                                <option value="6_months" {{ $filter == '6_months' ? 'selected' : '' }}>Last 6 Months</option>
                                <option value="1_year" {{ $filter == '1_year' ? 'selected' : '' }}>Last 1 Year</option>
                                <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>All Time</option>
                            </select>
                        </form>
                    </div>

                    <div class="card-body">
                        <canvas id="enquiryChart" height="500"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('enquiryChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
    gradient.addColorStop(1, 'rgba(54, 162, 235, 0.1)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: 'No. of Enquiries',
                data: {!! json_encode($counts) !!},
                backgroundColor: gradient,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                borderRadius: 5,
                hoverBackgroundColor: 'rgba(54, 162, 235, 1)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            },
            plugins: {
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#000',
                    bodyColor: '#000',
                    borderColor: '#ccc',
                    borderWidth: 1,
                    padding: 10
                },
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f1f1'
                    },
                    ticks: {
                        stepSize: 1,
                        color: '#6c757d'
                    }
                }
            }
        }
    });
</script>
@endsection
