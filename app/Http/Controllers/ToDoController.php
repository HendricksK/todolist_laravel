<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    /**
     * [getAllToDoListObjectsForUser description]
     * @param  [type] $id [id of user]
     * @return [type]     [returns view with data as array]
     */
    public function getAllToDoListObjectsForUser($id) {
        try {

            $toDoListUser = DB::table('todo_user')
                ->select('id','username')
                ->where('id', '=', $id)
                ->orderBy('id','desc')
                ->get();

            $toDoListObjects = DB::table('todo_list')
                ->where('user_id', '=', $id)->get();

            
        } catch (Exception $e) {
            return $e;
        }

        return view('todolist.index', ['username' => $toDoListUser, 'todolist' => $toDoListObjects, 'user_id' => Auth::user()->id]);
    }

    /**
     * [getAllToDoListObjectsForUserXHR description]
     * @param  [type] $id [user id]
     * @return [type]     [returns all data for user, XHR specific function]
     */
    public function getAllToDoListObjectsForUserXHR($id) {
        $toDoListObjects = DB::table('todo_list')
            ->where('user_id', '=', $id)->get();

        return $toDoListObjects;
    }

    /**
     * [setToDoObjectStatus sets the status of to do item]
     * @param [type] $id     [the id of the item that needs updating]
     * @param [type] $option [the value of the status, either 1 or 0]
     */
    public function setToDoObjectStatusXHR($id, $status) {
        try {
            DB::table('todo_list')
            ->where('id', $id)
            ->update(['complete' => $status]);  
        } catch (Exception $e) {
            return json_encode($e);
        }

        return 'true';
    }

    /**
     * [createNewToDoObjectXHR inserts new todo item into
     * the database]
     * @param  [type] $data [entire dataset from form]
     * @return [type]       [returns string to let us know
     *                      whether its worked or not]
     */
    public function createNewToDoObjectXHR($id, $title, $description) {
        try {
            $id = DB::table('todo_list')
            ->insertGetID([
                'user_id' => $id,
                'title' => $title,
                'description' => $description,
                'modified_date' => date("Y-m-d H:i:s")
            ]);

            return json_encode($id);

        } catch (Exception $e) {
            return json_encode($e);
        }
    }

    /**
     * [markAllToDoAsComplete marks all the todo items
     * as complete for specified user]
     * @param  [type] $id [user id]
     * @return [type]     [returns json string]
     */
    public function markAllToDoAsCompleteXHR($id) {
        try {
            DB::table('todo_list')
            ->where('user_id', $id)
            ->update(['complete' => '1']);  
        } catch (Exception $e) {
            return json_encode($e);
        }

        return 'true';
    }
}