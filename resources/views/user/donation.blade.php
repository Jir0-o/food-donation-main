@extends('layouts.master')
@section('content')
    <h4 class="py-2 m2-4"><span class="text-muted fw-light">User Donations</span></h4>

    <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-12">
            {{-- Users --}}
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h5>Users</h5>
                        </div>
                        <div class="col-12 col-md-6">
 
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap p-3">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Donation Criteria</th>
                                <th>Amount</th>
                                @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($donation as $donations)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $donations->users->name }}</td>
                                    <td>{{ $donations->users->email }}</td>
                                    <td>
                                        {{ $donations->criteria }}
                                    </td>
                                    <td>{{ $donations->amount }}</td>
                                    @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('edit_donation', ['id' => $donations->id]) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ route('delete_donation', ['id' => $donations->id]) }}">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Permissions -->
        </div>
    </div>
@endsection
