<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $fillable = [
        'name', 'email', 'password','gender','address','phonenumber','type','jobtitle_ar','jobtitle_en','photo','status'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getImageAttribute($img){
        if ($img)
            return asset('/uploads/users_images') . '/' . $img;
        else
            return "";
    }

 

    public function Parent(){
        return $this->hasOne('App\Models\User', 'id', 'parent_id');
    }

    

    public function Users()
    {
        return $this->hasMany('App\Models\User','parent_id', 'id');
    }
}
