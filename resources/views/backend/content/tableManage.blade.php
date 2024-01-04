@extends('backend.main')

@section('content')


 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add New Table</button>



{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">serial</th>
        <th scope="col">Picture</th>
        <th scope="col">Capacity</th>
        {{-- <th scope="col">Status</th> --}}
        {{-- <th scope="col">TimeSlot</th> --}}
        <th scope="col">Table Number</th>
        <th scope="col">View</th>
        <th scope="col">Action</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach($tables as $key=>$request)
     {{-- @dd($request->timeSlot->name); --}}

{{-- @dd($request) --}}
        <tr>
            <th scope="row">{{$tables->firstItem()+$key }}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->capacity}}</td>
            <td>{{$request->id}}</td>

            {{-- <td>{{$request->table_status}}</td> --}}
             <td>{{$request->status}}</td>

            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Visibility
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            @if ($request->status == 'show')
                                <a class="btn" href="{{ route('tableShowHide', ['id' => $request->id, 'status' => 'hide']) }}">Show</a>
                            @elseif ( $request->status == 'hide')
                                <a class="btn" href="{{ route('tableShowHide', ['id' => $request->id, 'status' => 'show']) }}">Hide</a>
                            @else
                                <a class="btn" href="">None</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </td>
            <td>
                <a href={{ route('tableDelete', $request['id'])}}><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach

        </tbody>
</table>
<div class="d-flex justify-content-center mt-5 color-green"> {{$tables->links()}} </div>




  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Table</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('tableCreate')}} enctype="multipart/form-data">


@csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputName">Capacity</label>
                <input name="capacity" type="number" class="form-control" id="exampleInputName" placeholder="Enter capacity">

            </div>
              {{-- <div >
                  <span>Time</span>
              <select class="form-select form-select-mds " name="time_id" aria-label=".form-select-sm example">
                <option selected>Timeslot</option>

                  @foreach ($time_slot as $data )
                  <option value="{{$data->id}}">{{$data->name}}({{$data->reservation_time_from}}-{{$data->reservation_time_to}})</option>


                  @endforeach

              </select>
              </div> --}}

            {{-- <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName">Price</label>
                    <input name="price" type="number" class="form-control" id="exampleInputName" placeholder="Enter price">

                </div> --}}



            <div class="form-group">
                <label for="exampleInputRePicture">Upload Picture</label>
                <input name="picture" type="file" class="form-control" id="exampleInputRePicture" placeholder="">

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
