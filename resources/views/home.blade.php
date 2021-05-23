@extends("layouts.main_layout")

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Todo List</h3>
                <hr>
                <div class="my-2">
                    <a href="{{route("new_task")}}" class="btn btn-primary">Create task</a>
                </div>
                <hr>

                @if($tasks->count() > 0)
                    <table id="table-tasks" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Task</th>
                                <th class="text-center">Done</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->task}}</td>
                                <td class="text-center"><?= !empty($task->done) ? $task->done : "No"?></td>
                                <td>{{$task->created_at}}</td>
                                <td>
                                    <?php if(empty($task->done)): ?>
                                        <a class='btn btn-success btn-sm' href='{{route("done_task", ["id" => $task->id])}}'><i class='fas fa-check text-light'></i></a>
                                    <?php else: ?>
                                        <a class='btn btn-danger btn-sm' href='{{route("undone_task", ["id" => $task->id])}}'><i class='fas fa-times text-light'></i></a>
                                    <?php endif; ?>

                                    <a class="btn btn-primary btn-sm" href=""><i class='fas fa-edit text-light'></i></a>
                                    <a class="btn btn-primary btn-sm" href=""><i class='fas fa-trash text-light'></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                @else
                    <p>Sem tasks para mostrar...</p>
                @endif
            </div>
        </div>
    </div>

@endsection
