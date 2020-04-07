@extends('admin.layouts.master')
@section('title')
    Trang test
@endsection

@section('content')
{{-- <!-- Content Wrapper. Contains page content --> --}}
<div class="content-wrapper">
  {{-- <!-- Content Header (Page header) --> --}}
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Starter Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  {{-- <!-- /.content-header --> --}}

  {{-- <!-- Main content --> --}}
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>

              <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card
                content.
              </p>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>

              <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of the card
                content.
              </p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
        {{-- <!-- /.col-md-6 --> --}}
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Featured</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Special title treatment</h6>

              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Featured</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Special title treatment</h6>

              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        {{-- <!-- /.col-md-6 --> --}}
      </div>
      {{-- <!-- /.row --> --}}
    </div>
  </div>
  {{-- <!-- /.content --> --}}
</div>
{{-- <!-- /.content-wrapper --> --}}
@endsection
<div class="form-group">
  
  <div class="input-group date" id="datetimepickerCreatmt" data-target-input="nearest">
      <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerCreatmt" data-toggle="datetimepicker" name="year"/>
      <div class="input-group-append" data-target="#datetimepickerCreatmt" >
          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
      </div>
  </div>                                    
</div>
<div class="form-group">
  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
      <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
      <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
      </div>
  </div>
</div>