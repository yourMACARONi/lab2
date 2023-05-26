<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    public $timestamps = false;

    protected $table = 'user';

    protected $fillable = [
        'username', 'password', 'gender'
    ];

    protected $hidden =[
        "password"
    ];
}