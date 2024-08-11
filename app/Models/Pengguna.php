<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    // Merupakan property yang di set apabila kita ingin menggunakan nama table diluar standar
    // laravel
    // protected $table = 'pengguna';

    // Mass Assignment
    // Mendaftarkan request yang hanya kita perlukan yang berasal dari dalam form
    // protected $guarded = [];

    protected $fillable = ['nama', 'email', 'alamat'];
}
