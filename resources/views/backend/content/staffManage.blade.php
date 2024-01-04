@extends('backend.main')

@section('content')

<div>
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-5 mb-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Register New Staff</button>



{{-- Employee Details table --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
@endif

<table class="table text-center my-3 " style="margin-right: 200px;">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Staff Working position</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>
        <th scope="col">Edit/Delete</th>
      </tr>
    </thead>
    <tbody>
    </div>
     @foreach($staffs as $key=> $request)


            <th scope="row">{{$staffs->firstItem()+$key }}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->name}}</td>
            <td>{{$request->workingArea}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->contact}}</td>
            <td>{{$request->address}}</td>

            {{-- <td>
                <button type="button" class="btn btn-info text-white">Edit</button>
                <a class="btn btn-danger" href="{{route('staffDelete', $request->id)}}"> Delete</a>

            </td> --}}

            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="bg-primary text-center"><a class="btn"  href="{{route('staffEdit', $request->id)}}">Edit</span></a></li>
                        <li class="bg-light text-center"><a class="btn" href={{ route('staffDelete', $request['id']) }}>Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5 color-green"> {{$staffs->links()}} </div>



  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">


        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Staff Register</h5>


          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('staffCreate')}} enctype="multipart/form-data">


        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input name="name" required type="text" class="form-control" id="exampleInputName" placeholder="Enter Staff Name">
            </div>



          <div class="form-group">
            <label for="exampleInputName"> Staff Working position</label>
            <select class="form-select mb-3" type="text" name="workingArea">
                <option>Select Staff Working position</option>
                <option >Chefs</option>
                <option >Waiter</option>
                <option >Genarel Manager</option>
            </select>
        </div>

                </select>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" required type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Staff Email Address">

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" required type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Staff Phone Number">

            </div>

        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input name="address" required type="text" class="form-control" id="exampleInputAddress" placeholder="Enter staff Address">

        </div>

            <div class="form-group">
                <label for="exampleInputRePicture">Upload Picture</label>
                <input name="picture" required type="file" class="form-control" id="exampleInputRePicture" placeholder="Enter Employee Password Again">

            </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Register</button>
        </div>

    </form>

      </div>
    </div>
  </div>



@endsection
