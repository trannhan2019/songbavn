@extends('admin.layouts.master')
@section('title')
    Tổng quan
@endsection
@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Trang tổng quan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item active">Trang tổng quan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Quản lý Users</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-12 col-sm-6">
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                              <h3>{{ !empty($all_user)? count($all_user):0 }}</h3>
                                              <p>Tài khoản đã đăng ký</p>
                                            </div>
                                            <div class="icon">
                                              <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="{{ route('admin.user.list') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Quản lý nội dung</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                      
                                      <div class="small-box bg-info">
                                        <div class="inner">
                                          <h3>{{ !empty($all_gioithieu)?count($all_gioithieu):0 }}</h3>
                          
                                          <p> Trang tin giới thiệu</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="{{ route('admin.content.gioithieu',$gioithieu->ChildMenus->first()->id) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                   
                                    <div class="col-lg-3 col-6">
                                     
                                      <div class="small-box bg-success">
                                        <div class="inner">
                                          <h3>{{ !empty($all_tintuc)?count($all_tintuc):0 }}</h3>
                          
                                          <p>Trang tin tức</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="{{ route('admin.content.tintuc',$tintuc->ChildMenus->first()->id) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-6">
                                     
                                      <div class="small-box bg-warning">
                                        <div class="inner">
                                          <h3>{{ !empty($all_codong)&& !empty($all_ykien) ? count($all_codong)+count($all_ykien):0 }}</h3>
                          
                                          <p>Trang tin Quan hệ cổ đông</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="{{ route('admin.content.codong',$codong->ChildMenus->first()->id) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                
                                    <div class="col-lg-3 col-6">
                 
                                      <div class="small-box bg-danger">
                                        <div class="inner">
                                          <h3>{{ !empty($all_tuyendung)?count($all_tuyendung):0 }}</h3>
                          
                                          <p>Trang tin tuyển dụng</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="{{ route('admin.content.tuyendung',$tuyendung->ChildMenus->first()->id) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Top viết xem nhiều nhất</h3>
                                          </div>
                                          
                                          <div class="card-body p-0">
                                            <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th class="align-middle" style="width: 10px">#</th>
                                                  <th class="align-middle">Tiêu đề</th>
                                                  <th class="align-middle">Tác giả</th>
                                                  <th class="align-middle" style="width: 40px">Lượt xem</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @php
                                                  $i=1;
                                                @endphp
                                                @foreach ($tin_xemnhieu as $v)
                                                <tr>
                                                  <td class="align-middle">{{ $i++ }}</td>
                                                  <td class="align-middle">{{ $v->title }}</td>
                                                  <td class="align-middle">{{ $v->author }}</td>
                                                  <td class="align-middle"><span class="badge bg-danger">{{ $v->views }}</span></td>
                                                </tr>
                                                @endforeach
                                              </tbody>
                                            </table>
                                          </div>
                                         
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                              <h3 class="card-title font-weight-bold">Top bài viết bình luận nhiều</h3>
                                            </div>
                                            
                                            <div class="card-body p-0">
                                              <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th class="align-middle" style="width: 10px">#</th>
                                                    <th class="align-middle">Tiêu đề</th>
                                                    <th class="align-middle">Tác giả</th>
                                                    <th class="align-middle" style="width: 40px">Lượt bình luận</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @php
                                                    $j=1;
                                                  @endphp
                                                @foreach ($tin_binhluan as $b)
                                                @if (count($b->Comments)>0)
                                                <tr>
                                                  <td class="align-middle">{{ $j++ }}</td>
                                                  <td class="align-middle">{{ $b->title }}</td>
                                                  <td class="align-middle">{{ $b->author }}</td>
                                                  <td class="align-middle"><span class="badge bg-danger">{{ count($b->Comments) }}</span></td>
                                                </tr> 
                                                @endif
                                                @endforeach
                                                </tbody>
                                              </table>
                                            </div>
                                           
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Quản lý Ý kiến nhà đầu tư</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-12 col-sm-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                          <h3>{{ !empty($all_ykien)? count($all_ykien):0 }}</h3>
                                          <p>Ý kiến nhà đầu tư</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="{{ route('admin.content.ykien',$codong->ChildMenus->sortByDesc('position')->first()->id) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection