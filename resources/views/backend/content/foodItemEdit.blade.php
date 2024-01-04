@extends('backend.main')

@section('content')


    <form method="post" action={{route('foodItemEditUpdate',$foodItem['id'])}} enctype="multipart/form-data" class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-white rounded-3">
{{-- @dd($foodItem); --}}

@csrf



            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName">Food Name</label>
                    <input name="name" value="{{$foodItem->name}}" type="text" class="form-control" id="exampleInputName" placeholder="Enter Food  Name">

                </div>
                <div class="form-group">
                    <label for="exampleInputName">Description</label>
                    <input name="description" value="{{$foodItem->description}}" type="text" class="form-control" id="exampleInputName" placeholder="Enter description">



                </div>

                    </select>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="price" type="string" value="{{$foodItem->price}}"   class="form-control" id="exampleInputEmail1" placeholder="Enter Price">

                </div>



        <div class="modal-footer">
          <button type="submit" class="btn btn-primary "style="margin-right:150px;" >Update</button>
        </div>


    </form>

      </div>
    </div>
  </div>



@endsection
