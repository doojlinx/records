@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
        <br>
        <div class="col-sm-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            Please, make sure to check for all available statuses, plans and investment durations before adding a client.
          </div>
        </div>
        <div class="col-sm-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            Please, make sure to upload all documents or form before adding a client investment details
          </div>
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
                    <h2 class="card-title "> <strong>Investors List and Payment Date</strong></h2>
                    <p class="card-text ">Total Number of Active and Inactive Investors: </p> <br>
                    <a href="/create" class="btn btn-success">Add New</a>
                  </div>
                </div>
        </div>
               <div class="card">
        <div class="card-header">
            <h3 class="card-title">Investment List</h3>
        </div>
        <div class="card-body">
            <table id="" class=" example1 table table-bordered table-hover table-responsive-sms">
                <thead>
                    <tr style="font-size:15px;">
                      <th>ID Number</th>
                      <th>Investor's Name</th>
                      <th>Account Number</th>
                      <th>Invesment Duration</th>
                      <th>Payments Made</th>
                      <th>Due Date</th>
                      <th>Branch</th>
                      <th>Status</th>
                      <th>Process</th>
                      <th><i class="nav-icon fas fa-eye"></i></th>
                      @can('isAdmin')
                        <th><i class="nav-icon fas fa-pen"></i></th>
                      @endcan
                      
                    </tr>
                </thead>
                <tbody>
                  @forelse ($investments as $investment)
                      <tr style="font-size:12px;">
                      <td style="text-transform: uppercase;">{{$investment->investor_number}}</td>
                      <td style="text-transform: capitalize;">{{$investment->fname}} {{$investment->lname}}</td>
                      <td>{{$investment->baccount}}</td>
                      <td>{{$investment->duration->duration}}</td>
                      <td>
                        <?php 
                          $payment = $investment->num_of_payment;
                          $duration = $investment->duration->num;
                          $status = $investment->status->status;
                          if ($status == 'Terminated' && $payment < $duration) {
                            echo '<span class="badge badge-danger" title="Investment Terminated halfway">Payment Cut-off</span>';
                          }elseif ($payment == $duration) {
                            echo '<span class="badge badge-success">Completed</span>';
                          }elseif ($payment > $duration) {
                            echo '<span class="badge badge-warning" title="Please check your account statement">Payment Exceeded</span>';
                          }elseif ($payment < $duration) {
                            echo $payment;
                          }

                          ?>
                      </td>
                      <td style="text-transform: capitalize;">{{$investment->pdate}}</td>
                      <td>{{$investment->branch->name}}</td>
                      <td>{{$investment->status->status}}</td>
                      <td>
                        <?php 
                        $payment = $investment->num_of_payment;
                        $duration = $investment->duration->num;
                        $status = $investment->status->status;
                        if ($status == 'New Investment' && $payment < $duration) {
                          echo '<span class="badge badge-success" title="Investment currently running">Investment Running</span>';
                        }elseif ($status == 'Rollover' && $payment < $duration) {
                          echo '<span class="badge badge-success" title="Investment currently running">Investment Running</span>';
                        }
                        elseif ($status == 'Topup' && $payment < $duration) {
                          echo '<span class="badge badge-success" title="Investment currently running">Investment Running</span>';
                        }elseif ($status == 'Terminated' && $payment < $duration) {
                          echo '<span class="badge badge-danger" title="Investor has been paid his principal capital with minus 15%">Terminated with 15% Fine</span>';
                        }
                        elseif ($status == 'Terminated' || $status == 'Terminate') {
                          echo '<span class="badge badge-danger" title="Contract terminated and investor paid off principal capital">Investment Terminated</span>';
                        }elseif ($status == 'New Investment' && $payment == $duration) {
                          echo '<span class="badge badge-info" title="Investor has been paid off his/her ROI">Paid Off</span>';
                        }elseif ($status == 'Rollover' && $payment == $duration) {
                          echo '<span class="badge badge-info" title="Investor has been paid off his/her ROI">Paid Off</span>';
                        }elseif ($status == 'Topup' && $payment == $duration) {
                          echo '<span class="badge badge-info" title="Investor has been paid off his/her ROI">Paid Off</span>';
                        }

                        ?>
                      </td>
                      <td><a href="/dashboard/show/{{$investment->id}}" class="btn btn-success" title="View Client's Data"><i class="nav-icon fas fa-eye"></i></a></td>
                      @can('isAdmin')
                      <td><a href="/dashboard/{{$investment->id}}" class="btn btn-primary"  title="Update Client's Data"><i class="nav-icon fas fa-pen"></i></a></td>
                      @endcan  
                    </tr>
                  @empty
                      <p>No data available</p>
                  @endforelse
                    
                </tbody>
                <tfoot>
                    <tr style="font-size:15px;">
                        <th>ID Number</th>
                        <th>Investor's Name</th>
                        <th>Account Number</th>
                        <th>Invesment Duration</th>
                        <th>Payments Made</th>
                        <th>Due Date</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Process</th>
                        <th><i class="nav-icon fas fa-eye"></i></th>
                        @can('isAdmin')
                          <th><i class="nav-icon fas fa-pen"></i></th>
                        @endcan
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
        </div>

    </div>

   
@endsection