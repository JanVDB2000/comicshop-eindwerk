<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;
    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'role_id',
        'is_active',
        'name',
        'email',
        'photo_id',
        'password'
    ];
    public $sortable=['name', 'email'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
       return $this->belongsToMany(Role::class, 'user_role');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
       // return $this->hasMany('App\Models\Post');
    }
    public function postcomments(){
        return $this->hasMany(Comment::class);
    }
    public function postcommentreplies(){
        return $this->hasMany(Reply::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function addresses(){
        return $this->belongsToMany(Address::class, 'user_address');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }



    public function isAdmin(){
        foreach($this->roles as $role){
            if($role->name == 'administrator' && $this->is_active == 1){
                return true;
            }
        }
    }


    public function mypdfid($id){
        foreach($this->orders as $order){
            if ($order->id == $id){
                return true;
            }

        }

    }
}
