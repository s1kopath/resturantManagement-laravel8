@extends('frontend.main')

@section('content')

    <div class="album py-5  mt-5">
        <div class="container">
            <div class="text-center">
                <h2 style="color: #3A4256;">Gallery </h2>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-5">


                @foreach ($gallerys as $data)

                    <div class="col mt-5">
                        <div class="card shadow-sm h-100" style="height:250px;width:270px;">
                            <img style="height:250px;width:269px;" src="{{ url('/files/photo/' . $data->file) }}"
                                alt="gallery image">
                            {{-- <div class="card-body">
                                {{-- <p class="card-text">{{ $data->name }}</p> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        {{-- @dd($gallerys) --}}


    </div>




@endsection
