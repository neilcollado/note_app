<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id','team_name'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function teamtasks()
    {
        return $this->hasMany(TeamTask::class);
    }
}
