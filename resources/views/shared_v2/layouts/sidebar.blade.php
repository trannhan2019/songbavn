{{-- <!-- sidebar-menu --> --}}
<div id="sidebar-menu" class="d-none d-md-inline border bg-light" style="width: 15rem;">
    <ul class="nav nav-bar flex-column">
        @php
            $gioithieu = $menu->Parent;
        @endphp
        @foreach ($gioithieu->ChildMenus->where('status',1)->sortBy('position') as $child_menu)
        <li class="nav-item">
            @if ($child_menu->slug=='co-cau-to-chuc')
                <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title="">{{ $child_menu->name }}</a>
            @elseif($child_menu->slug=='cac-nha-may')
                <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title="">{{ $child_menu->name }}</a>
            @elseif($child_menu->slug=='cac-du-an')
                <a href="noidung/{{ $child_menu->id }}/{{ $child_menu->slug }}.html" class="nav-link" title="">{{ $child_menu->name }}</a>
            @else
                <a href="noidung/{{ $child_menu->id }}/{{ $gioithieu->slug }}.html" class="nav-link" title="">{{ $child_menu->name }}</a>
            @endif
        </li>
        <hr class="my-1 w-100">
        @endforeach
    </ul>
</div>
{{-- <!-- end sidebar-menu --> --}}