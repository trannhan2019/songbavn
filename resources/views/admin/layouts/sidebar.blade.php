{{-- <!-- Main Sidebar Container --> --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo --> --}}
    <a href="index3.html" class="brand-link">
      <img src="admin_asset/images/LOGO.png" alt="SBA Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">SBA</span>
    </a>

    {{-- <!-- Sidebar --> --}}
    <div class="sidebar">
      {{-- <!-- Sidebar user panel (optional) --> --}}
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block font-weight-bold">QUẢN TRỊ HỆ THỐNG</a>
        </div>
      </div>

      {{-- <!-- Sidebar Menu --> --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{--  Quản lý danh mục - Menu  --}}
          <li class="nav-item">
            <a href="{{ route('admin.menu.danhsach') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý danh mục
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  Quản lý người dùng - User  --}}
          <li class="nav-item">
            <a href="{{ route('admin.user.danhsach') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Quản lý người dùng
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      {{-- <!-- /.sidebar-menu --> --}}
    </div>
    {{-- <!-- /.sidebar --> --}}
  </aside>