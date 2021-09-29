<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable =['title', 'information', 'first_name', 'last_name','user_id'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}


