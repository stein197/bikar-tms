<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskListController extends Controller {
    
    public function __invoke(Request $request) {
        return view('page.task-list', [
            'tasks' => auth()->user()->tasks
        ]);
    }
}
