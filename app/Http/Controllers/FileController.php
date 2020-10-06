<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $files = \App\File::orderBy('id', 'desc')->paginate('20');
        return view('admin.file', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'client_name' => 'required',
        ]);
        $file = new File();
        $imageName = time().'.'.$request->name->extension();
        $file->name = $request->name->move('images', $imageName);
        $file->client_name = $request->input('client_name');
        //$file->name = public_path('') .'/images/'.$imageName;
        $file->save();
        return redirect()->back()->with('image-success', 'Form uploaded successfully.')->with('name',$imageName);
    }
    public function destroy($id)
    {
        $duration = \App\File::findOrFail($id);
        $duration->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
