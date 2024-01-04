


@extends('frontend.main')

@section('content')

    <div id="printArea">


        <div class="row container text-center  ">



            <div class="col-md-12 ms-5">

                {{-- @dd($showOrder); --}}
                <h1 class="text-center fs-1 mt-5">Reservation Details</h1>
                <div class="mt-4 mb-5">
                    <p class="text-dark">Name:{{ auth()->user()->name }} </p>
                    <p class="text-dark">email:{{ auth()->user()->email }} </p>
                    <p class="text-dark">Phone:{{ auth()->user()->phone }} </p>
                    <p class="text-dark">address:{{ auth()->user()->address }} </p>
                    <hr />

                    <table class="table fs-6">
                        <thead>


                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Image</th>
                                <th scope="col">Reservation Date</th>
                                <th scope="col">Time Slot</th>
                                <th scope="col">Table Number</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cancel</th>
                        <tbody>
                            {{-- @dd($reservationViews); --}}

                            @foreach ($reservationViews as $key => $data)

                                <td>{{ $key + 1 }}</td>
                                <td><img src="{{ url('/files/photo/' .$data->table->file) }}"style="width:70px; height:60px;"></td>
                                <td>{{ $data->reservation_date}} </td>
                                {{-- @dd($data); --}}
                                <td>{{ $data->time_slot_name->name }}({{ $data->time_slot_name->reservation_time_from }}-{{ $data->time_slot_name->reservation_time_to }})
                                </td>
                                <td>{{ $data->tables_id }}</td>
                                <td>{{ $data->message }}</td>
                                <td>{{ $data->status }}</td>

                                {{-- @dd($data->created_at->addHours(7)); --}}
                                <td>
                                    @if ($data->status == 'Requested for cancellation')
                                        <p class="btn btn-outline-primary">Wait for admin to approve your request.</p>
                                    @elseif ($data->created_at->addHours(2) > $now && $data->status != 'cancel')
                                        <a class="btn btn-success text-center text-white "
                                            href="{{ route('reservationCancel.request', $data->id) }}"> Cancel </a>
                                    @elseif ($data->status == 'cancel')
                                        <p claas="btn btn-outline-primary">Request canceled by the Admin.</p>
                                    @endif
                                </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                </div>

            </div>

            </div>
            <div class="d-flex justify-content-center mt-5 ">{{ $reservationViews->links() }}</div>


            <div class="mb-5 d-flex justify-content-center " style="">
                <button type="button" onclick="printDiv()" class="btn btn-lg btn-primary ">Print</button>

                {{-- <a href="{{ route('profile', auth()->user()->id) }}" type="button"
                    class="btn btn-success mx-3">Back</a> --}}
            </div>

@endsection

