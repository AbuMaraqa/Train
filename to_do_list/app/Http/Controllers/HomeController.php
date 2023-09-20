<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = TasksModel::get();
        // $data = TasksModel::select()->join('users','users.id','=','tasks.user_id')->get();
        foreach($data as $key){
            $key->user = User::where('id',$key->user_id)->first();
        }
        return view('home',['reem'=>$data]);
    }
}
