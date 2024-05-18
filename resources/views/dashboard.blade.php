@extends('layouts.master')
@section('content')
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Donation Statistics</h5>
                        <small class="text-muted">{{$totalDonations}} Donations</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="/dashboard">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">
                            {{ $totalAmount }} Taka
                        </h2>
                            <span>In Total Donation</span>
                        </div>
                    </div>
  
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <th6>Recent Donator</th6>
                        </tr>
                        <hr style="margin-top: 10px; margin-bottom: 10px;">
                        @foreach($stat->sortByDesc('created_at')->take(4) as $donation)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-4">
                                        <h6 class="mb-0">{{ $donation->name }}</h6>
                                        <small class="text-muted">
                                            @if($donation->isadmin == 0)
                                                Regular user
                                            @elseif($donation->isadmin == 1)
                                                Administrator
                                            @elseif($donation->isadmin == 2)
                                                Super Admin
                                            @endif
                                        </small>
                                    </div>
                                    <div class="ms-auto">
                                        <small class="fw-medium">{{ $donation->amount }} Taka</small>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px; margin-bottom: 10px;">
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    </li>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Top Donators</h5>
                        <small class="text-muted">{{ $user }} Total User</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="/dashboard">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                        <h3 class="mb-4">
                            <span>Top Donator</span>
                            <br>
                            {{ $highestDonator }}
                        </h3>
                            <span>{{$highestDonation}} Taka Top Donation by {{ $highestDonator }}</span>
                        </div>
                    </div>
  
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <th6>Other Top Donator</th6>
                        </tr>
                        <hr style="margin-top: 10px; margin-bottom: 10px;">
                        @foreach($stat as $donation)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-4">
                                        <h6 class="mb-0">{{ $donation->name }}</h6>
                                        <small class="text-muted">
                                            @if($donation->isadmin == 0)
                                                Regular user
                                            @elseif($donation->isadmin == 1)
                                                Administrator
                                            @elseif($donation->isadmin == 2)
                                                Super Admin
                                            @endif
                                        </small>
                                    </div>
                                    <div class="ms-auto">
                                        <small class="fw-medium">{{ $donation->amount }} Taka</small>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px; margin-bottom: 10px;">
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    </li>
                </div>
            </div>
        </div>
        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/paypal.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Paypal</small>
                                    <h6 class="mb-0">Send money</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+82.6</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/wallet.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Mac'D</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+270.69</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/chart.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Transfer</small>
                                    <h6 class="mb-0">Refund</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+637.91</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/cc-success.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Credit Card</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-838.71</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/wallet.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Starbucks</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+203.33</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ 'template/assets/img/icons/unicons/cc-warning.png' }}" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Mastercard</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-92.45</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    @endsection
