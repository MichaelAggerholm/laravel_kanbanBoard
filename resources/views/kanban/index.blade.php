@extends('kanban.layout')

<style>
    .wrapper{
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-around;
    }
    .column {
        width: 300px;
        border: 1px solid gray;
        height: 700px;
        margin: 10px;
        padding-top: 25px;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        align-items: center;
    }
    .task{
        background: yellow;
        width: 90%;
        height: 140px;
        padding: 10px;
        margin: 5px;
        border: 1px solid gray;
    }
    .columnTitle{
        padding-bottom: 3px;
        border-bottom: 1px solid gray;
    }
</style>

@section('content')
    @if ($message = Session::get('success'))
        <br>
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="wrapper">
        <div id="backlogColumn" class="column">
            <h4 class="columnTitle">backlogColumn</h4>
@foreach($backlogTasks as $backlogTask)
    <div class="task">
        <b>{{ $backlogTask->title }}</b>
        <p>{{ $backlogTask->description }}</p>
        <hr>
        <form action="{{ route('tasks.destroy',$backlogTask->id) }}" method="POST">

            <a class="btn btn-info btn-sm" href="{{ route('moveToInProgress',$backlogTask->id) }}">I</a>

            @csrf
            @method('DELETE')

            <button type="submit">Slet</button>
        </form>
    </div>
@endforeach
        </div>
        <div id="inProgressColumn" class="column">
            <h4 class="columnTitle">inProgressColumn</h4>
            @foreach($inProgressTasks as $inProgressTask)
                <div class="task">
                    <b>{{ $inProgressTask->title }}</b>
                    <p>{{ $inProgressTask->description }}</p>
                    <hr>
                    <a href="#">B</a>
                    <a href="#">I</a>
                    <a href="#">T</a>
                    <a href="#">D</a>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            @endforeach
        </div>

        <div id="testingColumn" class="column">
            <h4 class="columnTitle">testingColumn</h4>
            @foreach($testingTasks as $testingTask)
                <div class="task">
                    <b>{{ $testingTask->title }}</b>
                    <p>{{ $testingTask->description }}</p>
                    <hr>
                    <a href="#">B</a>
                    <a href="#">I</a>
                    <a href="#">T</a>
                    <a href="#">D</a>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            @endforeach
        </div>

        <div id="doneColumn" class="column">
            <h4 class="columnTitle">doneColumn</h4>
            @foreach($doneTasks as $doneTask)
                <div class="task">
                    <b>{{ $doneTask->title }}</b>
                    <p>{{ $doneTask->description }}</p>
                    <hr>
                    <a href="#">B</a>
                    <a href="#">I</a>
                    <a href="#">T</a>
                    <a href="#">D</a>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
