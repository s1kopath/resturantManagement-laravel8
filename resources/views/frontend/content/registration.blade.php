@extends('frontend.main')
@section('content')


<div class="row" style="padding: 115px;">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif


        <h1 class="text-center">Registration here</h1>

        <form action="{{route('registration')}}" method="post" class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-white rounded-3">
             @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input required type="text" class="form-control" id="name" name="address">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Phone Number</label>
                <input required type="string" class="form-control" id="name" name="phone">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-link ms-5" href={{route('goUserLogin')}}>Login</a>

        </form>
    </div>
</div>



@endsection
