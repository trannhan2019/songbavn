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
          {{-- Dashboard --}}
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th text-danger"></i>
              <p>
                Trang tổng quan
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  Quản lý danh mục - Menu  --}}
          <li class="nav-item">
            <a href="{{ route('admin.menu.list') }}" class="nav-link">
              <i class="nav-icon fas fa-th text-danger"></i>
              <p>
                Quản lý danh mục
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  Quản lý người dùng - User  --}}
          <li class="nav-item">
            <a href="{{ route('admin.user.list') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog text-danger"></i>
              <p>
                Quản lý người dùng
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          {{--  QUẢN LÝ NỘI DUNG  --}}
          <li class="nav-header pt-2"> <h6 class="mb-0"><strong>QUẢN TRỊ NỘI DUNG</strong></h6></li>
          @foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
          <li class="nav-item {{ count($dm->ChildMenus)>0 ? 'has-treeview': '' }}">
            <a href="{{ $dm->slug =='lien-he' ? 'admin/content/'.$dm->id.'/lien-he.html':'#' }}" class="nav-link">
              <i class=" nav-icon fas fa-bars text-primary"></i>
              <p>
                {{ $dm->name }}
                @if (count($dm->ChildMenus)>0)
                  <i class="fas fa-angle-left right"></i>
                @endif
              </p>
            </a>
            @if (count($dm->ChildMenus)>0)
            <ul class="nav nav-treeview" style="display: none;">
              @foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)
                @if ($child->slug=='co-cau-to-chuc')
                <li class="nav-item">
                  <a href="admin/content/{{ $child->id }}/{{ $child->slug }}.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $child->name }}</p>
                  </a>
                </li>
                @elseif($child->slug=='y-kien-tra-loi')
                <li class="nav-item">
                  <a href="admin/content/{{ $child->id }}/{{ $child->slug }}.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $child->name }}</p>
                  </a>
                </li>
                @else
                <li class="nav-item">
                  <a href="admin/content/{{ $child->id }}/{{ $dm->slug }}.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $child->name }}</p>
                  </a>
                </li>
                @endif
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
          <hr class="border-light bg-white my-2">
          {{--  Quản lý tình hình sản xuất  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-danger"></i>
              <p>
                Tình hình sản xuất
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.factory.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thông số Nhà máy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cập nhật THSX</p>
                </a>
              </li>
            </ul>
          </li>
          {{--  Quản lý Slide  --}}
          <li class="nav-item">
            <a href="{{ route('admin.slide.list') }}" class="nav-link">
              <i class="nav-icon fas fa-sliders-h text-danger"></i>
              <p>
                Quản lý Slide
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <hr class="border-light bg-white my-2">
          {{--  thùng rác--------------  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-trash-alt nav-icon text-warning"></i>
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
                <a href="admin/content/trash" class="nav-link">
                  <i class="fas fa-eraser nav-icon"></i>
                  <p>Các nội dung đã xóa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/slide/trash" class="nav-link">
                  <i class="fas fa-sliders-h nav-icon"></i>
                  <p>Các slide đã xóa</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      {{-- <!-- /.sidebar-menu --> --}}
    </div>
    {{-- <!-- /.sidebar --> --}}
  </aside>