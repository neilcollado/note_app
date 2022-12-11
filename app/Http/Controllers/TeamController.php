<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = [];
        // get all the team this user is a member of.
        $result = Member::where('user_id', Auth::id())->get();
    
        foreach($result as $r) {
            $team = Team::find($r->team_id);
            array_push($teams, $team);
        }
        return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'team_name' => 'required',
        ]);

        if ($validator->fails())
            return redirect('teams/create')->with('errors', $validator->errors()->all());

        $team = Team::create([
            'owner_id' => Auth::id(),
            'team_name' => $request->team_name,
        ]);

        Member::create([
            'team_id' => $team->id,
            'user_id' => Auth::id(),
        ]);

        return redirect('teams/')->with('msg', 'Team Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $isOwner = $team->owner_id == Auth::id() ? 1 : 0;
        // get team members
        $members = [];
        $team_members = Member::where('team_id', $team->id)->get();
        foreach($team_members as $m) {
            $user = User::find($m->user_id);
            $temp = new stdClass();
            $temp->name = $user->name;
            array_push($members, $temp);
        }

        // get all boards
        return view('teams.show')->with(['team' => $team, 'isOwner' => $isOwner, 'members' => $members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->members()->delete();
        $team->delete();
        return redirect('/teams');
        // TODO -> Destroy all boards and task aswell
    }
}
