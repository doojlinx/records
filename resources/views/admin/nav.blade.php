  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          @can('iFinance')
                      <li class="nav-item">
            <a href="" class="nav-link" data-toggle="dropdown" href="#">
              Notification for Finance Only
              <i class="far fa-bell">
                 <span class="badge badge-pill badge-primary">{{auth()->user()->unReadNotifications->count()}}</span></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <p style="text-align: center;"><a href="/read">Mark all as read</a></p>
                <p style="text-align: center;">__________________________________________</p>
                @foreach (auth()->user()->unReadnotifications as $notify)
              <p style="text-align: center;"><a href="" style="color:green">{{$notify->data['data']}} <span class="badge badge-info">Unread</span></a></p>
                @endforeach
            </div>
          </li>
          @endcan

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{ route('logout') }}" class="dropdown-item"   onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                   </form>

              </a>
            </div>
          </li>
           
        </ul>
  </nav>
  <!-- /.navbar -->

