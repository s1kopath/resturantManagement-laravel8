@extends('frontend.main')

@section('content')
    @if (session()->has('success'))

        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="album py-5 bg-light mt-5">
        <div class="container">
            <div class="text-center">

                <h2 style="color: #dd7140;">Order Now </h2>
                <h5 style="color: #3A4256;" class="mb-5">Feel the taste</h5>


                <table class="table table-bordered " style="margin-right: 200px;">
                    <thead>
                        <tr>
                            <th scope="col">serial</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Food Name</th>
                            <th scope="col"style="width:200px">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Add To Crat</th>
                            <th scope="col">Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($foodItems as $key => $data)

                            <tr>
                                <th>{{$foodItems->firstItem()+$key}}</th>
                                <td><img src="{{ url('/files/photo/' . $data->file) }}" alt="foodItem image"
                                        style="width:150px; height:140px;"></td>
                                <td>{{ $data->name }}</td>
                                <td style="width:200px">{{ $data->description }}</td>
                                <td>{{ $data->price }} /=</td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group ">

                                            @if (auth()->user())
                                                <a class="btn btn-success " href="{{ route('addToCart', $data->id) }}">Add To
                                                    Cart</a>
                                            @else
                                                <a class="btn btn-success "
                                                    href="{{ route('login.registration.from') }}">Add To Cart</a>

                                            @endif
                                </td>


                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group ms-5">

                                            @if (auth()->user())
                                                <a href="{{ route('writeReview', $data->id) }}"><i style="color: #dd7140;"
                                                        class="fas fa-star"></i></a>
                                            @else
                                                <a href="{{ route('login.registration.from') }}"><i style="color: #dd7140;"
                                                        class="fas fa-star"></i></a>

                                            @endif
                                </td>

                                {{-- <td><a href="{{route('writeReview')}}"><i class="fas fa-star-half-alt"></i></a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5 color-green"> {{ $foodItems->links() }} </div>
            @endsection
