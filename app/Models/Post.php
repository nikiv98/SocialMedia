<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    # Added by Velichko: If you don't have timestamps(created_at, updated_at) you must disable them. But it's recommended to have them.
    public $timestamps = false;

    protected $table = 'posts';
}
