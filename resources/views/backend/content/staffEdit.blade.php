@extends('backend.main')

@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
@endif

        <form method="post" action={{route('staffUpdate',$staff->id)}} enctype="multipart/form-data" class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-white rounded-3">


@csrf
        <div class="modal-body">
            <div class="col-md-12  ">
            <div class="form-group ">
                <label for="exampleInputName">Name</label>
                <input name="name" required type="text" value="{{$staff->name}}"
                class="form-control" id="exampleInputName" placeholder="Enter Staff Name" >

            </div>


            <div class="form-group">
                <label for="exampleInputName"> Staff Working position</label>
                <select class="form-select mb-3" type="text" name="workingArea">
                    <option>Select Staff Working position</option>
                    <option >Chefs</option>
                    <option >Server</option>
                    <option >Genarel Manager</option>

            </select>
        </div>

                </select>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" required type="email" value="{{$staff->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Staff Email Address">

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" required type="text" value="{{$staff->contact}}" class="form-control" id="exampleInputPhone" placeholder="Enter Staff Phone Number">

            </div>

        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input name="address" required type="text" value="{{$staff->address}}"class="form-control" id="exampleInputAddress" placeholder="Enter staff Address">

        </div>


        <div class="modal-footer mt-3" style="margin-left:600px;">
          <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Update</button>
        </div>

    </div>
    </form>




@endsection
