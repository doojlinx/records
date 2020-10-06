<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function iplan()
    {
        $plans = \App\Iplan::orderBy('id', 'desc')->get();
        return view('admin.investmentplan', compact('plans'));
    }

    public function iduration()
    {
        $durations = \App\Iduration::orderBy('id', 'desc')->get();
        return view('admin.investmentduration', compact('durations'));
    }
    public function istatus()
    {
        $statuses = \App\Istatus::orderBy('id', 'desc')->get();
        return view('admin.investmentstatus', compact('statuses'));
    }
    public function ibranch()
    {
        $branches = \App\Branch::orderBy('id', 'desc')->get();
        return view('admin.branch', compact('branches'));
    }

    public function duration_store()
    {
        $data = request()->validate([
            'duration' => 'required',
            'num' => 'required',
        ]);
        \App\Iduration::create($data);

        return redirect()->back()->with('success', 'Data added succcessfully');
    }

    public function duration_destroy($id)
    {
        $duration = \App\Iduration::findOrFail($id);
        $duration->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function plan_store()
    {
        $data = request()->validate([
            'plan' => 'required',
        ]);
        \App\Iplan::create($data);

        return redirect()->back()->with('success', 'Data added succcessfully');
    }

    public function plan_destroy($id)
    {
        $plan = \App\Iplan::findOrFail($id);
        $plan->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function status_store()
    {
        $data = request()->validate([
            'status' => 'required',
        ]);
        \App\Istatus::create($data);

        return redirect()->back()->with('success', 'Data added succcessfully');
    }

    public function status_destroy($id)
    {
        $status = \App\Istatus::findOrFail($id);
        $status->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
    public function branch_store()
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        \App\Branch::create($data);

        return redirect()->back()->with('success', 'Data added succcessfully');
    }

    public function branch_destroy($id)
    {
        $duration = \App\Branch::findOrFail($id);
        $duration->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
