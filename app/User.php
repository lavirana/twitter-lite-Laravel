<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Tweet;
class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getAvatarAttribute($value)
{
    return asset('storage/'.$value);
    }
    
/*      public function getAvatarAttribute()
{
    return "https://i.pravatar.cc/40?u=".$this->email;
    }*/
    
    public function timeline(){
       // return Tweet::where('user_id',$this->id)->latest()->get();
        $friends = $this->follows()->pluck('id');
     //   $ids->push($this->id);
        return Tweet::whereIn('user_id',$friends)
            ->orWhere('user_id',$this->id)
            ->withLikes()
            ->latest()->get();
    }
    
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function path($append = ''){
        $path = route('profile',$this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
    
    public function   getRouteKeyName(){
        return 'name';
    }
}
