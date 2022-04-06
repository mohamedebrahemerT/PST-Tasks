<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;


class projects extends Model
{
    protected $fillable = [
       'id' ,'Projectname_ar','Projectname_en','status_id','desc_ar','desc_en','start_date','registration_date','end_date',
       'delivery_date','notes','photo','priority','registration_date'
    ];
}
