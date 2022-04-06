<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phases_Request_extra_hours extends Model
{
   protected $fillable = [
       'id' ,'phase_id', 'The_number_of_hours',
'Reason_for_the_delay' 
    ];




}
