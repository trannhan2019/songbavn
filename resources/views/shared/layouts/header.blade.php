<div class="header p-1">
    <div class="header_login">
        <div class="container">
			<div class="row text-white">
				
				<div class="col text-right">
					@if (Auth::check())
					<button type="button" class="btn btn-outline-light btn-sm dropdown-toggle" data-toggle="dropdown">
						{{ Auth::user()->fullname }}
					</button>
					<div class="dropdown-menu">
						@if (Auth::user()->role ==1)
						<a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị hệ thống</a>
						@endif
						@if (Auth::user()->role ==2)
						<a class="dropdown-item" href="#">Cập nhật tình hình sản xuất</a>
						@endif
						@if (Auth::user()->role ==3)
						<a class="dropdown-item" href="#">Ý kiến - Góp ý</a>
						@endif
						<a class="dropdown-item" href="#">Thay đổi thông tin</a>
						<a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a>
					</div>

					@else
					<a href="{{ route('dangnhap') }}" title="Đăng nhập" class="btn btn-outline-light btn-sm">
						<i class="fas fa-user"></i> 
						Đăng nhập/ Đăng ký
                    </a>
					@endif
				</div>
			</div>
        </div>
    </div>
</div>
{{-- <!-- header --> --}}
{{-- <!-- Navigation --> --}}

<nav class="navbar navbar-expand-xl navbar-light" style="border-bottom: 2px solid #D68528;">
	<div class="container">
		<a href="{{ route('trangchu') }}" class="navbar-brand p-0" title="Home">
			<img src="shared_asset/upload/images/LOGO.png" class="LOGO img-fluid" alt="LOGO_SBA">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
			<ul class="navbar-nav">
				{{--  <!-- Dropdown -->  --}}
				@foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
				
					@if (count($dm->ChildMenus)>0)
						<li class="nav-item dropdown mx-3">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
								{{ $dm->name }}
							</a>
							<div class="dropdown-menu p-0 dropdown-content">
								@foreach ($dm->ChildMenus as $Child)
									<a class="dropdown-item px-3" href="#">{{ $Child->name }}</a>
									<div class="dropdown-divider my-0"></div>
								@endforeach
							</div>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link mx-3" href="#">{{ $dm->name }}</a>
						</li>
					@endif
				@endforeach

				<form class="form-inline ml-3" action="#">
					<div class="input-group">
						<input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ...">
						<div class="input-group-append">
							<button class="btn btn-sm btn-outline-primary" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</ul>
		</div>
	</div>
</nav>

{{-- <!-- Navigation --> --}}