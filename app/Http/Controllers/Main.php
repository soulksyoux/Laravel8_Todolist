<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function home()
    {
        //get available tasks
        $tasks = Task::orderBy('created_at', 'desc')->where("visible", 1)->get();

        return view("home", ["tasks" => $tasks]);
    }

    public function new_task()
    {
        return view("new_task", []);
    }

    public function new_task_submit(Request $request)
    {
        if(!$request->isMethod("post")) {
            return redirect("new_task");
        }

        if(empty($request->input('task'))) {
            return redirect("new_task");
        }

        $task = $request->input('task');

        $task_model = new Task();
        $task_model->task = $task;
        $task_model->save();

        return redirect()->route("home");
    }

    public function done_task($id) {
        $task = Task::find($id);
        //$task->done = now();
        $task->done = new \DateTime();
        $task->save();
        return redirect()->route("home");
    }

    public function undone_task($id) {
        $task = Task::find($id);
        $task->done = null;
        $task->save();
        return redirect()->route("home");
    }

    public function edit_task($id)
    {
        $task = Task::find($id);
        if($task->done != null) {
            return redirect()->route("home");
        }

        return view("edit_task", ['id' => $id, 'task' => $task->task]);
    }

    public function edit_task_submit(Request $request, $id)
    {
        //valida se o metodo é um post
        if(!$request->isMethod("post")) {
            return redirect()->route("home");
        }

        //valida se existe um campo de input do form chamado task
        if(!$request->input('task')) {
            return redirect()->route("home");
        }

        $task = Task::find($id);
        $task->task = $request->input('task');
        $task->updated_at = new \DateTime();
        $task->save();

        return redirect()->route("home");
    }

    public function delete_task($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route("home");
    }

    public function show_deleted_tasks()
    {
        //get invisible tasks
        $tasks = Task::orderBy('created_at', 'desc')->where("visible", 1)->onlyTrashed()->get();

        return view("home", ["tasks" => $tasks]);
    }

    public function undelete_task($id)
    {
        $task = Task::withTrashed()->find($id);
        $task->restore();

        return redirect()->route("home");
    }
}
