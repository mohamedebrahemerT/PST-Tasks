<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
     protected $fillable = [
       'id' ,'filenames', 'title',
'name','project_id','phase_id',
    ];
}