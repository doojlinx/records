@extends('admin.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Export Investor's Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Export</li>
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
            <h3 class="card-title">Investors Data</h3>
        </div>
        <div class="card-body">

            <table id="tblData" class="table example1 table-responsive-sm table-hover">
                <div class="center">
                    <button class="btn btn-success" onclick="exportTableToExcel('tblData', 'investors_data')">Export Table Data To Excel File</button>
                    <br> <br>
                </div>
                <p class="alert alert-info">To Sort with date please use this format <b>"yyyy-mm-dd".</b></p>
                <thead>
                    <tr style="font-size:15px;">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Branch</th>
                      <th>Officer</th>
                      <th>Full Name</th>
                      <th>Phone</th>
                      <th>Account Name</th>
                      <th>Account Number</th> 
                      <th>Bank</th>
                      <th>Investment</th>
                      <th>ROI</th>
                      <th>Times Paid</th>
                      <th>ROI Date</th> 
                      <th>Duration</th> 
                      <th>Date</th>
                      <th>Referee Name</th>
                      <th>Referee Account Details</th>
                      <th>Notes</th>          
                    </tr>
                </thead>
                <tbody>
                  @forelse ($investor_data as $investor)
                      <tr style="font-size:12px;">
                        <td>{{$investor->investor_number}}</td>
                        <td>{{$investor->status->status}}</td>
                        <td>{{$investor->branch->name}}</td>
                        <td>{{$investor->user->name}}</td>
                        <td>{{$investor->fname}} {{$investor->lname}}</td>
                        <td>{{$investor->phone}}</td>
                        <td>{{$investor->aname}}</td>
                        <td>{{$investor->baccount}}</td>
                        <td>{{$investor->bname}}</td>
                        <td>{{$investor->ainvested}}</td>
                        <td>{{$investor->roi}} </td>
                        <td>{{$investor->num_of_payment}}</td>
                        <td>{{$investor->pdate}}</td>
                        <td>{{$investor->duration->duration}}</td>
                        <td>{{Carbon\Carbon::parse($investor->updated_at)}}</td>
                        <td>{{$investor->referee}}</td>
                        <td>{{$investor->ref_account_name}} {{$investor->ref_account_num}} {{$investor->ref_account_bank}}</td>
                        <td>{!!$investor->note!!}</td>
                      </tr>
                
                 @empty
                 <p>No record</p>
                 @endforelse 

                    
                </tbody>
            </table>
        </div>
    </div>
        </div>

    </div>


<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>

   
@endsection