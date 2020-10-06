@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Investment Plans</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Branches</li>
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
                    <h2 class="card-title "> <strong>Add Returns Market Investment Branches</strong></h2><br>
                    <form action="/branch" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="">Branch Name</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Branch Address</label>
                            <input type="text" class="form-control" placeholder="" name="address">
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
                <h4 class="card-title">Branches</h4><br><br>
                <ul class="list-group">
                  @forelse ($branches as $branch)
                  <div class="row">
                    <div class="col sm-8">
                      <li class="list-group-item">{{$branch->name}}</li><br> 
                      <p>Office Address:<strong> {{$branch->address}}</strong></p>
                      <hr>
                    </div>
                    <div class="col-sm-4">
                      <form action="/branch/{{$branch->id}}" method="post">
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