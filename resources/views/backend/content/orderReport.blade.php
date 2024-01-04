@extends('backend.main')

@section('content')

    <div class="row container text-center ">

        <div class="col-md-12 mt-5 ">
            <form action={{ route('orderReport') }} method="GET">

                {{-- @csrf --}}

                <div class="row">
                    <div class="col-md-8">
                        <div class=" row">
                            <div class="col-md-6">
                                <label for="from">Date From:</label>
                                <input id="from" type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                    max="{{ date('Y-m-d') }}" name="from_date">
                            </div>

                            <div class="col-md-6">
                                <label for="to">Date To:</label>
                                <input id="to" type="date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}"
                                    class="form-control" name="to_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" onclick="printDiv()" class="btn btn-success mx-3">Print</button>
                    </div>
                </div>
            </form>



            @if (session()->has('error-message'))
                <div class="alert alert-danger d-flex justify-content-between mt-5">
                    {{ session()->get('error-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="printArea">



                @if (isset($fromDate) && $fromDate != '1970-01-01')
                    <div class="container">
                        <h6>Reservation report from: {{ date('M-d, Y', strtotime($fromDate)) }} to
                            {{ date('M-d, Y', strtotime($toDate)) }} </h6>
                        <h6>Number of records: {{ count($orderList) }}</h6>
                    </div>
                @endif


                <table class="table table-bordered table-striped table-success mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Food Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            {{-- <th scope="col">Status</th> --}}


                        </tr>
                    </thead>

                    <tbody>

                        {{-- @dd($orderViews->count()); --}}
                        @if ($orderViews->count() > 0)


                            {{-- @dd($orderList); --}}

                            @foreach ($orderList as $key => $order)

                                {{-- @dd($order->orderForDetails->status); --}}
                                @if ($order->orderForDetails->status == 'confirm')


                                    <tr>
                                        <th scope>{{ $key + 1 }}</th>
                                        <td>{{ $order->created_at->format('d-m-Y') }} </td>
                                        <td>{{ $order->orderForDetails->user->name }} </td>
                                        <td>{{ $order->orderForDetails->user->email }} </td>
                                        <td>{{ $order->food->name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->sub_total }}/=</td>
                                        {{-- <td>{{ $order->orderForDetails->status}}</td> --}}
                                    </tr>

                                @endif
                            @endforeach


                        @else

                            <td>
                                <h4>No Data Found!</h4>
                            </td>


                        @endif
                    </tbody>
                </table>


            </div>

            <script type="text/javascript">
                function printDiv() {
                    var printContents = document.getElementById("printArea").innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }

            </script>

        @endsection
