<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function readerBorrows() {
        return $this->hasMany(Borrow::class, 'reader_id');
    }

    public function managedRequests() {
        return $this->hasMany(Borrow::class, 'request_managed_by');
    }

    public function managedReturns() {
        return $this->hasMany(Borrow::class, 'return_managed_by');
    }

}
