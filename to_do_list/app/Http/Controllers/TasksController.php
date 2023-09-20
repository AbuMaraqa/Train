<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    //

    public function create(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'task' => 'required|string|max:10', // Updated max length to 255
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Added image validation rules
        ], [
            'task.required' => 'حقل المهام مطلوب',
            'task.max' => 'يجب أن لا يزيد هذا الحقل عن 10 حرفًا',
            'image.image' => 'يجب أن يكون الملف ملف صورة',
            'image.required' => 'حقل الصورة مطلوب',
            'image.mimes' => 'يجب أن يكون الملف من الأنواع: jpeg, png, jpg',
            'image.max' => 'حجم الملف يجب أن لا يتجاوز 2 ميجابايت',
        ]);
        // Create a new TasksModel instance
        $data = new TasksModel;
        $data->task = $request->task;
        $data->status = 0; // Default value
        $data->user_id = Auth::user()->id; // Current user ID
        $data->insert_at = Carbon::now(); // Database format

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; // Unique filename
            $file->storeAs('image', $filename, 'public');
            $data->image = $filename;
        }

        // Save the data to the database
        if ($data->save()) {
            return redirect()->route('home')->with('success', 'Task created successfully');
        } else {
            return redirect()->route('home')->withInput()->with('error', 'Failed to create task');
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
            Storage::delete('public/image/'.$data->image);
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
            Storage::delete('public/image/'.$data->image);
            return redirect()->route('home')->with([]);
        }
    }

    public function updateStatus(Request $request){
        $data = TasksModel::where('id',$request->id)->first();
        if($request->status == '1'){
            $data->status = 1;
        }
        else{
            $data->status = 0;
        }
        if($data->save()){
            return response()->json([
                'data'=>$data,
                'success'=>'true'
            ]);

        }
    }
}
