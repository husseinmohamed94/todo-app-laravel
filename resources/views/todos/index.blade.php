@extends('layouts.app')
@section('title','All todos')

@section('content')
       <div class="container">
                    <div class="row pt-3 text-center justify-content-center">
                      <div class="card" style="width:50%">
                          <div class="card-header">
                          <h1>All Todos page</h1>
                          </div>
                              @if(session()->has('success'))

                                        <div class="alert alert-success">{{session()->get('success')}} </div>
                              @endif

                               <div class="card-body">
                                  <ul class="list-group">
                                        @forelse($todos as $todo)
                                        <li class="list-group-item text-muted">
                                                  {{ $todo->title }}
                                             <span class="float-right mr-2">
                                             <a href="/todo-app/server.php/todos/{{$todo->id}}/delete">del</a>
                                             </span>
                                            <span class="float-right mr-2">
                                             <a href="/todo-app/server.php/todos/{{$todo->id}}/edit">edit</a>
                                             </span>
                                                 <span class="float-right mr-2">
                                                 <a href="/todo-app/server.php/todos/{{$todo->id}}"><i class="fa fa-trash-alt"></i>eye</a>
                                             </span>
                                             @if(!$todo->completed) 
                                             <span class="float-right mr-2">
                                                 <a href="/todo-app/server.php/todos/{{$todo->id}}/complete"><i class="fa fa-trash-alt"></i>com</a>
                                             </span>
                                             @endif
                                        </li>
                                        @empty
                                         <p class="text-center">No todos</p>
                                        @endforelse
                         </ul>
                   </div>
              </div>
              
         </div>
      
       
    </div>
@endsection