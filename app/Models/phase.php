<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phase extends Model
{
     protected $fillable = [
       'id' ,'title_ar','title_en','desc_ar','desc_en','notes','photo','start_date','end_date','delivery_date','status_id','Number_of_hours','important'
    ];
}
