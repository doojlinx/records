  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Returns Market Investment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block" style="text-transform: uppercase;">Welcome <strong>{{ Auth::user()->name }}</strong> </a><br>
          @can('isAdmin')
          <h4 style="font-size: 15px; color:white;">You have super admin access</h4>
          @elsecan('isFinance')
          <h4 style="font-size: 15px; color:white;">Accounting access</h4>
          @else
          <h4 style="font-size: 15px; color:white;">HOP/Account Manager access</h4>
          @endcan
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/file-upload" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Form Upload <span class="badge badge-pill badge-success">{{\App\File::count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/create" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Investment <span class="badge badge-pill badge-success">{{\App\Investment::count()}}</span>
              </p>
            </a>
          </li>
          @can('isAdmin')
          <li class="nav-item">
            <a href="/investment-plan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Investment Plan <span class="badge badge-pill badge-success">{{\App\Iplan::count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investment-duration" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Investment Duration <span class="badge badge-pill badge-success">{{\App\Iduration::count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/investment-status" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Investment Status <span class="badge badge-pill badge-success">{{\App\Istatus::count()}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              All Users <span class="badge badge-pill badge-success">{{\App\User::count()}}</span>
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="/branch" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              All Branches <span class="badge badge-pill badge-success">{{\App\Branch::count()}}</span>
              </p>
            </a>
          </li>     
          @endcan
          @can('isFinance')
          <li class="nav-item">
            <a href="/export" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Export Data To Excel
              </p>
            </a>
          </li>
          @endcan
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>