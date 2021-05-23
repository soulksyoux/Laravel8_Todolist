<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
}
