<?php

namespace App\Http\Controllers;

use App\Models\TeamTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->has('team_id')) 
            return redirect('/teams');
            
        return view('teamtasks.create');
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
            'task_name' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->with('errors', $validator->errors()->all());

        TeamTask::create([
            'team_id' => $request->query('team_id'),
            'name' => $request->task_name
        ]);

        return redirect()->back()->with('msg', 'Team Task Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamTask  $teamtask
     * @return \Illuminate\Http\Response
     */
    public function show(TeamTask  $teamtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamTask  $teamtask
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamTask $teamtask)
    {   
        $otherstatus = ['notstarted','inprogress','completed'];
        $otherstatus = array_filter($otherstatus, function($item) use($teamtask) {
            return $item != $teamtask->status;
        });
        return view('teamtasks.edit')->with(compact('teamtask', 'otherstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamTask  $teamtask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamTask $teamtask)
    {
        $validator = Validator::make($request->all(),[
            'status' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->with('errors', $validator->errors()->all());

        $teamtask->status = $request->status;
        $teamtask->save();
        return redirect('teams/'.$teamtask->team_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamTask  $teamtask
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamTask $teamtask)
    {
        $teamtask->delete();
        return redirect('teams/'.$teamtask->team_id);
    }
}
