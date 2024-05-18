@extends('layouts.master')
@section('content')
<div class="container">
    <h4 class="py-2 m-4"><span class="text-muted fw-light"></span></h4>

    <b class="row mt-5">
    <div class="col-12 col-md-12 col-lg-4">
        <button type="button" class="btn btn-primary" disabled>Total Donation Amount: ${{ $totaldonation }}</button>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
        <button type="button" class="btn btn-primary" disabled>Total Withdraw Amount: ${{ $totalwithdraw }}</button>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
        <button type="button" class="btn btn-primary" disabled>Total Amount ${{ $total }}</button>
    </div>
        <div class="col-12 col-md-12 col-lg-12">
            {{-- Users --}}
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h5>Withdraw</h5>
                        </div>
                        <div class="col-12 col-md-6">
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap p-3">
                    <form action="withdraw" method="POST">
                        @csrf
                        <div class="mb-3">

                            <label for="donationOption" class="form-label">Select Criteria</label>
                            <select id="donationOption" name="criteria" class="form-select">
                                <option>Withdraw</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection