@extends('shared.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection

@section('content')
    @include('shared.layouts.breadcrumb')
    <div class="container">
        <div class="row">
            @include('shared.layouts.sidebar')
            <div class="col">
                <div class="bg-light">
                    <button type="button" id="btn-toggle" class="btn btn-outline-secondary d-md-none">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h5 class="d-inline ">{{ $menu->name }}</h5>
                </div>
                <div class="bg-white">
                    {!! $content->content !!}
                </div>
                
            </div>
        </div>
    </div>
@endsection