@extends('shared.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection

@section('content')
@include('shared.layouts.breadcrumb')
<div class="container content">
    @if (Auth::check())
        @if (Auth::user()->role == 1)
        <div class="btn-group btn-group-sm mb-2">
            <a href="admin/content/{{ $menu->id }}/{{ $content->id }}/edit-{{ $menu->slug }}.html" title="sửa" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
        </div> 
        @endif
    @endif
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">Thông tin liên hệ</h6>
        </div>				
        <div class="card-body">
            {!! $content->content !!}
        </div>
    </div>
</div>
@endsection