<div id="sidebar-menu" class="d-none d-md-inline" style="width: 15rem">
	<div class="list-group list-group-flush">
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
            <a href="{{ $gioithieu->slug }}/{{ $child_menu->slug }}" class="list-group-item" title=""><i class="fas fa-bars pr-2"></i> {{ $child_menu->name }}</a>
            @endforeach
    </div>
</div>