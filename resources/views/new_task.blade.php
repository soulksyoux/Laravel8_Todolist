@extends("layouts.main_layout")

@section('content-task')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Todo List</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <h4 class="text-center mt-4">Add new task</h4>
            <div class="offset-4 col-4">
                <form action="{{route('new_task_submit')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" class="form-control" name="task" id="task" aria-describedby="task" required>
                    </div>
                    <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

@endsection
