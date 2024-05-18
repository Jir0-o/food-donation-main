@extends('layouts.master')
@section('content')
<h4 class="py-2 m-4"><span class="text-muted fw-light">Edit User</span></h4>

<div class="row mt-5">
    <div class="col-12">
        {{-- Users --}}
        <div class="card">
            <div class="card-header">
                <h5>Edit User</h5>
            </div>
            <div class="card-body">
             @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input id="name" name="name" value="{{$user->name}}" type="text" required class="form-control" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" name="email" value="{{$user->email}}" type="email" required class="form-control" placeholder="User Email">
                    </div>
                    <div class="mb-3">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="form-control" required>
                    <option value="regular_user" {{ $user->isadmin == 0 ? 'selected' : '' }}>Regular User</option>
                    <option value="administrator" {{ $user->isadmin == 1 ? 'selected' : '' }}>Administrator</option>
                </select>
                </div>
                    <a href="/settings" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
