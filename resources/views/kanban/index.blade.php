@extends('kanban.layout')

<style>
    .container{
        margin-top: 50px;
        display: flex;
        text-align: center;
        flex-direction: column;
        flex-wrap: wrap;
        font-family: 'Ubuntu', sans-serif;
    }
    .container>h1{
        border-bottom: 1px solid lightgray;
        margin-bottom: 30px;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
    }
    .wrapper{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .card-header{
        margin-bottom: 10px;
        font-size: 1.25rem;
        font-weight: bold;
        width: 256px;
    }
    .btn-sm, .btn-group-sm > .btn{
        font-family: 'Ubuntu', sans-serif;
        font-weight: 600;
        font-size: .75rem !important;
        line-height: 1 !important;
    }
    a, a:hover, a:focus, a:active{
        text-decoration: none;
        color: inherit;
    }
    .resultContainer .viewThisResult{
        display: none;
    }
    .resultContainer:hover .viewThisResult{
        display: inline;
    }
    .card-text{
        text-align: left;
        font-weight: 600;
    }
    .wipBtn{
        color:black;
        background-color: #e9c4c4;
        font-weight: 600!important;
        border: 1px solid #c5c5c5!important;
    }
    .wipBtn:hover{
        color:black;
        background-color: #e79393;
    }
    .testBtn{
        color:black;
        background-color: #f7f2cd;
        font-weight: 600!important;
        border: 1px solid #c5c5c5!important;
    }
    .testBtn:hover{
        color:black;
        background-color: #ece774;
    }
    .doneBtn{
        color:black;
        background-color: #cdfbd0;
        font-weight: 600!important;
        border: 1px solid #c5c5c5!important;
    }
    .doneBtn:hover{
        color:black;
        background-color: #73d778;
    }
    .backlogBtn{
        color:black;
        background-color: #f5f5f5;
        font-weight: 600!important;
        border: 1px solid #c5c5c5!important;
    }
    .backlogBtn:hover{
        color:black;
        background-color: #bbbbbb;
    }
    .DeletegBtn{
        color:black;
        background-color: #e86c68;
        font-weight: 600!important;
        border: 1px solid #c5c5c5!important;
    }
    .DeletegBtn:hover{
        color:black;
        background-color: #da4e4a;
    }
    .addInputGrp{
        display: flex!important;
        width:256px!important;
    }
    .alert{
        height: 56px;
    }
</style>

@section('content')

    <div class="container">

        <h1>Mit Kanban Board</h1>
        <br>

        <div class="alert">
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3 addInputGrp" style="margin-bottom: 20px;">
                <input type="text" name="text" class="form-control" style="margin-right: 5px;" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="New task..">
                <button type="submit" class="btn backlogBtn">Add</button>
            </div>
        </form>

        <div class="wrapper">
            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5;">Backlog</div>
                <div class="card-body">

                    @foreach($backlogTasks as $backlogTask)
                        <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                            <div class="card-body resultContainer" style="padding: 5px; background-color: #f5f5f5;">
                                <p class="card-text">{{ $backlogTask->text }}</p>
                                <div style="height: 25px!important;">
                                    <div class="viewThisResult">
                                        <form action="{{ route('tasks.destroy',$backlogTask->id) }}" method="POST">

                                            <a href="{{ route('moveToInProgress',$backlogTask->id) }}" class="btn wipBtn btn-sm">W</a>
                                            <a href="{{ route('moveToTesting',$backlogTask->id) }}" class="btn testBtn btn-sm">T</a>
                                            <a href="{{ route('moveToDone',$backlogTask->id) }}" class="btn doneBtn btn-sm">D</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn DeletegBtn btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #e9c4c4;">WIP</div>
                <div class="card-body">

                    @foreach($inProgressTasks as $inProgressTask)
                        <div class="card" style="width: 16rem; border:1px solid #e1afaf;;">
                            <div class="card-body resultContainer" style="padding: 5px; background-color: #e9c4c4;">
                                <p class="card-text">{{ $inProgressTask->text }}</p>
                                <div style="height: 25px!important;">
                                    <div class="viewThisResult">
                                        <form action="{{ route('tasks.destroy',$inProgressTask->id) }}" method="POST">

                                            <a href="{{ route('moveToBacklog',$inProgressTask->id) }}" class="btn backlogBtn btn-sm">B</a>
                                            <a href="{{ route('moveToTesting',$inProgressTask->id) }}" class="btn testBtn btn-sm">T</a>
                                            <a href="{{ route('moveToDone',$inProgressTask->id) }}" class="btn doneBtn btn-sm">D</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn DeletegBtn btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #f7f2cd;">Testing</div>
                <div class="card-body">

                    @foreach($testingTasks as $testingTask)
                        <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                            <div class="card-body resultContainer" style="padding: 5px; background-color: #f7f2cd;">
                                <p class="card-text">{{ $testingTask->text }}</p>
                                <div style="height: 25px!important;">
                                    <div class="viewThisResult">
                                        <form action="{{ route('tasks.destroy',$testingTask->id) }}" method="POST">

                                            <a href="{{ route('moveToBacklog',$testingTask->id) }}" class="btn backlogBtn btn-sm">B</a>
                                            <a href="{{ route('moveToInProgress',$testingTask->id) }}" class="btn wipBtn btn-sm">W</a>
                                            <a href="{{ route('moveToDone',$testingTask->id) }}" class="btn doneBtn btn-sm">D</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn DeletegBtn btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #cdfbd0;">Done</div>
                <div class="card-body">

                    @foreach($doneTasks as $doneTask)
                        <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                            <div class="card-body resultContainer" style="padding: 5px; background-color: #cdfbd0;">
                                <p class="card-text">{{ $doneTask->text }}</p>
                                <div style="height: 25px!important;">
                                    <div class="viewThisResult">
                                        <form action="{{ route('tasks.destroy',$doneTask->id) }}" method="POST">

                                            <a href="{{ route('moveToBacklog',$doneTask->id) }}" class="btn backlogBtn btn-sm">B</a>
                                            <a href="{{ route('moveToInProgress',$doneTask->id) }}" class="btn wipBtn btn-sm">W</a>
                                            <a href="{{ route('moveToTesting',$doneTask->id) }}" class="btn testBtn btn-sm">T</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn DeletegBtn btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
