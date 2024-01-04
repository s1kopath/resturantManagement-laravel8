@extends('backend.main')

@section('content')

    {{-- @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif --}}


    <table class="table table-bordered mt-5 text-center">
        <thead >
        <tr >
            <th scope="col">Serial</th>
            <th scope="col">Date</th>
            <th scope="col">User Email</th>
            {{-- <th scope="col">Address</th> --}}
            <th scope="col">Paid Amount</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Transaction Id</th>
            <th scope="col">Payment Contact No</th>
            <th scope="col" >PaymentStatus</th>
            <th scope="col">Payment</b>Action</th>
            <th scope="col">Status</th>
            <th scope="col">View</th>

        </thead>
        <tbody>
{{-- @dd($orders); --}}
@foreach( $orders as $key=>$request)

{{-- @dd($request); --}}
            <tr>
              <td>{{$orders->firstItem()+$key }}</td>
              <td>{{ $request->created_at->format('d-m-Y') }} </td>
              <td>{{$request->user->email}}</td>
              <td>{{$request->payment_amount}}</td>
              <td>{{$request->payment_method}}</td>
              <td>{{$request->t_id}}</td>
              <td>{{$request->t_phone}}</td>
              {{-- <td>{{$request->address}}</td> --}}

              <td class="text-center">{{$request->paid_status}}</td>

              <td>
                    <div class="dropdown ">

                        @if ( $request->status == 'pending')
                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                     <li class="text-center">

                        <a class="btn btn-primary" href="{{route('orderPaid',['id'=>$request->id,'status'=>'paid'])}}">Paid</a>
                        <br/>
                        <br/>
                        <a class="btn btn-info" href="{{route('orderPaid',['id'=>$request->id,'status'=>'unpaid'])}}">Cancel</a>
                     </li>
                        </ul>
                        @else
                        <a href="" class="btn btn-outline-primary">Order Confirmed</a>
                @endif
                    </div>
            </td>


              <td>{{$request->status}}</td>


                     <td>
                         <a href="{{route('adminOrderView',$request->id)}}"><i class="fas fa-eye"></i>
                            {{-- < href=""><i class="far fa-edit"></i> --}}


                         </a>

                     </td>

        </tr>
@endforeach

        </tbody>

    </table>

    <div class="d-flex justify-content-center mt-5 color-green"> {{$orders->links()}} </div>


@endsection
