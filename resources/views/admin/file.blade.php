@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">File Upload</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">File Upload</li>
          </ol>
        </div><!-- /.col -->
        <br>
        <div class="col-sm-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            Please, upload only "jpeg", "png" or "jpg". When scanning save as picture format and use the client's full name as reference.
          </div>
        </div>
        <div class="col-sm-12">
            @if ($message = Session::get('image-success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <div class="card container">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Recently Uploaded Form</h5>
                        </div>
                        <div class="col-sm-6">
                            <img src="images/{{ Session::get('name') }}" style="max-width: 100%;">
                        </div>
                    </div>
                </div>

            </div>
            @endif
      
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title "> <strong>Upload Investment Form</strong></h2>
                  </div>
                </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="/file-upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Form Upload</label>
                        <input type="file" name="name" class="form-control-file">
                    </div>
                    <div class="form-group">
                      <label for="">Client Name</label>
                      <input type="text" class="form-control" name="client_name">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload Form</button>
                    </div>

                </form>
            </div>
        </div>
        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {!! $files->links()!!}
                </ul>          
        </nav>
        <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <div class="card-title">
                 All Forms
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="card-title">Uploaded Investment Forms</div>
                        </div>
                        <div class="card-body">
                          <table class="example1 table table-bordered table-hover table-responsive-sms">
                            <thead>
                              <tr>
                                <th>Forms</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($files as $file)
                              <tr>
                                <td>
                                  <div class="row">
                                    <div class="col-sm-8">
                                      <a href="{{$file->name}}" data-toggle="lightbox" data-title="{{$file->client_name}}" data-gallery="gallery" >
                                        <img src="{{$file->name}}" class="img-fluid mb-2" alt="Investment Forms" style="max-width: 20%;"/>
                                        <p style="text-transform: uppercase; color:black;">{{$file->client_name}}</p>
                                    </a>
                                    </div>
                                  </div>
                                </td>
                                @can('isAdmin')
                                <td>
                                  <form action="/file-upload/{{$file->id}}" method="post">
                                    @csrf
                                    @method('DELETE') 
                                    <button class="btn btn-danger">Delete</button>
                                  </form>
                                </td>
                                @endcan
                              </tr>
                              @empty
                                  
                              @endforelse

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
@endsection