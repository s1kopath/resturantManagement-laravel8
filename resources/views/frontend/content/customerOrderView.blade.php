{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresh Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> --}}
    @extends('frontend.main')

    @section('content')

        <div class="container text-center">
              {{-- @dd($showOrder); --}}
              <div id="printArea">
              <h1 class="text-center fs-1 mt-5">Order Details</h1>
              <div class="row">

              <div class=" card col-md-4 mt-4 mb-5 fs-5 text-center">
                <p class="text-dark"><b>Order id:{{ $orderViews->id}}</b></p>
                <p class="text-dark"> <b>Order Date:</span> {{$orderViews->created_at->format('Y-m-d ')}}</b></p>
                <p class="text-dark mt-2 "><i class="fas fa-user">Name:</i>{{auth()->user()->name}} </p>
                <p class="text-dark"><i class="fas fa-envelope-open"> Email:</i>{{auth()->user()->email}} </p>
                <p class="text-dark"><i class="fas fa-phone-alt"> Phone :</i>{{auth()->user()->phone}} </p>
                <p class="text-dark"><i class="fas fa-address-card">Address:</i>{{auth()->user()->address}} </p>
                <p class="text-dark"><i class="fas fa-money-bill">Payment:</i>{{ $orderViews->payment_method}}</p>
                <p class="text-dark"><b>Status :</b>{{ $orderViews->status}}</p>

                {{-- <p class="text-dark">Payment :{{ $orderViews->paid_status}}</p> --}}
            </div>
            <div class="col-md-8">
        <table class="table table-bordered table-success ">
            <thead>
              <tr>
                <th scope="col">Serial</th>
                <th scope="col">Image</th>
                <th scope="col">Food Item Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Tax</th>
                <th scope="col">Grand Total</th>
              </tr>
            </thead>
            @foreach($orderList  as $key=> $order)
    <tbody>
      <tr>
        <th>{{$key+1}}</th>
        <td ><img src="{{url('/files/photo/'.$order->food->file)}}" style="width:80px; height:80px;" ></td>
        <td>{{ $order->food->name }}</td>
        <td>{{ $order->quantity }}</td>
        <td>{{ $order->food->price }}/=</td>
        <td>{{ $order->sub_total }}/=</td>
        <td>{{ $tax}}/=</td>
        <td>{{ $grand_total}}/=</td>
       @endforeach
     <hr/>
    </tr>
    </tbody>
</table>
</div>
</div>

 </div>
 <div class="mb-5">
    <button type="button" onclick="printDiv()" class="btn btn-success btn-lg">Print</button>
    {{-- <a href="{{route('userProfile',auth()->user()->id)}}"type="button"  class="btn btn-success mx-3">Back</a> --}}

</div>

            </div>

            {{-- <script type="text/javascript">
                function printDiv() {
                    var printContents = document.getElementById("printArea").innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }

            </script>


         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</body>



</html>  --}}
@endsection
