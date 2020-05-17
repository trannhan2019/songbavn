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
                                <h3 class="card-title">Quản lý Users</h3>
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
                                <h3 class="card-title">Quản lý nội dung</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                      
                                      <div class="small-box bg-info">
                                        <div class="inner">
                                          <h3>{{ !empty($all_gioithieu)?count($all_gioithieu):'' }}</h3>
                          
                                          <p> Trang tin giới thiệu</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="{{ route('admin.content.gioithieu',$gioithieu->id) }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                   
                                    <div class="col-lg-3 col-6">
                                     
                                      <div class="small-box bg-success">
                                        <div class="inner">
                                          <h3>{{ !empty($all_tintuc)?count($all_tintuc):'' }}</h3>
                          
                                          <p>Trang tin tức</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-6">
                                     
                                      <div class="small-box bg-warning">
                                        <div class="inner">
                                          <h3>44</h3>
                          
                                          <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                
                                    <div class="col-lg-3 col-6">
                 
                                      <div class="small-box bg-danger">
                                        <div class="inner">
                                          <h3>65</h3>
                          
                                          <p>Unique Visitors</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h3 class="card-title">Top viết xem nhiều nhất</h3>
                                          </div>
                                          
                                          <div class="card-body p-0">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th style="width: 10px">#</th>
                                                  <th>Task</th>
                                                  <th>Progress</th>
                                                  <th style="width: 40px">Label</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1.</td>
                                                  <td>Update software</td>
                                                  <td>
                                                    <div class="progress progress-xs">
                                                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                    </div>
                                                  </td>
                                                  <td><span class="badge bg-danger">55%</span></td>
                                                </tr>
                                                <tr>
                                                  <td>2.</td>
                                                  <td>Clean database</td>
                                                  <td>
                                                    <div class="progress progress-xs">
                                                      <div class="progress-bar bg-warning" style="width: 70%"></div>
                                                    </div>
                                                  </td>
                                                  <td><span class="badge bg-warning">70%</span></td>
                                                </tr>
                                                <tr>
                                                  <td>3.</td>
                                                  <td>Cron job running</td>
                                                  <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                      <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                    </div>
                                                  </td>
                                                  <td><span class="badge bg-primary">30%</span></td>
                                                </tr>
                                                <tr>
                                                  <td>4.</td>
                                                  <td>Fix and squish bugs</td>
                                                  <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                      <div class="progress-bar bg-success" style="width: 90%"></div>
                                                    </div>
                                                  </td>
                                                  <td><span class="badge bg-success">90%</span></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                         
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                              <h3 class="card-title">Top bài viết bình luận nhiều</h3>
                                            </div>
                                            
                                            <div class="card-body p-0">
                                              <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Task</th>
                                                    <th>Progress</th>
                                                    <th style="width: 40px">Label</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>1.</td>
                                                    <td>Update software</td>
                                                    <td>
                                                      <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                      </div>
                                                    </td>
                                                    <td><span class="badge bg-danger">55%</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td>2.</td>
                                                    <td>Clean database</td>
                                                    <td>
                                                      <div class="progress progress-xs">
                                                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                                                      </div>
                                                    </td>
                                                    <td><span class="badge bg-warning">70%</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td>3.</td>
                                                    <td>Cron job running</td>
                                                    <td>
                                                      <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                      </div>
                                                    </td>
                                                    <td><span class="badge bg-primary">30%</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td>4.</td>
                                                    <td>Fix and squish bugs</td>
                                                    <td>
                                                      <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                                      </div>
                                                    </td>
                                                    <td><span class="badge bg-success">90%</span></td>
                                                  </tr>
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
                            <h3 class="card-title">Quản lý Ý kiến nhà đầu tư</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-12 col-sm-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                          <h3>44</h3>
                                          <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                          <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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