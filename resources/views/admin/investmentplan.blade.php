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
            <li class="breadcrumb-item active">Investment Plans</li>
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
                    <h2 class="card-title "> <strong>Add Investment Plans</strong></h2><br>
                    <form action="/investment-plan" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="">Investment Plans</label>
                            <input type="text" class="form-control" placeholder="Silver Plan" name="plan">
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
                <h4 class="card-title">Investment Plan List</h4><br>
                <ul class="list-group">
                  @forelse ($plans as $plan)
                  <div class="row">
                    <div class="col sm-8">
                      <li class="list-group-item">{{$plan->plan}}</li> 
                    </div>
                    <div class="col-sm-4">
                      <form action="/investment-plan/{{$plan->id}}" method="post">
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