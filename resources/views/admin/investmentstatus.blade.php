@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Investment Status</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Investment Status</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <p>Please note; the following are the status that can be added provided they don't exist below.</p>
      <ul>
        <li>New Investment</li>
        <li>Terminated</li>
        <li>Rollover</li>
        <li>Top-up</li>
      </ul>
      <p>It should be written in the above format</p>
    </div>
  </div>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title "> <strong>Add Investment Status</strong></h2><br>
                    <form action="/investment-status" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="">Investment Status</label>
                            <input type="text" class="form-control" placeholder="Active" name="status">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                  </div>
                </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Investment Status List</h4><br>
                <ul class="list-group">
                  @forelse ($statuses as $status)
                  <div class="row">
                    <div class="col sm-8">
                      <li class="list-group-item">{{$status->status}}</li> 
                    </div>
                    <div class="col-sm-4">
                      <form action="/investment-status/{{$status->id}}" method="post">
                        @csrf
                        @method('DELETE') 
                        <button class="btn btn-danger">Delete</button>
                      </form>
                     
                    </div>
                  </div>
                  @empty
                      <ul>
                        <li>No Data Available</li>
                      </ul>
                  @endforelse
                  
                </ul>
            </div>
        </div>
    </div>
@endsection