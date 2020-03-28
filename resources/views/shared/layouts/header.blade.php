<div class="header p-2">
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
						<a class="dropdown-item" href="{{ route('admin.user.list') }}">Quản trị hệ thống</a>
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

<nav class="navbar navbar-expand-xl navbar-dark">
	<div class="container">
		<a href="{{ route('trangchu') }}" class="navbar-brand p-0" title="Home">
			<img src="shared_asset/upload/images/LOGO.png" class="LOGO img-fluid" alt="LOGO_SBA">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
			<ul class="navbar-nav m-auto">
				{{--  <!-- Dropdown -->  --}}
				<li class="nav-item dropdown mx-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						Giới thiệu
					</a>
					<div class="dropdown-menu p-0 dropdown-content">
						<a class="dropdown-item px-3" href="#">Giới thiệu chung</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Sơ đồ tổ chức</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Bộ máy tổ chức</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Lĩnh vực hoạt động</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Các dự án</a>
						<!-- <a class="dropdown-item" href="#">Điều lệ Công ty</a> -->
					</div>
				</li>
				<li class="nav-item dropdown mx-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						Tin tức
					</a>
					<div class="dropdown-menu dropdown-content p-0">
						<a class="dropdown-item px-3" href="#"> Thông tin hoạt động</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Đảng - Đoàn thể</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Bài viết SBA</a>
						<!-- <div class="dropdown-divider my-0"></div> -->
						<!-- <a class="dropdown-item px-3" href="#">Kỷ niệm SBA</a> -->
					</div>
				</li>
				<li class="nav-item dropdown mx-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						Quan hệ cổ đông
					</a>
					<div class="dropdown-menu dropdown-content p-0">
						<a class="dropdown-item px-3" href="#">Thông báo cổ đông</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="QHCD_CON.html">Báo cáo tài chính</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Báo cáo thường niên</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Công bố thông tin</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Đại hội đồng cổ đông</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Tình hình quản trị</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Điều lệ, Quy chế</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Ý kiến - Trả lời</a>
					</div>
				</li>
				{{--  <li class="nav-item dropdown ml-2">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						CÔNG NGHỆ SBA
					</a>
					<div class="dropdown-menu dropdown-content p-0">
						<a class="dropdown-item px-3" href="#">Quan trắc</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Vận hành lũ</a>
					</div>
				</li>  --}}
				<li class="nav-item dropdown mx-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
						Tuyển dụng
					</a>
					<div class="dropdown-menu dropdown-content p-0">
						<a class="dropdown-item px-3" href="#">Tin tuyển dụng</a>
						<div class="dropdown-divider my-0"></div>
						<a class="dropdown-item px-3" href="#">Chính sách tuyển dụng</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link mx-3" href="#">Liên hệ</a>
				</li>

				<form class="form-inline mx-3 ml-lg-3" action="#">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ...">
						<div class="input-group-append">
							<button class="btn btn-outline-primary" type="submit">
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