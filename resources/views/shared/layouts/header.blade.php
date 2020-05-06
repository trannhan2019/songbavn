
<div class="header_login py-1" style="background-color: #0099cc;">
	<div class="container">
		<div class="row">
			<div class="col text-left p-1">
				@if (Auth::check())
				<small>
					<a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
						<i class="fas fa-user"></i> 
						{{ Auth::user()->fullname }}
					</a>
					<div class="dropdown-menu">
						@if (Auth::user()->role ==1)
						<small><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị hệ thống</a></small>
						@endif
						<small><a class="dropdown-item" href="#">Thay đổi thông tin</a></small>
						<small><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a></small>
					</div>
				</small>
				
				@else
				<i class="fas fa-user text-white"></i> 
				<small><a href="{{route('dangnhap') }}" class="text-white" title="Đăng nhập/ Đăng ký">Đăng nhập</a></small>
				@endif
				
			</div>
			<div class="col text-center d-none d-lg-block text-white p-1">
				<i class="fas fa-phone"></i> &ensp;
				<small> 0236.3653 592</small> 
			</div>
			<div class="col px-1">
				<form class="form-inline float-right" action="#">
					@csrf
					<div class="input-group">
						<input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ...">
						<div class="input-group-append">
							<button class="btn btn-sm btn-outline-secondary" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

{{-- <!-- header --> --}}
{{-- <!-- Navigation --> --}}

<nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top" style="border-bottom: 2px solid #D68528;border-top: 2px solid #D68528; z-index: 1;">
	<div class="container">
		<a href="{{ route('trangchu') }}" class="navbar-brand p-0" title="Home">
			<img src="shared_asset/upload/images/logo_v2.png" class="img-fluid LOGO" alt="LOGO_SBA">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
			<ul class="navbar-nav">
				{{--  <!-- Dropdown -->  --}}
				@foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
				
					@if (count($dm->ChildMenus)>0)
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-uppercase" style="color: #6600ff;" href="#" data-toggle="dropdown">
							{{ $dm->name }}
						</a>
						<div class="dropdown-menu p-0 dropdown-content">
							@foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)
								@if ($child->slug=='co-cau-to-chuc')
								<a class="dropdown-item px-3" href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@elseif($child->slug=='cac-nha-may')
								<a class="dropdown-item px-3" href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@elseif($child->slug=='cac-du-an')
								<a class="dropdown-item px-3" href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@elseif($child->slug=='y-kien-nha-dau-tu')
								<a class="dropdown-item px-3" href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@else
								<a class="dropdown-item px-3" href="noidung/{{ $child->id }}/{{ $dm->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@endif
							@endforeach
						</div>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link text-uppercase" style="color: #6600ff;" href="{{ $dm->slug =='lien-he' ? 'noidung/'.$dm->id.'/'.$dm->slug.'.html':'#' }}">{{ $dm->name }}</a>
					</li>
					@endif
				@endforeach

				{{--  <form class="form-inline ml-3" action="#">
					<div class="input-group">
						<input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ...">
						<div class="input-group-append">
							<button class="btn btn-sm btn-outline-primary" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>  --}}
			</ul>
		</div>
	</div>
</nav>

{{-- <!-- Navigation --> --}}