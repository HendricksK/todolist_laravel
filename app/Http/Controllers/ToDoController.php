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

        return ['todolist' => $toDoListObjects];
    }

    public function getAllToDoListObjectsForUser($id) {
        $toDoListUser = DB::table('todo_user')
            ->select('id','username')
            ->where('id', '=', $id)->get();

        $toDoListObjects = DB::table('todo_list')->where('user_id', '=', $id)->get();

        return view('todolist.index', ['username' => $toDoListUser, 'todolist' => $toDoListObjects]);
    }

    public function getAllToDoListObjectsForUserXHR($id) {
        $toDoListObjects = DB::table('todo_list')->where('user_id', '=', $id)->get();

        return ['todolist' => $toDoListObjects];
    }
}