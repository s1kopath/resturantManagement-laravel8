@extends('frontend.main')

@section('content')

<div class="container mt-5">
    <div class="text-center">
    <h2>WE APPRECIATE YOUR REVIEW!</h2>
    <h6 >Your review will help us to improve our services</h6>
    <hr/>
    </div>


    <form action={{ Route('submitReview') }} method="post" class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-white">
        @csrf

            <div  class="mb-5"><img src="{{ url('/files/photo/' .$food_review->file)}}" style="width:200px; height:200px;margin-left:200px"></div>


            {{-- <label class="ms-5 " for="">Table Capacity: {{$tables->capacity}}</label> --}}


            <div class="form-group">
                <div class="col-md-12 inputGroupContainer">

                    <div class="input-group">
                        <span class="input-group"><i class="fa fa-user"> User Name </i></span>
                        <input name="name" readonly value="{{ auth()->user()->name }}" placeholder="{{ auth()->user()->name }}" class="form-control mt-2" type="text">
                    </div>


            <div class="input-group mt-3">
                <span class="input-group mt-2"><i class="fa fa-envelope "> Email   </i></span>
                <input name="email" readonly type="email" class="form-control mt-2" placeholder="{{ auth()->user()->email }}">
            </div>


        <div class="input-group mt-3">
            <span class="input-group "><i class="fa fa-envelope "> Food Name</i></span>
            <input type="hidden" value="{{$food_review->id}}" name="food_item_id">
            <input name="name" readonly type="text"  value="{{ $food_review->name }}" class="form-control mt-2">
        </div>

        <div class="pinfo"><i class="fa fa-star checked"> Rate our overall services</i></div>

        <div class="input-group mt-3">
            <span class="input-group-addon"></span>
            <select name="rate" class="form-control" id="rate">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="pinfo mt-3">Write your feedback.</div>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            <textarea name="message" class="form-control" id="review" rows="3"></textarea>

        </div>

        <div class="mt-5 d-flex justify-content-center ">
            <button type="submit" class="btn btn-success btn-lg">Submit</button>
        </div>

        </div>

    </form>
</div>


@endsection
