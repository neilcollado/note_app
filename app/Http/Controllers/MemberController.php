<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if (!$request->has('team_id')) 
            return redirect('/teams');
        
        // get team
        $team_id = $request->query('team_id');
        $team = Team::where('id', $team_id)->first();

        // select all members of this team
        $members = [];
        $team_members = Member::where('team_id', $team_id)->get();
        foreach($team_members as $m) {
            $user = User::find($m->user_id);
            $temp = new stdClass();
            $temp->member_id = $m->id;
            $temp->user_id = $user->id; 
            $temp->name = $user->name;
            $temp->email = $user->email;
            $temp->isOwner = $user->id == $team->owner_id ? 1 : 0;
            array_push($members, $temp);
        }
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->with('errors', $validator->errors()->all());

        $user = User::where('email', $request->email)->first();
        if ($user == NULL) 
            return redirect()->back()->with('errors', ['User not found.']);
        
        // check if user is already a member
        $member = Member::where('user_id', $user->id)->first();
        if ($member != NULL) 
            return redirect()->back()->with('errors', ['User is already a member of this team.']);

        Member::create([
            'team_id' => $request->query('team_id'),
            'user_id' => $user->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back();
    }
}
