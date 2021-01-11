<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStatic extends Model
{
    use HasFactory;

    public function home_teams() 
    {
        return $this->belongsTo('App\Models\HomeTeam', 'team_id');
    }
}
