<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //trait
class todosController extends Controller
{
    public function index(){

        $todos=Todo::all();

     return view('todos.index',['todos'=>$todos]);
       //    return view('todos')->with('todos',$todos);
    //     return view('todos',compact('todos'));
    }

    public function show(Todo $todo){
       // $todo = Todo::find($todo);
        return view('todos.show')->with('todo',$todo);

    }

    public function create(){
        return view('todos.create');
    }
    public function store(Request $request){
      // return $request-> all(); 
     // return $request->input('todoDescription'); 
    // return $request->todoDescription;
    /*$request->validate([
            'todotitle'         => 'required | min:6',
            'todoDescription'   => 'required'
    ]);*/
        $this->validate($request,[
            'todotitle'         => 'required | min:6',
            'todoDescription'   => 'required'
        ]);

    $todo = new Todo();
    $todo->title        = $request->todotitle;
    $todo->decription   = $request->input('todoDescription');
   // $todo->completed  = false;
    $todo->save();
    $request->session()->flash('success','Todo created successfully');
    return redirect('/todos');
       
    }

    public function edit(Todo $todo){
       
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, Todo $todo){


        $this->validate($request,[
            'todotitle'         => 'required | min:6',
            'todoDescription'   => 'required'
        ]);
     
        $todo->title = $request->get('todotitle');
        $todo->decription   = $request->get('todoDescription');

        $todo->save();
        $request->session()->flash('success','Todo update successfully');
        return redirect('/todos');
    }

    public function dstroy(Todo $todo){
       
        $todo->delete();
        session()->flash('success','Todo delete successfully');
        return redirect('/todos');
    }

    public function complete(Todo $todo ){
        $todo->completed = true;
        $todo->save();
        session()->flash('success','Todo completed successfully');
        return redirect('/todos');
    }

} 
