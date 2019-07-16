@extends('layouts.base')

@section('content')

    <br>

    <section>
        <h1 class="text-center">Edit Task {{ $task->id }}</h1>
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
        <form action="/{{ $task->id }}" method="POST">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="task">Edit Task:</label>
                <input type="text" class="form-control" name="task" placeholder="Here you can edit yor task">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Edit Task</button>
            </div>
        </form>
    </section>
    
    <br>
    





@endsection