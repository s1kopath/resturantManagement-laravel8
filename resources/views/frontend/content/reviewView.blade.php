@extends('frontend.main')
@section('content')

<section>
    <div class="album py-5 bg-light mt-3">
        <div class="container">

            <div class="text-center">

                <h3 style="color: #0e0d0c;" class="mb-3fs-2 fa fa-star">Review</h3>
                <hr/>

                {{-- <div>
                        <a href="{{ route('allStaffView') }}"> <i class="fas fa-arrow-right"></i> see more</a>
                    </div> --}}

                <div class="row">



                    @foreach ($all_review as $data)
                        <div class=" mt-2 mb-2 col-md-4 d-flex">

                            <div class="card rounded border border-secondary shadow-lg mb-5 bg-white rounded zoom-in"  style="max-width:700px;">
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
                                            <p class=""> Comment: {{ $data->message }}</p>

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
                </div>

            <div class="d-flex justify-content-center mt-5 color-green"> {{$all_review->links()}} </div>

</section>
<hr/>
@endsection
