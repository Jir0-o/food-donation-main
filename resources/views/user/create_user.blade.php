@extends('layouts.master')
@section('content')
<h4 class="py-2 m-4"><span class="text-muted fw-light">Create User</span></h4>

<div class="row mt-5">
    <div class="col-12">
        {{-- Users --}}
        <div class="card">
            <div class="card-header">
                <h5>Create User</h5>
            </div>
            <div class="card-body">
                @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                <form action="{{ route('create_user') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" required class="form-control" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" required class="form-control" placeholder="User Email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required class="form-control" placeholder="User Email">
                    </div>
                    <div class="mb-3">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="regular_user">Regular User</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
