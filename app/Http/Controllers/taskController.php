<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task ;
use App\Models\User ;
use App\Models\Item ;
use Auth;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $tasks = Task::where('userId',$id)->orderBy('priority','asc')->get();
        return view('home',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = ['ongoing','completed','missing'];
        $priority = ['low','normal','medium','high'];

        return view("task.create")
        ->with('status', $status)
        ->with('priority', $priority);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required|in:ongoing,completed,missing',
            'priority' => 'required|in:low,normal,medium,high',
            'due_date' => 'required','date',
        ]);

        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()],422);

        $task = Task::create([
            'name' => $request->name,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'priority' => $request->priority,
            'userId' => Auth::id(),
        ]);

        if ($request->items) {
            foreach($request->items as $item){
                if (empty($item)) continue;
                Item::create([
                    'title' => $item,
                    'task_id' => $task->id
                ]);
            }
        }
        
        return response()->json([
            'success' => true,
            'message'=>__('Task successfully added'),
            'url' => route('task.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $user = User::findOrFail($task->userId);
        return view('task.view')->with('task', $task)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'priority' => 'required|numeric'
        ]);

        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()],422);

        $task = Task::findOrFail($id);
        $task->update($request->all());
        $task->items()->delete();

        if ($request->items) {
            foreach($request->items as $item){
                if (empty($item)) continue;
                Item::create([
                    'title'  => $item,
                    'task_id'   => $task->id
                ]);
            }
                
        }

        return response()->json([
            'success' => true,
            'message'=>__('Task successfully updated'),
            'url' => route('task.index')
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->items()->delete();
        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully',
            
        ]);
    }


    public function bulkDestroy(Request $request)
    {
        Item::whereIn('task_id',$request->ids)->delete();
        Task::whereIn('id',$request->ids)->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }

    public function bulkEdit(Request $request)
    {
       $tasks = Task::find($request->ids);
       return view('task.edit-bulk',compact('tasks'));
    }

    public function bulkUpdate(Request $request)
    {
        foreach ($request->status as $task_id => $value) {
            Task::where('id',$task_id)->update(['status' => $value]);
        }
        foreach ($request->priority as $task_id => $value) {
            Task::where('id',$task_id)->update(['priority' => $value]);
        }
        return response()->json([
            'message' => 'Task updated successfully',
            'url'    => route('task.index')
        ]);
    }

}
