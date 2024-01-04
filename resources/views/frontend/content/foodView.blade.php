 @extends('frontend.main')
@section('content')

    <div class="row container">

            <div class=" mt-3 mb-5 d-flex justify-content-center" style="margin-left:150px;">
                <div class="card shadow-sm h-100" style="height:500px;width:500px;">
                    <img style="height:400px;width:499.9px;" src="{{ url('/files/photo/' . $viewFood->file) }}"
                        alt="foodItem image">
                    <div class="card-body text-center">
                        <p class="card-text">Name: {{ $viewFood->name }}</p>
                        <p class="card-text">Price:  {{ $viewFood->price }}/=</p>
                        <p class="card-text">Description:  {{ $viewFood->description }}</p>

                        <div class="d-flex justify-content-center mb-5">
                            <div class="btn-group">

                                @if (auth()->user())
                                    <a class="btn btn-success"
                                        href="{{ route('addToCart', $viewFood->id) }}">Add To Cart</a>
                                @else
                                    <a class="btn btn-success"
                                        href="{{ route('login.registration.from') }}">Add To Cart</a>

                                @endif

                            </div>


@endsection

