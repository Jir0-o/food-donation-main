@extends('layouts.master')
@section('content')
<h4 class="py-2 m-4"><span class="text-muted fw-light">Edit Donation</span></h4>

<div class="row mt-5">
    <div class="col-12">
        {{-- Users --}}
        <div class="card">
            <div class="card-header">
                <h5>Edit Donations</h5>
            </div>
            <div class="card-body">
             @if (auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2)
             <form action="{{ route('users.donation', $donation->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <label for="criteria">Donation Criteria</label>
                    <select id="criteria" name="criteria" class="form-control" required>
                        <option value="Food" {{ $donation->criteria == 'Food' ? 'selected' : '' }}>Food</option>
                        <option value="Water" {{ $donation->criteria == 'Water' ? 'selected' : '' }}>Water</option>
                    </select>
                    <div class="mb-3">
                        <label for="amount">Donation Amount</label>
                        <input id="amount" name="amount" value="{{ $donation->amount }}" type="text" required class="form-control" placeholder="Donation Amount">
                    </div>
                    <a href="/donations" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Donation</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
