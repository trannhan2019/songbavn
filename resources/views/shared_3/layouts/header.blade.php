<header class="header-area clearfix">
    <div class="header-top">
        <div class="container">
            <div class="border-bottom-1">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 d-none d-md-block">
                        <div class="welcome-area">
                            <p><i class="fas fa-phone"></i>  0236.3653 592</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="account-curr-lang-wrap f-right">
                            <ul>
                                @if (Auth::check())
                                    <li class="top-hover"><a href="#">{{ Auth::user()->fullname }} <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            @if (Auth::user()->role ==1)
                                            <li><a href="{{ route('admin.dashboard') }}">Quản trị hệ thống  </a></li>
                                            @endif
                                            <li><a href="#">Thay đổi thông tin </a></li>
                                            <li><a href="{{route('dangxuat') }}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('dangnhap') }}"> Đăng nhập | Đăng ký</a></li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom transparent-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-8">
                    <div class="logo">
                        <a href="{{ route('trangchu') }}">
                            <img alt="Home" src="shared_asset/upload/images/logo_v3.png" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-4">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    @foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
                                        @if (count($dm->ChildMenus)>0)
                                        <li class="top-hover"><a href="#">{{ $dm->name }}</a>
                                            <ul class="submenu">
                                                @foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)
                                                    @if ($child->slug=='co-cau-to-chuc')
                                                    <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                    @elseif($child->slug=='cac-nha-may')
                                                    <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                    @elseif($child->slug=='cac-du-an')
                                                    <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                    @elseif($child->slug=='y-kien-nha-dau-tu')
                                                    <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                    @else
                                                    <li><a href="noidung/{{ $child->id }}/{{ $dm->slug }}.html">{{ $child->name }} </a></li>
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
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            @foreach ($danhmuc->where('status',1)->sortBy('position') as $dm)
                                @if (count($dm->ChildMenus)>0)
                                    <li><a href="#">{{ $dm->name }}</a>
                                        <ul class="submenu">
                                            @foreach ($dm->ChildMenus->where('status',1)->sortBy('position') as $child)
                                                @if ($child->slug=='co-cau-to-chuc')
                                                <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                @elseif($child->slug=='cac-nha-may')
                                                <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                @elseif($child->slug=='cac-du-an')
                                                <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                @elseif($child->slug=='y-kien-nha-dau-tu')
                                                <li><a href="noidung/{{ $child->id }}/{{ $child->slug }}.html">{{ $child->name }} </a></li>
                                                @else
                                                <li><a href="noidung/{{ $child->id }}/{{ $dm->slug }}.html">{{ $child->name }} </a></li>
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
</header>