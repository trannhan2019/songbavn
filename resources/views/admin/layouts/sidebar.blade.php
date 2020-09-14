{{-- <!-- Main Sidebar Container --> --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo --> --}}
    <a href="{{ route('trangchu') }}" class="brand-link">
      <img src="admin_asset/images/LOGO.png" alt="SBA Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">SBA</span>
    </a>

    {{--  Sidebar  --}}
    <div class="sidebar">
      {{--  Sidebar user panel (optional) --}}
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block font-weight-bold">QUẢN TRỊ HỆ THỐNG</a>
        </div>
      </div>

      {{-- Sidebar Menu  --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Dashboard --}}
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
              <p>
                Trang tổng quan

              </p>
            </a>
          </li>
          {{--  Quản lý danh mục - Menu  --}}
          <li class="nav-item">
            <a href="{{ route('admin.menu.list') }}" class="nav-link">
              <i class="nav-icon fas fa-th text-warning"></i>
              <p>
                Quản lý danh mục

              </p>
            </a>
          </li>
          {{--  Quản lý người dùng - User  --}}
          <li class="nav-item">
            <a href="{{ route('admin.user.list') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog text-warning"></i>
              <p>
                Quản lý người dùng

              </p>
            </a>
          </li>
          {{--  Quản lý Slide  --}}
          <li class="nav-item">
            <a href="{{ route('admin.slide.list') }}" class="nav-link">
              <i class="nav-icon fas fa-sliders-h text-warning"></i>
              <p>
                Quản lý Slide

              </p>
            </a>
          </li>
          <hr class="border-light bg-white my-2">
          {{--  QUẢN LÝ NỘI DUNG  --}}
          <li class="nav-header pt-2"> QUẢN TRỊ NỘI DUNG </li>
          @php
            $danhmucgoc = App\Menu::whereNull('parent')->with('ChildMenus')->get();
          @endphp
          @foreach ($danhmucgoc->where('status',1)->sortBy('position') as $dm)
          <li class="nav-item {{ count($dm->ChildMenus)>0 ? 'has-treeview': '' }}">
            <a href="{{ 'admin/content/'.$dm->id.'/'.$dm->slug.'.html'}}" class="nav-link">
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
                @if ($child->slug=='ban-dieu-hanh')
                <li class="nav-item">
                  <a href="admin/content/{{ $child->id }}/{{ $child->slug }}.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $child->name }}</p>
                  </a>
                </li>
                @elseif($child->slug=='cac-nha-may')
                <li class="nav-item">
                  <a href="admin/content/{{ $child->id }}/{{ $child->slug }}.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $child->name }}</p>
                  </a>
                </li>
                @elseif($child->slug=='cac-du-an')
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
          {{--  Quản lý bình luận  --}}
          <li class="nav-item">
            <a href="{{ route('admin.comment.list') }}" class="nav-link">
              <i class="nav-icon fas fa-comments text-warning"></i>
              <p>
                Quản lý bình luận
              </p>
            </a>
          </li>
          {{--  Quản lý tình hình sản xuất  --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-warning"></i>
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
                <a href="{{ route('admin.muctieu.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mục tiêu SX</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.sanxuat.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cập nhật THSX</p>
                </a>
              </li>
            </ul>
          </li>

          {{--  THÙNG RÁC  --}}
          <li class="nav-header">NỘI DUNG ĐÃ XÓA</li>
          {{-- Danh mục đã xóa --}}
          <li class="nav-item">
            <a href="{{ route('admin.menu.trash') }}" class="nav-link">
              <i class="fas fa-ban nav-icon"></i>
              <p>Danh mục đã xóa</p>
            </a>
          </li>
          {{-- Người dùng đã xóa --}}
          <li class="nav-item">
            <a href="{{ route('admin.user.trash') }}" class="nav-link">
              <i class="fas fa-user-slash nav-icon"></i>
              <p>Người dùng đã xóa</p>
            </a>
          </li>
          {{-- Bài viết đã xóa --}}
          <li class="nav-item">
            <a href="admin/content/trash" class="nav-link">
              <i class="fas fa-eraser nav-icon"></i>
              <p>Các bài viết đã xóa</p>
            </a>
          </li>
          {{-- Các slide đã xóa --}}
          <li class="nav-item">
            <a href="admin/slide/trash" class="nav-link">
              <i class="fas fa-sliders-h nav-icon"></i>
              <p>Các slide đã xóa</p>
            </a>
          </li>
          {{-- Các bình luận đã xóa --}}
          <li class="nav-item">
            <a href="admin/comment/trash" class="nav-link">
              <i class="fas fa-comment-slash nav-icon"></i>
              <p>Các bình luận đã xóa</p>
            </a>
          </li>
          {{-- Ý kiến nhà đầu tư--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-lightbulb"></i>
              <p> Ý kiến nhà đầu tư <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="admin/content/danh-muc-y-kien-trash.html" class="nav-link">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Danh mục đã xóa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/content/trash-y-kien-tra-loi.html" class="nav-link">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Ý kiến đã xóa</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- tình hình sx --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p> Tình hình sản xuất <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="admin/factory/trash" class="nav-link">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Thông số nhà máy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/muctieu/trash" class="nav-link">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Mục tiêu sản xuất</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/sanxuat/trash" class="nav-link">
                  <i class="fas fa-bullseye nav-icon"></i>
                  <p>Chi tiết sản xuất</p>
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
