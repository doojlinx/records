<form action="/create" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                You are required to have uploaded client's form before this process
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Client Investment Form</label>
                <select name="file_id" id="" class="form-control">
                    <option value="">Select client's form</option>
                    @foreach ($files as $file)
                <option value="{{$file->id}}" style="text-transform: uppercase;">{{$file->client_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="">Office Branch</label>
            <select name="branch_id" id="" class="form-control">
                <option value="">Select Office Branch</option>
                @foreach ($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
                    
                @endforeach
            </select>

        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="fname" value="{{old('fname')}}">
                @error('fname')
                   <span> {{$message}} <span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{old('lname')}}">
            @error('lname')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
         <div class="form-group">
            <label for="">Bank Name</label>
         <input type="text" class="form-control" name="bname" value="{{old('bname')}}">
         @error('bname')
         <span>{{$message}}</span>
         @enderror
         </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Bank Account</label>
            <input type="text" class="form-control" name="baccount" value="{{old('baccount')}}">
            @error('baccount')
                <span>{{$message}}</span>
            @enderror
         </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="">Account Name</label>
              <input type="text" class="form-control" name="aname" value="{{old('aname')}}">
              @error('aname')
                  <span>{{$message}}</span>
              @enderror
           </div>
          </div>
        <div class="col-sm-6">
         <div class="form-group">
            <label for="">Phone Number</label>
         <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
         @error('phone')
             <span>{{$message}}</span>
         @enderror
         </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{old('email')}}">
          @error('email')
              <span>{{$message}}</span>
          @enderror
         </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Investment Plan</label>
                <select name="iplan_id" id="" class="form-control">
                    <option value="">Select an investment plan</option>
                    @foreach ($plans as $plan)
                <option value="{{$plan->id}}">{{$plan->plan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Investment Duration</label>
                <select name="iduration_id" id="" class="form-control">
                    <option value="">Select an investment duration</option>
                    @foreach ($durations as $duration)
                <option value="{{$duration->id}}">{{$duration->duration}}</option>
                        
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Percentage Returns(5% - 10%)</label>
            <input type="text" class="form-control" name="percentage" value="{{old('percentage')}}">
            @error('percentage')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for=""> Amount Invested (₦)</label>
            <input type="text" class="form-control" name="ainvested" value="{{old('ainvested')}}">
            @error('ainvested')
            <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Return On Investment (₦)</label>
            <input type="text" class="form-control" name="roi" value="{{old('roi')}}">
            @error('roi')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Activation Date</label>
                <input type="date" name="adate" class="form-control">
                @error('adate')
                    <span>{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Payment Due Date</label>
                <input type="text" class="form-control" placeholder="every 1st - 30th of each month(maturity start month-maturity end month)" name="pdate">
                @error('pdate')
                    <span>{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Number of Payments Made(Number of times client has been paid)</label>
                <input type="number" class="form-control" name="num_of_payment" value="0">
                @error('num_of_payment')
                    <span>{{$message}}
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Client Status</label>
                <select name="istatus_id" id="" class="form-control">
                    <option value="">Select Client's Present Status</option>
                    @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{$status->status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-sm-12">
                <div id="accordianId" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="section2HeaderId">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                          Additional Note(This section is optional, only add if there is an additional note)
                        </a>
                            </h5>
                        </div>
                        <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Additional Note</label>
                                    <textarea name="note" class="textarea">No additional note!</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="accordianId" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="section1HeaderId">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                          Click to add referee(This section is optional, only add if client was referred)
                        </a>
                            </h5>
                        </div>
                        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Referee Name</label>
                                    <input type="text" class="form-control" name="referee">
                                </div>
                                <div class="form-group">
                                    <label for="">Account Name</label>
                                    <input type="text" class="form-control" name="ref_account_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" name="ref_account_num">
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Name</label>
                                    <input type="text" class="form-control" name="ref_account_bank">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>


    </div>
</form>