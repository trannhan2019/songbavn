{{-- <!-- Navbar --> --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	{{-- <!-- Left navbar links --> --}}
	<ul class="navbar-nav">
	<li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
	</li>
	<li class="nav-item d-none d-sm-inline-block">
		<a href="{{ route('trangchu') }}" class="nav-link">Trang chủ</a>
	</li>
	{{--  <li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
	</li>  --}}
	</ul>

	{{-- <!-- SEARCH FORM --> --}}
	{{--  <form class="form-inline ml-3">
	<div class="input-group input-group-sm">
		<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
		<div class="input-group-append">
		<button class="btn btn-navbar" type="submit">
			<i class="fas fa-search"></i>
		</button>
		</div>
	</div>
	</form>  --}}

	{{-- <!-- Right navbar links --> --}}
	<ul class="navbar-nav ml-auto">
		{{--  user  --}}
		<li class="dropdown user user-menu px-1 py-2">
			<a href="#" class="dropdown-toggle text-gray" data-toggle="dropdown" aria-expanded="false">
				<i class="fas fa-user"></i> 
				<span class="hidden-xs">{{ Auth::user()->username }}</span>
			</a>
			<ul class="dropdown-menu">
				<small><a class="dropdown-item" href="{{ route('trangchu') }}">Trang chủ</a></small>
				<small><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng xuất</a></small>
			</ul>
		</li>
	{{-- <!-- Messages Dropdown Menu --> --}}
		@php
		$notifications = auth()->user()->unreadNotifications;
		@endphp
{{--  {{ dd($notifications->where('type','App\Notifications\NewYkienNotification')) }}  --}}
		{{--  Thông báo thông tin người dùng  --}}
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fas fa-users"></i>
				<span class="badge badge-danger navbar-badge">{{ count($notifications->where('type','App\Notifications\NewUserNotification'))>0 ? count($notifications->where('type','App\Notifications\NewUserNotification')):0 }}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				@if(auth()->user()->role==1)
					@forelse($notifications->where('type','App\Notifications\NewUserNotification') as $usernoti)
						<a href="{{ route('admin.thongbao.nguoidung',$usernoti->id) }}" class="dropdown-item">
							{{-- <!-- Message Start --> --}}
							<div class="media">
								<div class="media-body">
									<p class="text-sm"> Người dùng <strong>{{ $usernoti->data['fullname'] }}</strong> đã đăng ký tài khoản vào lúc <strong>{{ $usernoti->created_at->format('d/m/Y H:i') }}</strong> </p>
								</div>
							</div>
							{{-- <!-- Message End --> --}}
						</a>
					@empty
					<div class="media">
						<div class="media-body">
							<p class="text-sm text-center"> Không có thông báo mới </p>
						</div>
					</div>
					@endforelse
				@endif
			</div>
		</li>
		{{--  Thông báo ý kiến cổ đông  --}}
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fas fa-tty"></i>
				<span class="badge badge-danger navbar-badge">{{ count($notifications->where('type','App\Notifications\NewYkienNotification'))>0 ? count($notifications->where('type','App\Notifications\NewYkienNotification')):0 }}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				@if(auth()->user()->role==1)
				@forelse($notifications->where('type','App\Notifications\NewYkienNotification') as $ykiennoti)
						<a href="{{ route('admin.thongbao.ykien',$ykiennoti->id) }}" class="dropdown-item">
							{{-- <!-- Message Start --> --}}
							<div class="media">
								<div class="media-body">
									<p class="text-sm"> Cổ đông <strong>{{ $ykiennoti->data['fullname'] }}</strong> đã đăng ý kiến mới vào lúc <strong>{{ $ykiennoti->created_at->format('d/m/Y H:i') }}</strong> </p>
								</div>
							</div>
							{{-- <!-- Message End --> --}}
						</a>
					@empty
					<div class="media">
						<div class="media-body">
							<p class="text-sm text-center"> Không có thông báo mới</p>
						</div>
					</div>
					@endforelse
				@endif
			</div>
		</li>
		{{--  Thông báo bình luận mới  --}}
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-comments"></i>
				<span class="badge badge-danger navbar-badge">{{ count($notifications->where('type','App\Notifications\NewBinhluanNotification'))>0 ? count($notifications->where('type','App\Notifications\NewBinhluanNotification')):0 }}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				@if(auth()->user()->role==1)
				@forelse($notifications->where('type','App\Notifications\NewBinhluanNotification') as $binhluannoti)
						<a href="{{ route('admin.thongbao.binhluan',$binhluannoti->id) }}" class="dropdown-item">
							{{-- <!-- Message Start --> --}}
							<div class="media">
								<div class="media-body">
									<p class="text-sm"> <strong>{{ $binhluannoti->data['sendername'] }}</strong> đã đăng bình luận mới vào lúc <strong>{{ $binhluannoti->created_at->format('d/m/Y H:i') }}</strong> </p>
								</div>
							</div>
							{{-- <!-- Message End --> --}}
						</a>
					@empty
					<div class="media">
						<div class="media-body">
							<p class="text-sm text-center"> Không có thông báo mới</p>
						</div>
					</div>
					@endforelse
				@endif
			</div>
		</li>

	</ul>
</nav>
{{-- <!-- /.navbar --> --}}