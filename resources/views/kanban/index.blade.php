@extends('kanban.layout')

<style>
    /*.wrapper{*/
    /*    display: flex;*/
    /*    flex-direction: row;*/
    /*    flex-wrap: nowrap;*/
    /*    justify-content: space-around;*/
    /*}*/
    /*.column {*/
    /*    width: 300px;*/
    /*    border: 1px solid gray;*/
    /*    height: 700px;*/
    /*    margin: 10px;*/
    /*    !*padding-top: 25px;*!*/
    /*    display: flex;*/
    /*    flex-direction: column;*/
    /*    flex-wrap: nowrap;*/
    /*    align-items: center;*/
    /*}*/
    /*.task{*/
    /*    background: yellow;*/
    /*    width: 90%;*/
    /*    height: 140px;*/
    /*    padding: 10px;*/
    /*    margin: 5px;*/
    /*    border: 1px solid gray;*/
    /*}*/
    /*.columnTitle{*/
    /*    padding-bottom: 3px;*/
    /*    border-bottom: 1px solid gray;*/
    /*}*/
    /*.titleBox{*/
    /*    background: #bfbfbf;*/
    /*    width: 100%;*/
    /*    padding-top: 10px;*/
    /*    display: flex;*/
    /*    align-items: center;*/
    /*    justify-content: center;*/
    /*    align-content: center;*/
    /*    flex-direction: column;*/
    /*    flex-wrap: wrap;*/
    /*}*/

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
        /*font-family: 'Ubuntu', sans-serif;*/
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
    .card-title{
        font-size: 1.25rem;
        font-weight: bold;
    }
    .card-text{
        text-align: left;
        font-weight: 600;
        /*font-family: 'Ubuntu', sans-serif;*/
        /*text-align: justify;*/
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
    .addInputGrp{
        display: flex!important;
        width:256px!important;
    }
</style>

@section('content')

    <div class="container">

        <h1>Mit Kanban Board</h1>

        @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="input-group mb-3 addInputGrp" style="margin-bottom: 20px;">
            <input type="text" class="form-control" style="margin-right: 5px;" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>

        <div class="wrapper">
            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5;">Backlog</div>
                <div class="card-body">

                    <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                        <div class="card-body resultContainer" style="padding: 5px; background-color: #f5f5f5;">
                            <h5 class="card-title">Test task 1</h5>
                            <p class="card-text">Dette er test task 1, Dette er test task 1, Dette er test task 1</p>
                            <div style="height: 25px!important;">
                                <div class="viewThisResult">
                                    <a href="#" class="btn wipBtn btn-sm">W</a>
                                    <a href="#" class="btn testBtn btn-sm">T</a>
                                    <a href="#" class="btn doneBtn btn-sm">D</a>
                                    <a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                        <div class="card-body resultContainer" style="padding: 5px; background-color: #f5f5f5;">
                            <h5 class="card-title">Test task 1</h5>
                            <p class="card-text">Deadlights jack lad schooner scallywag dance the hempen jig carouser broadside</p>
                            <div style="height: 25px!important;">
                                <div class="viewThisResult">
                                    <a href="#" class="btn wipBtn btn-sm">W</a>
                                    <a href="#" class="btn testBtn btn-sm">T</a>
                                    <a href="#" class="btn doneBtn btn-sm">D</a>
                                    <a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #e9c4c4;">WIP</div>
                <div class="card-body">

                    <div class="card" style="width: 16rem; border:1px solid #e1afaf;;">
                        <div class="card-body resultContainer" style="padding: 5px; background-color: #e9c4c4;">
                            <h5 class="card-title">Test task 1</h5>
                            <p class="card-text">Dette er test task 1, Dette er test task 1, Dette er test task 1</p>
                            <div style="height: 25px!important;">
                                <div class="viewThisResult">
                                    <a href="#" class="btn backlogBtn btn-sm">B</a>
                                    <a href="#" class="btn testBtn btn-sm">T</a>
                                    <a href="#" class="btn doneBtn btn-sm">D</a>
                                    <a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #f7f2cd;">Testing</div>
                <div class="card-body">

                    <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                        <div class="card-body resultContainer" style="padding: 5px; background-color: #f7f2cd;">
                            <h5 class="card-title">Test task 1</h5>
                            <p class="card-text">Dette er test task 1, Dette er test task 1, Dette er test task 1</p>
                            <div style="height: 25px!important;">
                                <div class="viewThisResult">
                                    <a href="#" class="btn backlogBtn btn-sm">B</a>
                                    <a href="#" class="btn wipBtn btn-sm">W</a>
                                    <a href="#" class="btn doneBtn btn-sm">D</a>
                                    <a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card" style="max-width: 16rem; border:none;">
                <div class="card-header bg-transparent" style="border:1px solid #c5c5c5; background-color: #cdfbd0;">Done</div>
                <div class="card-body">

                    <div class="card" style="width: 16rem; border:1px solid #c5c5c5;">
                        <div class="card-body resultContainer" style="padding: 5px; background-color: #cdfbd0;">
                            <h5 class="card-title">Test task 1</h5>
                            <p class="card-text">Dette er test task 1, Dette er test task 1, Dette er test task 1</p>
                            <div style="height: 25px!important;">
                                <div class="viewThisResult">
                                    <a href="#" class="btn backlogBtn btn-sm">B</a>
                                    <a href="#" class="btn wipBtn btn-sm">W</a>
                                    <a href="#" class="btn testBtn btn-sm">T</a>
                                    <a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

{{--        <div id="backlogColumn" class="column">--}}
{{--            <div class="titleBox">--}}
{{--                <h4 class="columnTitle">backlogColumn</h4>--}}
{{--            </div>--}}
{{--            @foreach($backlogTasks as $backlogTask)--}}
{{--                <div class="task">--}}
{{--                    <b>{{ $backlogTask->title }}</b>--}}
{{--                    <p>{{ $backlogTask->description }}</p>--}}
{{--                    <hr>--}}
{{--                    <form action="{{ route('tasks.destroy',$backlogTask->id) }}" method="POST">--}}

{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToInProgress',$backlogTask->id) }}">I</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToTesting',$backlogTask->id) }}">T</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToDone',$backlogTask->id) }}">D</a>--}}

{{--                        @csrf--}}
{{--                        @method('DELETE')--}}

{{--                        <button type="submit">Slet</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div id="inProgressColumn" class="column">--}}
{{--            <h4 class="columnTitle">inProgressColumn</h4>--}}
{{--            @foreach($inProgressTasks as $inProgressTask)--}}
{{--                <div class="task">--}}
{{--                    <b>{{ $inProgressTask->title }}</b>--}}
{{--                    <p>{{ $inProgressTask->description }}</p>--}}
{{--                    <hr>--}}
{{--                    <form action="{{ route('tasks.destroy',$inProgressTask->id) }}" method="POST">--}}

{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToBacklog',$inProgressTask->id) }}">B</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToTesting',$inProgressTask->id) }}">T</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToDone',$inProgressTask->id) }}">D</a>--}}

{{--                        @csrf--}}
{{--                        @method('DELETE')--}}

{{--                        <button type="submit">Slet</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div id="testingColumn" class="column">--}}
{{--            <h4 class="columnTitle">testingColumn</h4>--}}
{{--            @foreach($testingTasks as $testingTask)--}}
{{--                <div class="task">--}}
{{--                    <b>{{ $testingTask->title }}</b>--}}
{{--                    <p>{{ $testingTask->description }}</p>--}}
{{--                    <hr>--}}
{{--                    <form action="{{ route('tasks.destroy',$testingTask->id) }}" method="POST">--}}

{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToBacklog',$testingTask->id) }}">B</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToInProgress',$testingTask->id) }}">I</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToDone',$testingTask->id) }}">D</a>--}}

{{--                        @csrf--}}
{{--                        @method('DELETE')--}}

{{--                        <button type="submit">Slet</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div id="doneColumn" class="column">--}}
{{--            <h4 class="columnTitle">doneColumn</h4>--}}
{{--            @foreach($doneTasks as $doneTask)--}}
{{--                <div class="task">--}}
{{--                    <b>{{ $doneTask->title }}</b>--}}
{{--                    <p>{{ $doneTask->description }}</p>--}}
{{--                    <hr>--}}
{{--                    <form action="{{ route('tasks.destroy',$doneTask->id) }}" method="POST">--}}

{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToBacklog',$doneTask->id) }}">B</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToInProgress',$doneTask->id) }}">I</a>--}}
{{--                        <a class="btn btn-info btn-sm" href="{{ route('moveToTesting',$doneTask->id) }}">T</a>--}}

{{--                        @csrf--}}
{{--                        @method('DELETE')--}}

{{--                        <button type="submit">Slet</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
