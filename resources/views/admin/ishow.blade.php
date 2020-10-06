@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Investors' Digital Form</h1>
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
                    <div>
                      <a href="/dashboard" class="btn btn-success">Back</a><br><br>
                    </div>
                    <h2 class="card-title" style="text-transform: uppercase;"> <strong>{{$investor->fname}} {{$investor->lname}}</strong></h2><br>
                  <p>Created: <span class="badge badge-info ">{{$investor->created_at}}</span> Updated: <span class="badge badge-success ">{{$investor->updated_at->diffForHumans()}}</span></p>
                    <hr>

                    <div class="row">
                      <div class="col-sm-12">
                        <div id="accordianId" role="tablist" aria-multiselectable="true">
                          <div class="card">
                            <div class="card-header" role="tab" id="section1HeaderId">
                              <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                  Click to view Additional Note
                                </a>
                              </h5>
                            </div>
                            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                              <div class="card-body">
                                {!!$investor->note!!}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                        <div class="col-sm-6">
                          <h4 style="text-decoration: underline;">Investors' Personal Details</h4>
                            <p>Investors' ID: <b style="text-transform: uppercase;">{{$investor->investor_number}}</b></p>
                            <p>Account Manager: <b style="text-transform: uppercase;">{{$investor->user->name}}</b></p>
                            <p>Bank Name: <b style="text-transform: uppercase;">{{$investor->bname}}</b></p>
                            <p>Account Name: <b style="text-transform: uppercase;">{{$investor->aname}}</b></p>
                            <p>Account Number: <b style="text-transform: uppercase;">{{$investor->baccount}}</b></p>
                        </div>
                        <div class="col-sm-6">
                          <br>
                            <p>Phone Number: <b style="text-transform: uppercase;"><a href="tel:{{$investor->phone}}">{{$investor->phone}}</a></b></p>
                            <p>Email Address: <b style="text-transform: uppercase;"><a href="mailto:{{$investor->email}}">{{$investor->email}}</a></b></p>
                            <p>Investment Activation Date: <b style="text-transform: uppercase;">{{$investor->adate}}</b></p>
                            <p>Number of Times Paid: <b style="text-transform: uppercase;">{{$investor->num_of_payment}}</b></p>
                            <p>Payment Due Date: <b style="text-transform: uppercase;">{{$investor->pdate}}</b></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                      
                        <div class="col-sm-6">
                          <h4 style="text-decoration: underline;">Investors' Investment Details</h4>
                            <p>ROI (%): <b style="text-transform: uppercase;">{{$investor->percentage}}</b></p>
                            <p>Amount Invested (₦): <b style="text-transform: uppercase;">{{$investor->ainvested}}</b></p>
                            <p>Return on Investment (₦): <b style="text-transform: uppercase;">{{$investor->roi}}</b></p>
                            <p>Investment Duration: <b style="text-transform: uppercase;">{{$investor->duration->duration}}</b></p>
                            <p>Investment Plan: <b style="text-transform: uppercase;">{{$investor->plan->plan}}</b></p>
                            <p>Investment Status: <b style="text-transform: uppercase;">{{$investor->status->status}}</b></p>
                        </div>
                        <div class="col-sm-6">
                          <br>
                          <img src="{{url('http://localhost:8000/'.$investor->file->name)}}" class="img-fluid mb-2"  class="img-responsive" style="max-width: 100%;" alt="Investors' Form"/>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div>
                      <h4>Referee's Details</h4>
                      <p style="text-transform: ca">Full Name: {{$investor->referee}}</p>
                      <h4>Account Details</h4>
                      <p style="text-transform: capitalize;">Account Name: {{$investor->ref_account_name}}<br>
                        Account Number: {{$investor->ref_account_num}} <br>
                        Bank Name: {{$investor->ref_account_bank}}
                      
                      </p>
                    </div>
                    <hr>
                    <div class="col-sm-6">
                      @can('isAdmin')
                        <a class="btn btn-danger">Delete</a>
                      @endcan
                    </div>
                    <br>
                    <!--for non post user-->
                    @if (Auth::user()->id == $investor->user_id)
                    <div class="col-sm-6">
                      <a class="btn btn-primary" href="/dashboard/edit/{{$investor->id}}">Edit</a>
                    </div>
                    @endif

                  </div>
                </div>
        </div>
    </div>
    @endsection