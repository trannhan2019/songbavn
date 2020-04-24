@if (!empty($sub_content))
    <div class="row">
        <div class="col-12 bg-white">
            <a href="admin/content/{{ $menu->id }}/{{ $sub_content->id }}/edit-{{ $menu->slug }}.html" class="btn btn-sm btn-outline-info float-right" title="sửa">Sửa</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 bg-white">
            {!! $sub_content->content !!}
        </div>
    </div>

@endif