{{-- <!-- Main Sidebar Container --> --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo --> --}}
    <a href="{{ route('trangchu') }}" class="brand-link">
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
            <a href="{{ route('admin.menu.list') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý danh mục
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  Quản lý người dùng - User  --}}
          <li class="nav-item">
            <a href="{{ route('admin.user.list') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Quản lý người dùng
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  QUẢN LÝ NỘI DUNG  --}}
          <li class="nav-header pt-2"> <h6 class="mb-0">QUẢN TRỊ NỘI DUNG</h6></li>
          {{--  {{dd($menus->where('slug','lien-he')->ChildMenus->get)}}  --}}
          @foreach ($menus->where('status',1)->sortBy('position') as $menu)
          <li class="nav-item {{ count($menu->ChildMenus)>0 ? 'has-treeview': '' }}">
            <a href="{{ $menu->slug =='lien-he' ? 'admin/content/'.$menu->id.'/lien-he.html':'#' }}" class="nav-link">
              <i class=" nav-icon fas fa-bars"></i>
              <p>
                {{ $menu->name }}
                @if (count($menu->ChildMenus)>0)
                  <i class="fas fa-angle-left right"></i>
                @endif
              </p>
            </a>
            @if ($menu->ChildMenus)
            <ul class="nav nav-treeview" style="display: none;">
              @foreach ($menu->ChildMenus->where('status',1)->sortBy('position') as $child)
              <li class="nav-item">
                <a href="{{ $child->slug=='y-kien-tra-loi' ? 'admin/content/'.$child->id.'/y-kien-tra-loi.html': 'admin/content/'.$child->id.'/'.$menu->slug.'.html'}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $child->name }}</p>
                </a>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
          <hr class="border-light bg-white my-2">
          {{--  thùng rác--------------  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="far fa-trash-alt nav-icon"></i>
              <p>
                THÙNG RÁC
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.user.trash') }}" class="nav-link">
                  <i class="fas fa-user-slash nav-icon"></i>
                  <p>Người dùng đã xóa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header"><i class="far fa-trash-alt"></i> THÙNG RÁC</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
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