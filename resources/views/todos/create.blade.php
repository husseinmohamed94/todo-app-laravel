@extends('layouts.app')

@section('title','create Todo')

@section('content')

        <div class="container">
            <div class="row justify-content-center mt-5">
                  <div class="col-md-6">
                        <div class="card">
                             <div class="card-header">
                                   <h1>create a new todo</h1> 
                             </div>
                                <div class="card-body">

                                @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                  

                                    <form action="/todo-app/server.php/create" method="POST">
                                    @csrf
                                    <div class="form-group">
                                    <input type="text"
                                    name="todotitle"
                                    placeholder ="Enter todo title"
                                    value="{{old('todotitle')}}"
                                    class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control"
                                            name="todoDescription"
                                            placeholder ="Enter todo Description"
                                           ></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                                <button 
                                                type="submit"
                                                class="btn btn-success "
                                                style="width : 40%" >
                                                create </button>
                                        </div>
                                </form>
                             </div>
                        </div>
                    </div>
             </div>
        </div>

@endsection
