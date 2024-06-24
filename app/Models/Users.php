<?php

namespace App\Models; // Define the namespace for this model

use Illuminate\Database\Eloquent\Model; // Import the base Model class

class Users extends Model { // Define the Users class extending the base Model class
    protected $table = 'tblusers'; // Specify the database table name

    protected $fillable = [ // Define the attributes that are mass assignable
        'username', 'password', 'user_email'
    ];
    
    protected $primaryKey = 'user_id'; // Specify the primary key field
}
