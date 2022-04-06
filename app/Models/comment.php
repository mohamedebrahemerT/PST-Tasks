<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
     protected $fillable = [
       'id' ,'comment','project_id','phases_id','developers_id'
   ];
}