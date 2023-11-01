<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'comments';

    // Define the primary key if it's different from the default 'id'
    protected $primaryKey = 'id';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'feedbackid',
        'userid',
        'username',
        'comment',
        'created_at',
        'updated_at',
    ];

    // Define attributes that should be hidden when serialized
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define attribute casting
    protected $casts = [
        'created_at' => 'datetime', // Assuming a 'created_at' timestamp field
        'updated_at' => 'datetime', // Assuming an 'updated_at' timestamp field
        'category' => 'integer', // Assuming 'category' is an integer field
    ];

    // Add any additional model-specific logic or relationships here

    // Example of a one-to-many relationship with another model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
