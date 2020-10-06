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
                    <h2 class="card-title "> <strong>Update Clients Payment and Status</strong></h2><br><hr>
                    <a href="/dashboard" class="btn btn-success">Back</a> <br><br>
                    <div>
                      Record Updated On: <span class="badge badge-info">{{$investor->updated_at}}</span>
                    </div>
                  <form action="/dashboard/update/{{$investor->id}}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Investor's Status</label>
                            <h6>Current Status: <strong>{{$investor->status->status}}</strong></h6>
                            <select name="istatus_id" id="" class="form-control">
                              <option value="{{$investor->istatus_id}}">Update Status</option>
                              @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->status}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="">Numbers of Payments Made</label>
                          <h6>Current Payment: <strong>{{$investor->num_of_payment}}</strong>
                            <?php
                            $payment = $investor->num_of_payment;
                            $duration = $investor->duration->num;
                              if ($payment == $duration) {
                                echo '<span class="badge badge-success">Completed</span>';
                              }elseif ($payment < $duration) {
                                echo '<span class="badge badge-danger">Not Completed</span>';
                              } else {
                                echo '<span class="badge badge-warning">Payment Exceeded</span>';
                              }
                              ?>
                          </h6>
                          <input type="number" class="form-control" value="{{$investor->num_of_payment}}" name="num_of_payment">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div id="accordianId" role="tablist" aria-multiselectable="true">
                            <div class="card">
                              <div class="card-header" role="tab" id="section1HeaderId">
                                <h5 class="mb-0">
                                  <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                    Client's Account Details(Only change if necessary)
                                  </a>
                                </h5>
                              </div>
                              <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label for="">Account Name</label>
                                      <input type="text" class="form-control" value="{{$investor->aname}}" name="aname">
                                    </div>
                                    <div class="col-sm-4">
                                      <label for="">Account Number</label>
                                      <input type="text" class="form-control" value="{{$investor->baccount}}" name="baccount">
                                    </div>
                                    <div class="col-sm-4">
                                      <label for="">Bank Name</label>
                                      <input type="text" class="form-control" value="{{$investor->bname}}" name="bname">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="submit" class="btn btn-success">
                    </form>
                  </div>
                </div>
        </div>
    </div>
@endsection