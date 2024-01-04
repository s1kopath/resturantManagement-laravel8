@extends('frontend.main')

@section('content')

    {{-- main --}}
    @if (session()->has('success'))

        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <main style="height:550px;" class="row d-flex align-items-center w-100 mb-5  ">
        <div class="col-md-5 offset-md-1 mt-5 mb-5">
            <h1 style="color: #3A4256;"><span style="color: #dd7140;">Treat Your</span> <br /> Self</h1>
            <p class="text-secondary fs-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore eveniet
                necessitatibus et iusto corrupti minima.</p>
            {{-- <button  type="button" class="btn btn-success ">ORDER FOOD</button> --}}
            <a type="button" class="btn btn-success " href="{{ route('foodItemMenu') }}">ORDER FOOD</a>

        </div>
        <div class="col-md-6 mt-4 ">
            <img src="{{ asset('/style/image/pablo-merchan-montes-Orz90t6o0e4-unsplash.jpg') }}" alt=""
                class="img-fluid " />
        </div>

    </main>



    {{-- gallery view --}}
    <section >
    <div class="album py-5  mt-5">
        <div class="container">

            <div class="text-center ">

                <h2 style="color: #3A4256;" class=" mt-5 mb-5"><b>Visit Our Gallery</b></h2>


                <hr />
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-3">

                    @foreach ($gallerys as $data)

                        <div class="col mt-5 ">
                            <div>
                                <img style="height:250px;width:279px;" src="{{ url('/files/photo/' . $data->file) }}"
                                    alt="gallery image">
                                {{-- <div class="card-body">
                                    <p class="card-text">{{ $data->name }}</p>

                                </div> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="text-center mt-5 fs-4">
                <a class="fas fa-arrow-circle-right text-decoration-none " style="color: #3A4256; "
                    href="{{ route('viewMoreGallery') }}"> see more</a>
            </div>

        </div>
        <hr />
    </section>


        {{-- Order section --}}
<section>
        <div class="album py-5 bg-dark mt-5">
            <div class="container">

                <div class="text-center">

                    <h2 style="color: #dd7140;">Order Now </h2>
                    <h5 style="color: #dd7140;" class="mb-5">Nothing brings people together like good food</h5>



                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">

                        @foreach ($foodItems as $data)

                            <div class="col mt-5">
                                <div class="card shadow-sm h-100" style="height:260px;width:310px;">
                                    <img style="height:250px;width:309px;" src="{{ url('/files/photo/' . $data->file) }}"
                                        alt="foodItem image">
                                    <div class="card-body">
                                        <p class="card-text">Food-Name: {{ $data->name }}</p>
                                        <p class="card-text">Food-price: {{ $data->price }}/=</p>
                                        <hr />

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group  ">
                                                @if (auth()->user())
                                                    <a class="btn btn-success fas fa-cart-arrow-down"
                                                        href="{{ route('addToCart', $data->id) }}" x>Add To Cart</a>
                                                @else
                                                    <a class="btn btn-success fas fa-cart-arrow-downs  "
                                                        href="{{ route('login.registration.from') }}" class="">Add To
                                                        Cart</a>

                                                @endif

                                                {{-- <a href="{{route('addToCart',$data->id)}}"  type="button" class="btn btn-success">Add To Cart</a> --}}
                                                {{-- <a href="{{route('product.show',$data->id)}}" class="btn btn-sm btn-warning">View</a> --}}
                                            </div>
                                            <div>
                                                <a class="btn btn-success  far fa-eye"
                                                    href="{{ route('viewFood', $data->id) }}">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-5 fs-4">
                    <a class="fas fa-arrow-circle-right text-decoration-none " style="color: #dd7140;"
                    href="{{route('foodItemMenu')}}">see more</a>
                </div>
            </div>
            </section>

            {{-- staff section --}}

<section>
    <hr />

            <div class="album py-5 bg-light mt-3">

                <div class="container">

                    <div class="text-center">

                        <h2 style="color: #3A4256;">Meet Our </h2>
                        <h3 style="color: #dd7140;" class="mb-3">Community</h3>

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">



                            @foreach ($staffs as $data)

                                <div class="col mt-5 ">
                                    <div class="card shadow-sm h-100 " style="height:250px;width:280px;">
                                        <img style="height:250px;width:279px;"
                                            src="{{ url('/files/photo/' . $data->file) }}" alt="Staff image">
                                        <div class="card-body">
                                            <p class="card-text">Name: {{ $data->name }}</p>
                                            <p class="card-text">Email: {{ $data->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="text-center mt-5 fs-4">
                        <a class="fas fa-arrow-circle-right text-decoration-none" style="color: #3A4256;"
                            href="{{ route('allStaffView') }}">see more</a>
                    </div>
                    <hr />

                </div>

            </div>
</section>
            {{-- review section --}}

            <section>
                <div class="album py-5 bg-dark mt-3">
                    <div class="container">

                        <div class="text-center">

                            <h3 style="color: #dd7140;" class="mb-5 fs-2 fa fa-star">Review</h3>

                            {{-- <div>
                                    <a href="{{ route('allStaffView') }}"> <i class="fas fa-arrow-right"></i> see more</a>
                                </div> --}}

                            <div class="row">



                                @foreach ($review as $data)
                                    <div class=" mt-2 mb-2 col-md-4 d-flex">

                                        <div class="card  " style="max-width:700px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img style="height:250px;width:200px;"
                                                        src="{{ url('/files/photo/' . $data->food_item->file) }}"
                                                        alt="review image">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <p class="card-text">Name:{{ $data->reviewUser->name }}</p>
                                                        <p class=""> Email:{{ $data->reviewUser->email }}</p>
                                                        <p class=""> Food-Name: {{ $data->food_item->name }}</p>
                                                        <p class="card-text">
                                                            <span class="review-stars" style="color: #dd7140;;">

                                                                @if ($data->rate === 1)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @elseif($data->rate === 2)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @elseif($data->rate === 3)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @elseif($data->rate=== 4)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                @elseif($data->rate >= 5)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                @endif
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                <div class="text-center mt-5 fs-4">
                                    <a class="fas fa-arrow-circle-right text-decoration-none" style="color:  #dd7140;"
                                        href="{{ route('allReviewView') }}">see more</a>
                                </div>

                            </div>
                            {{-- <div class="d-flex justify-content-center mt-5 color-green"> {{$review->links()}} </div> --}}

            </section>
<hr/>
        @endsection
