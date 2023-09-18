<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    //

    public function create(Request $request){
        $data = new TasksModel;
        $data->task = $request->task;
        $data->status = 0; //default value
        $data->user_id = Auth::user()->id; //the current user
        $data->insert_at = Carbon::now(); //database formate
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; //unique filename
            $file->storeAs('image', $filename, 'public');
            $data->image = $filename;
        }

        if($data->save()){
            return redirect()->route('home')->with([]);
        }

    }

    public function edit ($noor)
    {
        $data=TasksModel::find($noor);
      return view('admin.edit',['data'=>$data]);
    }
    public function update (Request $request) {
        $data = TasksModel::find($request->queen_rodaina);
        $data->task = $request->task;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; //unique filename
            $file->storeAs('image', $filename, 'public');
            $data->image = $filename;
        }
        if($data->save()) {
            return redirect()->route('home')->with([]);
        }


    }
    public function delete ($noor) {
        $data = TasksModel::find($noor);

        if($data->delete()) {
            return redirect()->route('home')->with([]);
        }
    }
}
