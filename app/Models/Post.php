<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass Assignment
    // Mapping field di database ke dalam model
    protected $fillable = ['title', 'description', 'image', 'user_id'];

    // protected $guarded = ['id'];
}
