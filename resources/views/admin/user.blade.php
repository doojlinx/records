@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All Users</h1>
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
        <div class="container-fluid">
                <div class="card">
                  <div class="card-body">
                    <a href="/register" class="btn btn-success">Add New</a>
                  </div>
                </div>
        </div>
               <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users Lsit</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-responsive-sms">
                <thead>
                    <tr style="font-size:15px;">
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Role</th>
                      <th>Numbers of Investors</th> 
                      <th>Edit</th> 
                      <th>Delete</th>             
                    </tr>
                </thead>
                <tbody>
                  @forelse ($users as $user)
                      <tr style="font-size:12px;">
                      <td style="text-transform: uppercase;">{{$user->name}}</td>
                      <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                      <td style="text-transform: capitalize;">{{$user->role}}</td>
                      <td>{{$user->investment->count()}}</td>
                      <td><a href="/users/{{$user->id}}/edit" class="btn btn-info">Edit</a></td>
                      <td><a href="" class="btn btn-danger">
                        <form action="/users/{{$user->id}}" method="post">
                          @csrf
                          @method('DELETE') 
                          <button class="btn btn-danger">Delete</button>
                        </form>  
                      </a></td>
                      </tr>
                
                 @empty
                 <p>No user record</p>
                 @endforelse 

                    
                </tbody>
                <tfoot>
                    <tr style="font-size:15px;">
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Investors</th> 
                        <th>Edit</th> 
                        <th>Delete</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
        </div>

    </div>

   
@endsection