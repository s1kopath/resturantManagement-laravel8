@extends('frontend.main')

@section('content')
        <div class="container">

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

            <form action="{{route('reservation',$tables->id)}}" method="post"  class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-white">

                 @csrf
                <div class="mb-3 ">
                <input type="hidden" value="{{$tables->id}}" name="tables_id">
              <div class="row">
                  <div class="col-md-8">
                <p>User Name:{{auth()->user()->name}}</p>
                  </div>

                  <div class="col-md-4" >
                <p class=" fs-6" for="">Table Number: {{$tables->id}}</p>
                <p class="fs-6"  for="">Table Capacity: {{$tables->capacity}}</p>
                </div>
            </div>


                <div class="form-group">
                    <label for="">Date:</label>
                    <input required name="date" value="{{$now}}" min="{{$now}}"type="date" class="form-control">
                </div>

                <div class="mt-4">
                    {{-- @dd($tables); --}}

                  <span>Time Slot</span>
                    {{-- <input value="{{$tables->time_id}}" name="time_id">  --}}
              <select class="form-select form-select-mds " name="time_id" aria-label="form-select-sm example">



                   @foreach ($time_slot as $data)


                  <option value="{{$data->id}}" >{{$data->name}}({{$data->reservation_time_from}}-{{$data->reservation_time_to}})</option>

                  @endforeach

              </select>
              </div>


                <div class="form-group mt-4">
                    <label for="">message:</label>
                    <textarea  name="message" id="" class="form-control"></textarea>
                </div>

                <div class="form-group mt-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg ">Submit</button>
                </div>
                {{-- @dd($tables); --}}

            </div>
            </form>
        </div>


@endsection
