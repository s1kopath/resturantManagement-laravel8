@extends('backend.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-4 my-3">
            <div class="card bg-secondary text-white shadow" style="width: 20rem;height:10rem;">
                <div class="card-body">
                    <h5 class="text-center"> <small>Total Order</small></h5>
                    <h1 class="text-center">{{ $totalOrder }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-3">
            <div class="card bg-primary text-white shadow" style="width: 20rem; height:10rem">
                <div class="card-body">
                    <h5 class="text-center"> <small>Total Food-Item</small> </h5>
                    <h1 class="text-center">{{ $totalFoodItem }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-3">
            <div class="card bg-secondary text-white shadow" style="width: 20rem;height:10rem;">
                <div class="card-body">
                    <h5 class="text-center"> <small>Total Reservation</small> </h5>
                    <h1 class="text-center">{{ $totalReservation }} </h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-3">
            <div class="card bg-primary text-white shadow" style="width: 20rem;height:10rem;">
                <div class="card-body">
                    <h5 class="text-center"> <small>Total Staff</small> </h5>
                    <h1 class="text-center">{{ $totalStaff }} </h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-3">
            <div class="card bg-secondary text-white shadow" style="width: 20rem;height:10rem;">
                <div class="card-body">
                    <h5 class="text-center"> <small>Total Sale</small> </h5>
                    <h1 class="text-center">{{ $totalSale }} BDT</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-3">
            <div class="card bg-primary text-white shadow" style="width: 20rem;height:10rem;">
                <div class="card-body">
                    <h5 class="text-center"> <small>Today's Sale</small> </h5>
                    <h1 class="text-center">{{ $todaySale }} BDT</h1>
                </div>
            </div>
        </div>

    </div>
@endsection
