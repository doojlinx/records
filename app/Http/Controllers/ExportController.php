<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //get investors data for excel export
        $investor_data = \App\Investment::orderBy('id', 'desc')->get();
        return view('admin.export', compact('investor_data'));
    }
    
}
