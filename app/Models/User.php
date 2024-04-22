<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Models\Activity;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "users";

    protected $fillable = ['name', 'username', 'email', 'password', 'role', 'bio', 'imgUrl'];

    protected $dates = ['created_at', 'updated_at', 'email_verified_at'];

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

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isEmployee()
    {
        return $this->role === 'employee';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function billing()
    {
        return $this->hasMany(Billing::class);
    }
    public function card()
    {
        return $this->hasMany(Card::class);
    }

    public function notifs()
    {
        return Activity::where('causer_id', $this->id)
            ->where('log_name', 'notification')
            ->get();
    }

}
