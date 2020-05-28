
<div class="header_login py-1" style="background-color: #0066cc;">
	<div class="container">
		<div class="row">
			
			<div class="col text-left text-white p-1">
				<i class="far fa-clock"></i>&nbsp;
				<small id="head_datetime"> </small> 
			</div>
			<div class="col text-right p-1">
				@if (Auth::check())
				<a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
					<small><i class="fas fa-user"></i></small> &nbsp;
					<small>{{ Auth::user()->fullname }}</small>
				</a>
				<div class="dropdown-menu">
					@if (Auth::user()->role ==1)
					<small><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản trị hệ thống</a></small>
					@endif
					<small><a class="dropdown-item" href="{{ route('thongtin') }}">Thay đổi thông tin</a></small>
					<small><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a></small>
				</div>
				
				@else
				<small><i class="fas fa-user text-white"></i></small> &nbsp;
				<small><a href="{{route('dangnhap') }}" class="text-white" title="Đăng nhập/ Đăng ký">Đăng nhập</a></small>
				@endif
				
			</div>


		</div>
	</div>
</div>

{{-- <!-- header --> --}}
{{-- <!-- Navigation --> --}}

<nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top" style="border-bottom: 2px solid #D68528;border-top: 2px solid #D68528; z-index: 1;">
	<div class="container">
		<a href="{{ route('trangchu') }}" class="navbar-brand p-0" title="Home">
			<img src="shared_asset/upload/images/logo_v3.png" class="img-fluid LOGO" alt="LOGO_SBA" style="max-width: 400px">
		</a>
		<button class="navbar-toggler text-gray-dark" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
			<ul class="navbar-nav">
				{{--  <!-- Dropdown -->  --}}
				@php
					$danhmucgoc = App\Menu::whereNull('parent')->with('ChildMenus')->get();
				@endphp
				@foreach ($danhmucgoc->where('status',1)->sortBy('position') as $dm)
				
					@if (count($dm->ChildMenus)>0)
					<li class="nav-item dropdown mx-1 py-2">
						<a class="nav-link dropdown-toggle text-uppercase font-weight-bold" style="color: #000066c9;" href="#" data-toggle="dropdown">
							{{ $dm->name }}
						</a>
						<div class="dropdown-menu p-0 dropdown-content">
							@foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)	
							<a class="dropdown-item px-3" href="{{ $dm->slug }}/{{ $child->slug }}">{{ $child->name }}</a>
							<div class="dropdown-divider my-0"></div>
							@endforeach
						</div>
						{{--  <div class="dropdown-menu p-0 dropdown-content">
							@foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)	
								@if ($child->slug=='co-cau-to-chuc'||$child->slug=='cac-nha-may'||$child->slug=='cac-du-an'||$child->slug=='y-kien-nha-dau-tu')
								<a class="dropdown-item px-3" href="{{ $dm->slug }}/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@else
								<a class="dropdown-item px-3" href="{{ $dm->slug }}/{{ $child->slug }}">{{ $child->name }}</a>
								<div class="dropdown-divider my-0"></div>
								@endif
							@endforeach
						</div>  --}}
					</li>
					@else
					<li class="nav-item py-2">
						<a class="nav-link text-uppercase font-weight-bold" style="color: #000066c9;" href="{{ $dm->slug }}">{{ $dm->name }}</a>
					</li>
					@endif
				@endforeach

			</ul>
		</div>
	</div>
</nav>



{{-- <!-- Navigation --> --}}