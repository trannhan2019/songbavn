@extends('shared.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection

@section('content')
@include('shared.layouts.breadcrumb')
<div class="container content">
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