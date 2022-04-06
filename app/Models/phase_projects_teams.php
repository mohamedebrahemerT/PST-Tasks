<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phase_projects_teams extends Model
{
     protected $fillable = [
       'id' ,'project_id','phases_id','developers_id'
    ];
}