<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass Assignment
    // Intinya itu adalah digunakan untuk menangkap request dari form
    // Dan request yang hanya diizinkan oleh si form
    // Mapping field di database ke dalam model
    protected $fillable = ['title', 'description', 'image', 'user_id'];

    // protected $guarded = ['id'];

    // Fungsi untuk memanggil gambar
    public function getImage()
    {
        return asset($this->image);
    }

    // 1 Table Post memilik banyak Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
