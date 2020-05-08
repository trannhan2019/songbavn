<header class="header-area">
	<div class="header-top" style="background-color: #0066cc;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-none d-md-block">
					<span class="ht-header-msg"><i class="far fa-envelope"></i> sba2007@songba.vn</span>
					<span class="ht-header-msg"><i class="fas fa-phone"></i> 0236 3 653592</span>
				</div>
				<div class="col-md-6 text-white">
					<div class="social-media float-right">
						@if (Auth::check())
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fas fa-user"></i> &nbsp;
								{{ Auth::user()->fullname }}
							</a>
							<div class="dropdown-menu">
								<small>
								@if (Auth::user()->role ==1)
								<a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị hệ thống</a>
								@endif
								<a class="dropdown-item" href="#">Thay đổi thông tin</a>
								<a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a>
								</small>
							</div>
						@else
						<i class="fas fa-user"></i> &nbsp;
						<a href="{{route('dangnhap') }}">Đăng nhập/ Đăng ký</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mainmenu-area header-sticky bg-white">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="logo">
						<a href="{{ route('trangchu') }}"><img src="#" alt="SBA"></a>
					</div>
				</div>
				<div class="col-md-7 d-none d-lg-block">
					<div class="menu-container">
						<div class="menu-wrapper">
							<div class="main-menu mean-menu">
								<nav>
									<ul>
										@foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
										@if (count($dm->ChildMenus)>0)
										<li><a href="#">{{ $dm->name }}</a>
											<ul>
												@foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)
													@if ($child->slug=='co-cau-to-chuc')
													<li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a></li>
													@elseif($child->slug=='cac-nha-may')
													<li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a></li>
													@elseif($child->slug=='cac-du-an')
													<li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a></li>
													@elseif($child->slug=='y-kien-nha-dau-tu')
													<li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a></li>
													@else
													<li><a href="noidung/{{ $child->id }}/{{ $dm->slug }}.html">{{ $child->name }}</a></li>
													@endif
												@endforeach
											</ul>
										</li>
										@else
										<li><a href="{{ $dm->slug =='lien-he' ? 'noidung/'.$dm->id.'/'.$dm->slug.'.html':'#' }}">{{ $dm->name }}</a></li>
										@endif
										@endforeach
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mobile-menu hidden-lg hidden-md"></div>
		</div>
	</div>
</header>