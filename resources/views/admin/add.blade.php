@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add New</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Investors</a></li>
            <li class="breadcrumb-item active">Add New</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                  <h2 class="card-title "> <strong>Add New Investment</strong></h2>
                  <p class="card-text ">Add New Investors Details.</p>
                </div>
            </div>
        </div>
            <div class="card">
                <div class="card-header">
                    Form Input
                </div>
                <div class="card-body">
                  @include('admin.form')
                </div>
            </div>
    </div>
@endsection