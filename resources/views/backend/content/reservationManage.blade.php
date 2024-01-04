@extends('backend.main')

@section('content')

    {{-- @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif --}}


    <table class="table table-bordered mt-5 ">
        <thead>
        <tr class="text-center">
            <th scope="col">serial</th>
            <th scope="col">Table_no</th>
            <th scope="col">Capacity</th>
            <th scope="col">User_name</th>
            <th scope="col">User <br/> Email</th>
            <th scope="col">User Contact No</th>
            <th scope="col">Reservation Date</th>
            <th scope="col">Time_Slot</th>

            <th scope="col"> message</th>
            {{-- <th scope="col">Total</th> --}}
            <th scope="col">Status</th>

            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            {{-- @dd($reservations) --}}


@foreach( $reservations as $key=>$request)

{{-- @dd($request) --}}
            <tr class="text-center">
                <td>{{$reservations->firstItem()+$key}}</td>
                <td>{{$request->tables_id}}</td>
                {{-- @dd($reservations->table) --}}
                <td>{{$request->table->capacity}}</td>
                {{-- <td>{{$request->table->price}}</td> --}}
               {{-- @dd($request->capacity); --}}
                <td>{{$request->user->name}}</td>
                <td>{{$request->user->email}}</td>
                <td>{{$request->user->phone}}</td>

                {{-- <td>{{$request->time_slot_name->name}}</td> </td> --}}
                {{-- {{-- <td>{{$request->reservation_time_from}} </td> --}}
                <td>{{$request->reservation_date}}</td>
                <td>{{$request->time_slot_name->name}}({{$request->time_slot_name->reservation_time_from}}-{{$request->time_slot_name->reservation_time_to}})</td>
                {{-- @dd($request->time_slot_name);
                {{-- <td>{{$request->created_at->format('Y-m-d H:i:s')}}</td> --}}

                <td>{{$request->message}}</td>

               <td  class="text-center">{{$request->status}}</td>

            <td>


                <div class="dropdown ">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                 <li>

                    @if ( $request->status == 'pending')



                    <div class="text-center">
                    <a class="btn btn-primary " href="{{route('reservationConfirm',['id'=>$request->id,'status'=>'cancel'])}}">Cancel</a>
<br/>
                    <a class="btn btn-info mt-2" href="{{route('reservationConfirm',['id'=>$request->id,'status'=>'confirm'])}}">Confirm</a>
                    </div>
                    @else
                    {{-- <div class="text-center">
                    <a class="btn " href="{{route('reservationConfirm',['id'=>$request->id,'status'=>'cancel'])}}">cancel</a>
                    <br/>
                    <a class="btn" href="{{route('reservationConfirm',['id'=>$request->id,'status'=>'confirm'])}}">confirm</a>
                    </div> --}}
                    <a href="{{route('reservationConfirm',['id'=>$request->id,'status'=>'cancel'])}}" class="btn btn-outline-primary">Cancel</a>
                    @endif

          {{-- @endif
          <a class="btn" href="{{route('orderPaid',['id'=>$request->id,'status'=>'paid'])}}">Paid</a>

          <a class="btn" href="{{route('orderPaid',['id'=>$request->id,'status'=>'unpaid'])}}">Cancel</a>
       </li>
          </ul>
          @else
          <a href="" class="btn btn-outline-primary">Order Confirmed</a>
  @endif --}}






             </li>
                    </ul>
                </div>
            </td>



            </tr>
            @endforeach

        </tbody>

    </table>
    <div class="d-flex justify-content-center mt-5 color-green"> {{$reservations->links()}} </div>


@endsection
