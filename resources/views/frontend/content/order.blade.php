 @extends('frontend.main')
 @section('content')


    <div class="row " >
        <div class="col-md-5 order-md-2 mb-3 mt-5 ">
            <h4 class="text-center">
                <span>Your Food Item</span>
            </h4>

            <table class="mt-5 table table-bordered table-striped table-success text-center ">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Image</th>
                        <th scope="col">Food Item Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col"> Price</th>
                    </tr>
                </thead>

                @foreach ($carts as $key => $cart)

                    <tbody>
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ url('/files/photo/' . $cart->foodItem->file) }}"
                                    style="width:80px; height:80px;"></td>
                            <td>{{ $cart->foodItem->name }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->foodItem->price }} /=</td>
                @endforeach
                <hr />
                </tr>
                </tbody>
            </table>

            <hr />
            <div class="text-center mt-5 fs-5">
                <div class="mt-2 ">
                    <label>Subtotal</label>
                    <span class="ml-4">: {{ $sub_total }} /=</span>
                </div>
                <div class="border-bottom">
                    <label>Tax (5%)</label>
                    <span class="ml-5">: {{ $tax }} /=</span>
                </div>

                <div class="totals-item totals-item-total">
                    <label>Grand Total:</label>
                    <span class="" id="cart-total"> {{ $grandtotal }} /=</span>
                </div>


            </div>



        </div>
        <div class="col-md-7 order-md-1 ">
            <h4 class="text-center mt-4 fs-3" style="color: #dd7140;">Confirmation </h4>


            <div class="album py-5 ">
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

            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

            <form action={{ route('orderConfirm') }} method="post"
                class="needs-validation container  w-75 p-5 border shadow p-3 mb-5 bg-white rounded-3"  >
                @csrf
                <div class="row">
                <div class="text-center fs-5">
                    <p><b>Bkash Number: 01632193844</b></p>
                    <p><b>Rocket Number: 01632193784</b></p>

                </div>
                <hr/>

                    <div class=" mb-3">
                        <label for="firstName"><b>Name</b></label>
                        <input type="text" readonly name="name" class="form-control" id="firstName" placeholder=""
                            value="{{ auth()->user()->name }}" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>




                <div class="mb-3">
                    <label for="email"><b>Email</b></label>
                    <input type="email" readonly value="{{ auth()->user()->email }}" name="email"
                        class="form-control" id="email" placeholder="">
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="mb-3">
                    <label for="address"><b>Address (If you are in "Fresh Food" then Simply put n/a) </b></label>
                    <input type="text" name="address" value="" class="form-control"
                        id="address" placeholder="Enter Your Address For delivery" required>
                    <div class="invalid-feedback">

                    </div>

                </div>
                    <div class="row d-flex my-2 ml-2">
                        <div class="col-md-6">
                            <input type="checkbox" name="payment_method" value="bkash">
                            <label for="vehicle1"> <img
                                    src="https://media-exp1.licdn.com/dms/image/C510BAQFYQ12drExNfw/company-logo_200_200/0/1567518887113?e=2159024400&v=beta&t=NqOeHA9iax5LN_y6bQmgZx3a2020WUDr_x6JR1rFPIs"
                                    style="width:50px; height:50px;" alt="">Bkash</label><br>
                        </div>

                        <div class="col-md-6">
                            <input type="checkbox" name="payment_method" value="rocket">
                            <label for="vehicle2"> <img
                                    src="https://media-exp1.licdn.com/dms/image/C510BAQECvetZN5XgCg/company-logo_200_200/0/1519903960228?e=2159024400&v=beta&t=Cu6k6pul90PHjkNEV6Snx7HXi5OhYe1TF_jKxHSdBjc"
                                    style="width:50px; height:50px;" alt="">Rocket</label><br>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="payment-widget">
                        <!-- Credit Card Payment -->
                        <div class="payment-list">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group card-label">
                                        <label for="card_name"><b>Transaction-ID</b></label>
                                        <input class="form-control" placeholder="Enter Your Tranasaction-ID"  name="t_id" type="number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group card-label">
                                        <label for="expiry_month"><b>Amount</b> </label>
                                        <input class="form-control"  readonly name="payment_amount" id="expiry_month"
                                            value="{{ $grandtotal }} Tk" >
                                    </div>
                                </div>

                                <div class="col-md-8 ms-5 mt-3 text-center">
                                    <div class="form-group card-label ms-5 ">
                                        <label for="expiry_month"><b>Phone</b></label>
                                        <input class="form-control " placeholder="Enter Your Payment Number" name="t_phone" id="expiry_month" value=""
                                            type="tel" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>






                </div>
                {{-- <h4 class="mb-3 text-center">Payment</h4> --}}



                <div class="mt-5 mb-5 text-center">
                    <button class="btn btn-success " type="submit">Order Confirm</button>
                </div>


        </div>


        </form>
    </div>

    </div>

    </div>
    </div>
    </div>

    </div>

    </div>


@endsection
