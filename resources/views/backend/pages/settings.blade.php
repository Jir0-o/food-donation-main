@extends('layouts.master')
@section('content')
<h4 class="py-2 m2-4"><span class="text-muted fw-light">Users Details</span></h4>
<div class="row mt-5">
    <div class="col-12 col-md-12 col-lg-12">
        {{-- Users --}}
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5>Users</h5>
                    </div>
                    @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                    <div class="col-12 col-md-6">
                        <div class="float-end">
                            <!-- Button trigger modal -->
                            <a href="{{ route('create_user') }}" class="btn btn-primary">
                                <i class="bx bx-edit-alt me-1"></i> Create User
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="table-responsive text-nowrap p-3">
            <table id="datatable1" class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Total Donation</th>
            @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                <th>Role</th>
                <th>Registration Date</th>
                <th>Actions</th>
            @endif
        </tr>

    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->donation as $donation)
                        {{ $donation->total_amount }}
                    @endforeach
                </td>
                @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                <td>
                        @if ($user->isadmin == 1)
                            Administrator
                        @elseif ($user->isadmin == 2)
                            Super Admin
                        @else
                            Regular User
                        @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        @if (auth()->user()->id != $user->id)
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('edit_data', ['id' => $user->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('delete_data', ['id' => $user->id]) }}">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </a>
                                </div>
                            </div>
                        @endif
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

<!-- resources/views/users/edit.blade.php -->



@endsection