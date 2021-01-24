<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/product/default-user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Inventory Menu</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class=" far fa-envelope"></i> --}}
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Categories Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/category/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Categories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon far fa-envelope"></i> --}}
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Product Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('product/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Transaction Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaction</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Transaction</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
