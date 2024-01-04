<nav class="navbar navbar-light bg-dark d-flex flex-row-reverse me-3">
    {{-- <form class="form-inline"> --}}
        <ul class="navbar-nav px-3">
     {{-- <a href={{route('signIn')}} class="btn btn-primary">Sign In</a> --}}
     <li class="nav-item text-nowrap">
        @auth()
            <span style="color:white;" data-feather="user"></span>
            <span style="color:white; margin-right: 30px;">  {{ auth()->user()->name }}</span>

            <a class="btn btn-primary" href="{{ route('admin.logout') }}"> Logout</a>

        @else
            <a class="btn btn-success"  href="{{ route('admin.login') }}">Login</a>

        @endauth

</li>
</ul>
  </nav>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 w-18   d-md-block bg-dark sidebar collapse"style="height:800px" >
    <div class="position-sticky pt-3 ">
      <ul class="nav flex-column">

        <li class="nav-item mt-5">
              <a class="nav-link active" aria-current="page"href="{{route('dashboard')}}">
             <i class="fas fa-chart-line"> Dashboard</i>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('gallery')}}">
                <i class="fas fa-image"> Manage Gallery</i>
            </a>
          </li>

        <li class="nav-item">
          <a class="nav-link" href={{route('staff')}}>
            <i class="fas fa-user-clock"> Manage Staff</i>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href={{route('foodItem')}}>
            <i class="fas fa-hamburger"> Manage Food Item</i>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href={{route('timeSlot')}}>
                <i class="fas fa-clock"> Manage Timeslot</i>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href={{route('table')}}>
                <i class="fas fa-table"> Manage Table</i>

            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{route('showReservation')}}">
                <i class="fas fa-calendar-week"> Manage Reservation</i>

            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="{{route('adminOrder')}}">
                <i class="far fa-credit-card"> Manage Order</i>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('orderReport')}}">
              <span ></span>
              Order list
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('reservationReport')}}">
              <span ></span>
              Manage Record
            </a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-blue " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">  <i class="fas fa-chart-bar"> Report</i></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('reservationReport')}}"><b>Reservation Report</b></a></li>
              <li><a class="nav-link" href="{{route('orderReport')}}"><b>Order Report</b></a></li>

            </ul>
          </li>
</li>
      </ul>
    </div>
      </nav>

