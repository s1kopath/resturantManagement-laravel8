{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>






<body> --}}


    @extends('backend.main')

@section('content')

    <div class="page-content container">
        <div class="page-header text-blue-d2">


        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <i class="fas fa-utensils fa-2x text-success-m2 mr-1"></i>
                                <span class="text-default-d3 fs-1"> Fresh Food</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6 mb-5">
                            <div>
                                <span class="text-600 text-110 text-blue align-middle ms-5">Name:{{$orderViews->user->name}}</span>
                                <br/>
                                <span class="text-600 text-110 text-blue align-middle ms-5">Address:{{$orderViews->address}}</span>
                            <br/>
                            <span class="text-600 text-110 text-blue align-middle ms-5">Contact Number:{{$orderViews->user->phone}}</span>
                            <br/>
                            <span class="text-600 text-110 text-blue align-middle ms-5">Email:{{$orderViews->user->email}}</span>


                            </div>

                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                </div>
                                {{-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order ID:</span> #{{$orders->user->id}}</div> --}}

                              <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order ID:</span> #{{$orderViews->id}}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order Date:</span> {{$orderViews->created_at->format('Y-m-d ')}}</div>
                                                                                                                                                                                      {{-- H:i:s --}}

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> Status:<span class="text-600 text-90 ms-1">{{$orderViews->status}}</span></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4 mb-5">
                        <div class="row  text-600 text-white bgc-default-tp1 py-25 bg-primary">
                            <div class="d-none d-sm-block col-1 text-dark">Serial</div>
                            <div class="col-9 col-sm-5 text-dark">Food Item Name</div>
                            <div class="d-none d-sm-block col-4 col-sm-2 text-dark">Qty</div>
                            <div class="d-none d-sm-block col-sm-2 text-dark">Unit Price</div>
                            <div class="col-2 text-dark">Subtotal</div>
                        </div>


                        <div class="text-95 text-secondary-d3 mt-5">

                            @foreach($orderList  as $key=> $order)

                            {{-- @dd($order->food); --}}
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">{{ $key+1 }}</div>
                                    <div class="col-9 col-sm-5">{{ $order->food->name }}</div>
                                    <div class="d-none d-sm-block col-2">{{ $order->quantity }}</div>
                                    <div class="d-none d-sm-block col-2 text-95">{{ $order->food->price }} /=</div>
                                    <div class="col-2 text-secondary-d2">{{ $order->sub_total }} /=</div>
                                </div>
                                <hr />

                                @endforeach
                        </div>

                        <div class="row border-b-2 brc-default-l2"></div>



                        <div class="row ">
                            <div class="col-12 col-sm-8 text-grey-d2 text-95  mt-lg-0">
                            </div>

                            <div class="col-12 col-sm-4 text-grey text-90 order-first order-sm-last mt-5">
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        Total
                                    </div>
                                    <div class="col-5">
                                        <span class="text-120 text-secondary-d1">{{$total}} /=</span>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        Tax (5%)
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{$tax}} /=</span>
                                    </div>
                                </div>
                                <hr />


                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                     Total
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{$grand_total}} /=</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>




                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </body>
</html> --}}
@endsection
