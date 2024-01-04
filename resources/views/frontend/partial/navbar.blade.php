   <nav class="navbar navbar-expand-lg p-0 mb-5" style=" background-color: rgb(5, 5, 3);">
        <div class="container-fluid">
            <img style="height:30px;weight:33px;" class="ms-3" src="{{asset('/style/image/logo2.jpg')}}" alt="" class="img-fluid " alt=""/>
          <a class="navbar-brand fs-6" style="color:  white;" href="#"> FRESHFOOD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav  d-flex align-items-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link  ms-3" style="color:  white;" aria-current="page" href={{route('homepage')}}>Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  ms-3" style="color:  white;" href="{{route('viewGallery')}}">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  ms-3" style="color:  white;" href="{{route('foodItemMenu')}}">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  ms-3" style="color:  white;"  href="{{route('showTableReservation')}}">Reservation</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="dropdown-toggle text-decoration-none ms-3" style="color: white;" data-bs-toggle="dropdown" role="button" aria-expanded="false">About Us</a>
                      <ul class="dropdown-menu"style= "background-color: rgb(10, 11, 5);">
                        <li><a class="dropdown-item " href="{{route('aboutUs')}}" style="color:  white;">History</a></li>
                        {{-- <li><a class="dropdown-item" href="{{route('writeReview')}}">Review</a></li> --}}
                        <li><a class="dropdown-item" href={{route('viewStaff')}} style="color:  white;">Our Community</a></li>
                      </ul>
                    </li>



                      @if (auth()->user())
                      <li class="nav-item">

                      <a   class="nav-link  ms-3 "style="color:  white;" href="{{route('carts')}}">
                        <i class=" fas fa-cart-arrow-down  d-flex align-items-center "></i> </a>
                        <li class="nav-item">
                            <span class="badge bg-success rounded-pill mb-2">{{$foodItem_count}}</span>
                          </li>
                      @else
                      <a  class="nav-link  ms-3" style="color:  white;" href="{{route('sorryMsg')}}"><i class="fas fa-cart-arrow-down"></i></a>
                      </li>

                      @endif




                    @auth
                    <li class="nav-item">
                        <div class="nav-link" style="color:  white;">

                            <a class="btn btn-success btn-sm"href="{{route('profile',auth()->user()->id)}}">Profile</a>

                            <a class="btn btn-success btn-sm"href="{{route('userLogout')}}">Logout</a>
                        </div>
                      @else
                      <a class="nav-link   "style="color:  white;" href="{{route('login.registration.from')}}">Login</a>
                    </li>
                  @endauth




                </ul>
          </div>
        </div>
      </nav>
