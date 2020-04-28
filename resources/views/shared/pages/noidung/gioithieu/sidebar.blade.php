<div id="sidebar-menu" class="d-none d-md-inline border" style="width: 15rem">
	<ul class="nav flex-column">
        @if (!empty($menu->Parent))
            @php
            $gioithieu = $menu->Parent;
            @endphp
        @else
            @php
            $gioithieu = $menu;
            @endphp
        @endif
            @foreach ($gioithieu->ChildMenus->where('status',1)->sortBy('position') as $child_menu)
            <li class="nav-item">
                @if ($child_menu->slug=='co-cau-to-chuc')
                    <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title=""><i class="fas fa-bars pr-2"></i> {{ $child_menu->name }}</a>
                @elseif($child_menu->slug=='cac-nha-may')
                    <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title=""><i class="fas fa-bars pr-2"></i> {{ $child_menu->name }}</a>
                @elseif($child_menu->slug=='cac-du-an')
                    <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title=""><i class="fas fa-bars pr-2"></i> {{ $child_menu->name }}</a>
                @else
                    <a href="noidung/{{ $child_menu->id }}/{{ $gioithieu->slug }}.html" class="nav-link" title=""><i class="fas fa-bars pr-2"></i> {{ $child_menu->name }}</a>
                @endif
            </li>
            <hr class="my-1 w-100">
            @endforeach
	</ul>
</div>