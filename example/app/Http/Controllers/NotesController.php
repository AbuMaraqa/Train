<?php

namespace App\Http\Controllers;

use App\Models\NotesModel;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){
        $data = NotesModel::get();
        return view('index',['data'=>$data]);
    }

    public function add(){
        return view('add');
    }

    public function create(Request $request){
        $data = new NotesModel();
        $data->notes = $request->notes;
        if($data->save()){
            return redirect()->route('index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->route('index')->with(['fail'=> 'هناك خطا ما لم يتم اضافة البيانات بنجاح']);
        }
    }
}
