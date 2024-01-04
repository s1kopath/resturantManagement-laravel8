{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />

</head>
<body> --}}
    @extends('frontend.main')

@section('content')


                      <div class="row container text-center ms-5 ">

                        <div class="col-md-12 ms-5 ">

                          {{-- @dd($showOrder); --}}
                          <h1 class="text-center fs-1 mt-5">order info</h1>
                          <div class="mt-4 mb-5">
                            <p class="text-dark">Name:{{auth()->user()->name}} </p>
                            <p class="text-dark">email:{{auth()->user()->email}} </p>
                            <p class="text-dark">Phone:{{auth()->user()->phone}} </p>
                            <p class="text-dark">address:{{auth()->user()->address}} </p>
                          <hr/>
                          </div>
                            <table class="table fs-6 mb-5">
                                <thead >


 <tr >
    <th scope="col">Serial</th>
    <th scope="col">Date</th>
      {{-- <th scope="col">User</th>
    <th scope="col">User Email</th>
    <th scope="col">User Contact No</th> --}}
    <th scope="col" >PaymentStatus</th>
    <th scope="col" >Status</th>
     <th scope="col" >View</th>



                                <tbody class="table-primary">
                                    {{-- @dd($orderViews); --}}

                                @foreach ($orderViews as $key => $order)
                                <td>{{$key+1}}</td>

                                <td>{{$order->created_at->format('d-m-Y')}} </td>
                                 {{-- <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->user->phone}}</td> --}}
                                {{-- <td>{{$order->address}}</td> --}}

                                <td >{{$order->paid_status}}</td>
                                <td>{{$order->status}}</td>



                              <td>
                                <a href="{{route('customerOrderView',$order->id)}}"><i class="fas fa-eye"></i></a>

                                </td>

                                {{-- <td><a href="{{route('writeReview')}}"><i class="fas fa-star-half-alt"></i></a></td> --}}

                                </tr>
                                  @endforeach
                                  </tbody>

                                  </table>
                                 <div class="d-flex justify-content-center mt-5 color-green">  {{ $orderViews->links() }} </div>
                                </div>
{{--
                                  <div class="mt-5">
                                  <a href="{{route('profile',auth()->user()->id)}}"type="button"  class="btn btn-success mx-3">Back</a>

                                  </div> --}}
                              </div>
{{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> --}}

    {{-- <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script> --}}
{{-- </body>
</html> --}}
@endsection
