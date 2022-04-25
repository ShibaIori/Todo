<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $items = Task::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request){
        $this->validate($request, Task::$rules);
        $form = $request->all();
        Task::create($form);
        return redirect('/');
    }
    public function update(Request $request){
        $this->validate($request, Task::$rules);
        $form = $request->all();
        unset($form['_token']);
        Task::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request){
        Task::find($request->id)->delete();
        return redirect('/');
    }
}
