@extends('backend.main')

@section('content')


 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New Food-Item</button>

@if (session()->has('error-message'))
    <div class="alert alert-danger">
        {{ session()->get('error-message') }}
    </div>
@endif

@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
{{-- staff Details table --}}
<table class="table mt-5 text-center table-bordered table-striped table-success" style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Picture</th>
        <th scope="col">Food Name</th>
        <th scope="col"  style="width:400px">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach($foodItems as $key=> $request)

        <tr>
            <th>{{$foodItems->firstItem()+$key}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:100px; height:80px;" ></td>
            <td>{{$request->name}}</td>
            <td style="width:400px">{{$request->description}}</td>
            <td>{{$request->price}} /=</td>
{{--
            <td>
                <button type="button" class="btn btn-info text-white">Edit</button>
                <a class="btn btn-danger" href="{{route('foodItemDelete', $request->id)}}"> Delete</a>

            </td> --}}
            <td>
                <div class="dropdown text-center " >
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            @if ($request->status == 'Published')
                                <a class="btn" href="{{ route('foodItemUpdate', ['id' => $request->id, 'status' => 'Unpublished']) }}">Make Unpublished</a>
                            @elseif ( $request->status == 'Unpublished')
                                <a class="btn" href="{{ route('foodItemUpdate', ['id' => $request->id, 'status' => 'Published']) }}">Make Published</a>
                            @else
                                <a class="btn" href="">None</a>
                            @endif
                        </li>

                        <li class="bg-primary text-center "><a class="btn" href="{{route('foodItemEdit', $request['id'])}}">Edit</span></a></li>
                        <li class="bg-info text-center"><a class="btn " href={{route('foodItemDelete', $request['id'])}}>Delete</a></li>




                    </ul>
                </div>


            </td>
        </tr>
        @endforeach
        </tbody>
</table>
<div class="d-flex justify-content-center mt-5 color-green"> {{$foodItems->links()}} </div>








  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Food</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('foodItemCreate')}} enctype="multipart/form-data">


@csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputName">Food Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" required placeholder="Enter Food  Name">

            </div>
            <div class="form-group">
                <label for="exampleInputName">Description</label>
                <input name="description" type="text" class="form-control" id="exampleInputName" required placeholder="Enter description">



            </div>

                </select>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input name="price" type="number" class="form-control" id="exampleInputEmail1" required placeholder="Enter Price">

            </div>



            <div class="form-group">
                <label for="exampleInputRePicture">Upload Picture</label>
                <input name="picture" type="file" class="form-control" id="exampleInputRePicture" required placeholder="">

            </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Add</button>
        </div>

    </form>

      </div>
    </div>
  </div>



@endsection
