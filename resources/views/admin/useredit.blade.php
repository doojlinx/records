@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
        <br>


      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
    <div class="content">
               <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" value="">
                </div>
            </form>
        </div>
    </div>
        </div>

    </div>

   
@endsection