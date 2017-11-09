<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ToDoController extends Controller
{
    /**
     * Gets all current to list records from database
     * returns as response
     */
    
    public function getAllToDoListObjects() {
        $toDoListObjects = DB::table('todo_list')->get();

        return view('todolist.index', ['todolist' => $toDoListObjects]);
    }
}