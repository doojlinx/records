<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Investment;
use App\Iplan;
use App\File;
use App\Duration;
use Carbon\Carbon;
use App\Notifications\Alert;

class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iplans = \App\Iplan::all();
        $branches = \App\Branch::all();
        $investments = \App\Investment::orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact('investments', 'iplans', 'branches'));
    }

    public function fshow($id)
    {
        $investor = \App\Investment::findOrFail($id);
        $statuses = \App\Istatus::all();
        return view('admin.financeshow', compact('investor', 'statuses'));
    }

    public function fstore(Investment $investor, Request $request, $id)
    {

        $investor = \App\Investment::findOrFail($id);
        $investor->istatus_id = $request->input('istatus_id');
        $investor->num_of_payment = $request->input('num_of_payment');
        $investor->bname = $request->input('bname');
        $investor->baccount = $request->input('baccount');
        $investor->aname = $request->input('aname');

        $investor->update();
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function create()
    {
        $files = \App\File::all();
        $plans = \App\Iplan::all();
        $durations = \App\Iduration::all();
        $statuses = \App\Istatus::all();
        $branches = \App\Branch::all();
        return view('admin.add', compact('plans', 'durations', 'statuses', 'files', 'branches'));
    }

    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
          //  'investor_number' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'bname' => 'required',
            'email' => 'required|email',
            'baccount' => 'required',
            'aname' => 'required',
            'phone' => 'required',
            'iplan_id' => 'required',
            'iduration_id' => 'required',
            'percentage' => 'required',
            'ainvested' => 'required',
            'roi' => 'required',
            'pdate' => 'required',
            'adate' => 'required',
            'file_id' => 'required',
            'istatus_id' => 'required',
            'branch_id' => 'required',
        ]);

        //account manager relationship
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //save new record
        $investment = new Investment();
        //$investment->investor_number = $request->input('investor_number');
        $investment->investor_number = uniqid('RMINL-');
        $investment->fname = $request->input('fname');
        $investment->lname = $request->input('lname');
        $investment->bname = $request->input('bname');
        $investment->email = $request->input('email');
        $investment->baccount = $request->input('baccount');
        $investment->aname = $request->input('aname');
        $investment->phone = $request->input('phone');
        $investment->iplan_id = $request->input('iplan_id');
        $investment->branch_id = $request->input('branch_id');
        $investment->iduration_id = $request->input('iduration_id');
        $investment->percentage = $request->input('percentage');
        $investment->ainvested = $request->input('ainvested');
        $investment->roi = $request->input('roi');
        $investment->pdate = $request->input('pdate');
        $investment->adate = $request->input('adate');
        $investment->note = $request->input('note');
        $investment->referee = $request->input('referee');
        $investment->ref_account_num = $request->input('ref_account_num');
        $investment->ref_account_name = $request->input('ref_account_name');
        $investment->ref_account_bank = $request->input('ref_account_bank');
        $investment->num_of_payment = $request->input('num_of_payment');
        $investment->istatus_id = $request->input('istatus_id');
        $investment->file_id = $request->input('file_id');
        $investment->user_id = auth()->user()->id;

        $investment->save();
        auth()->user()->notify(new Alert($investment));
        //Notification::send(auth()->user(), new Investment($investment));
        return redirect()->back()->with('success', 'Data added successfully');
    }

    public function show($id)
    {
        $investor = \App\Investment::findOrFail($id);
        return view('admin.ishow', compact('investor'));
    }

    public function edit($id)
    {
        $durations = \App\Iduration::all();
        $statuses = \App\Istatus::all();
        $investor = \App\Investment::findOrFail($id);

        //check for correct user to permit editting
        if(auth()->user()->id !== $investor->user_id)
        {
            return redirect('/dashboard')->with('error', 'Unauthorised page, you can only edit your investment');
        }
        return view('admin.edit', compact('investor', 'durations', 'statuses'));
    }

    public function update($id)
    {
        $d = request()->validate([
            'bname' => 'required',
            'baccount' => 'required',
            'aname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'iduration_id' => 'required',
            'ainvested' => 'required',
            'roi' => 'required',
            'pdate' => 'required',
            'istatus_id' => 'required',
            'note' => 'required',
        ]);

        $investor = \App\Investment::findOrFail($id);
        $investor->update($d);
        return redirect('/dashboard')->with('success', 'Data updated successfully');
    }
}
