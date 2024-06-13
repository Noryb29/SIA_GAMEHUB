<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    protected $table = 'tblusers';

    protected $fillable = [
        'username', 'password', 'user_email'
    ];

    #public $timestamps = false;
    protected $primaryKey = 'user_id';
}