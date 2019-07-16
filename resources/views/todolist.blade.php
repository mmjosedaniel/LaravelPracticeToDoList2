@extends('layouts.base')

@section('content')

    <br>

    <section>
        <h1 class="text-center">Your To Do List</h1>
    </section>

    <br>
    
    <section>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        <form action="/" method="POST">
        @csrf
            <div class="form-group">
                <label for="task">New Task:</label>
                <input type="text" class="form-control" name="task" placeholder="Here you can write yor task">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>
    </section>
    
    <br>
    
    <section>
        <table class="table">
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task }}</td>
                    <form action="/{{ $task->id }}/delete" method="POST">
                    @csrf
                    @method('delete')
                        <td>
                            <button type="submit" class="btn btn-danger">Delente</button>
                        </td>
                    </form>
                    <form action="/{{ $task->id }}/edit" method="GET">
                        <td>
                            <button type="submit" class="btn btn-primary">edit</button>
                        </td>
                    </form>
                </tr>

                
            @endforeach
        </table>
    </section>




@endsection