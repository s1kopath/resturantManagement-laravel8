@extends('frontend.main')

@section('content')
    <div class="container">

        <div class="text-center">
            <h2 style="color: #dd7140;">Reservation </h2>
        </div>

<div class="mt-5 mb-5">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('status'))
<div class="alert alert-danger">
{{ session()->get('status') }}
</div>
@endif
        <form action={{route("searchTable")}} method="GET">

            {{-- @csrf --}}

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class=" row">
                        <div class="col-md-6">
                            <label for="from">Date:</label>
                            <input required name="from_date" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}"type="date" class="form-control">

                        </div>

                        <div class="col-md-5">
                            <label for="to">Time Slot:</label>

                            <select class="form-select form-select-mds " required name="time_id" aria-label="form-select-sm example">
                               <option value="" >Select Time-Slot</option>
                               {{-- @dd($time_slot) --}}
                                @foreach ($time_slot as $data)
                               <option value="{{$data->id}}" >{{$data->name}}({{$data->reservation_time_from}}-{{$data->reservation_time_to}})</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-1 mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

    @if (count($tables) > 0 )
    <div>
        {{-- @dd($searchTime); --}}
        <p > Number of records: {{ count($tables) }}</p>
        <h3></h3>
    </div>
        {{-- @dd($tables) --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5 mb-5">
            @foreach ($tables as $data)
                <div class="col-md-2s">
                    <div class="card shadow-sm h-100" style="height:250px;width:270px;">
                        <img style="height:225px;width:269px;" src="{{ url('/files/photo/' . $data->file) }}"
                            alt="gallery image">
                        <div class="card-body">
                            <p class="card-text">Capacity : {{ $data->capacity }}</p>
                            <p class="card-text">Table Number: {{$data->id}}</p>
                            <div class="btn-group d-flex justify-content-between align-items-center">
                                @if (auth()->user())
                                    <a class="btn btn-success"
                                        href="{{ route('tableReservation', $data->id) }}">Reserve</a>
                                @else
                                    <a class="btn btn-success" href="{{ route('login.registration.from') }}">Reserve</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

  @endforeach
  @else
  <h1 class="text-center">Please Select Valid Time For Reservation</h1>
@endif
</div>

</div>
@endsection
