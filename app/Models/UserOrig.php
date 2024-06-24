<?php

namespace App\Models; // Define the namespace for this model

use Illuminate\Auth\Authenticatable; // Import the Authenticatable trait
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract; // Import the Authorizable contract
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; // Import the Authenticatable contract
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Database\Eloquent\Model; // Import the base Model class
use Laravel\Lumen\Auth\Authorizable; // Import the Authorizable trait

class User extends Model implements AuthenticatableContract, AuthorizableContract // Define the User class extending Model and implementing the necessary contracts
{
    use Authenticatable, Authorizable, HasFactory; // Use the imported traits
    
    protected $fillable = [ // Define the fillable attributes
        'name', 'email',
    ];

    protected $hidden = [ // Define the hidden attributes
        'password',
    ];
}
