@extends('backend.main')

@section('content')


    <!-- Button trigger modal -->


    <button type="button" class="btn btn-primary mt-5 mb-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Time</button>



        @if (session()->has('error-message'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <table class="table my-3 " style="margin-right: 200px;">
        <thead>
            <tr>
                <th scope="col">serial</th>
                <th scope="col">Name</th>
                <th scope="col">Reservation Time From</th>
                <th scope="col">Reservation Time To</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($timeSlot) --}}
            @foreach ($timeSlot as $key => $request)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->reservation_time_from}}</td>
                    <td>{{ $request->reservation_time_to }}</td>
                     <td>
                        <a href={{ route('timeSlotDelete', $request['id']) }}><i class="fas fa-trash-alt"></i></a>
                    </td>
                    </ul>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Time</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action={{ route('timeSlotCreate') }} enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputName"> Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputName"
                                    placeholder="Enter Time-Slot Name">

                                <div class="form-group">
                                    <label for="">From Time:</label>
                                    <input required name="from_time" type="time" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">To Time:</label>
                                    <input required name="to_time" type="time" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Add</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
