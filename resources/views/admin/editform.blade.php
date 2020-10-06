<form action="/dashboard/edit/upload/{{$investor->id}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Investors' ID</label>
                <input type="text" class="form-control" value="{{$investor->investor_number}}" disabled>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="fname" value="{{$investor->fname}}" disabled>
                @error('fname')
                   <span> {{$message}} <span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{$investor->lname}}" disabled>
            @error('lname')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
         <div class="form-group">
            <label for="">Bank Name</label>
         <input type="text" class="form-control" name="bname" value="{{$investor->bname}}">
         @error('bname')
         <span>{{$message}}</span>
         @enderror
         </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Bank Account</label>
            <input type="text" class="form-control" name="baccount" value="{{$investor->baccount}}">
            @error('baccount')
                <span>{{$message}}</span>
            @enderror
         </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="">Account Name</label>
              <input type="text" class="form-control" name="aname" value="{{$investor->aname}}">
              @error('aname')
                  <span>{{$message}}</span>
              @enderror
           </div>
          </div>
        <div class="col-sm-6">
         <div class="form-group">
            <label for="">Phone Number</label>
         <input type="text" class="form-control" name="phone" value="{{$investor->phone}}">
         @error('phone')
             <span>{{$message}}</span>
         @enderror
         </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{$investor->email}}">
          @error('email')
              <span>{{$message}}</span>
          @enderror
         </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Investment Plan</label>
                <select name="iplan_id" id="" class="form-control" disabled>
                    <option value="{{$investor->plan->id}}">{{$investor->plan->plan}}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Investment Duration</label>
                <select name="iduration_id" id="" class="form-control">
                    <option value="{{$investor->duration->id}}">{{$investor->duration->duration}}</option>
                    @foreach ($durations as $duration)
                        <option value="{{$duration->id}}">{{$duration->duration}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Percentage Returns(5% - 10%)</label>
            <input type="text" class="form-control" name="percentage" value="{{$investor->percentage}}" disabled>
            @error('percentage')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for=""> Amount Invested (₦)</label>
            <input type="text" class="form-control" name="ainvested" value="{{$investor->ainvested}}">
            @error('ainvested')
            <span>{{$message}}</span>
            @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Return On Investment (₦)</label>
            <input type="text" class="form-control" name="roi" value="{{$investor->roi}}">
            @error('roi')
                <span>{{$message}}</span>
            @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Activation Date</label>
                <input type="date" name="adate" class="form-control" value="{{$investor->adate}}" disabled>
                @error('adate')
                    <span>{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Payment Due Date</label>
                <input type="text" class="form-control" placeholder="every 1st - 30th of each month" name="pdate" value="{{$investor->pdate}}">
                @error('pdate')
                    <span>{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Number of Payments Made(Number of times client has been paid)</label>
                <input type="number" class="form-control" name="num_of_payment" value="{{$investor->num_of_payment}}" disabled>
                @error('num_of_payment')
                    <span>{{$message}}
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Client Status</label>
                <select name="istatus_id" id="" class="form-control">
                    <option value="{{$investor->status->id}}">{{$investor->status->status}}</option>
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
                      Additional Note
                    </a>
                        </h5>
                    </div>
                    <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Additional Note</label>
                                <textarea name="note" class="textarea">{{$investor->note}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" placeholder="Update">
        </div>


    </div>
</form>