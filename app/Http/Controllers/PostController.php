<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // ORM dibawah mirip dengan query
        // Query nya : SELECT id, title, description, image, created_at, user_id
                    // FROM posts ORDER BY created_at desc;
        $posts = Post::select('id', 'title', 'description', 'image', 'created_at', 'user_id')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp,tiff,avif|max:4096'
        ]);

        // Menangkap request dari form
        $image = $request->file('image');

        // Melakukan pengecekkan
        // Ada atau gak file gambarnya
        if ($request->hasFile('image')) {
            // Valid atau gak file nya : true / false
            if ($image->isValid())
            {
                // Menentukan folder tujuan gambar yang akan di upload
                $destinationPath = public_path() . '/files/products/';
                // Merupakan penamaan gambar yang akan di simpan di database serta nama file di folder
                // 202407260910101-asdasdsadsadqwe2319239129412.png
                $imageFile = time() . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
                // Melakukan proses pemindahan gambar ke dalam folder tujuan
                $image->move($destinationPath, $imageFile);
                // Simpan path beserta nama file / gambarnya
                $imageName = '/files/products/'.$imageFile;
            }
        } else {
            // Jika gambar tidak di upload maka otomatis akan memasukkan gambar default
            $imageName = '/img/no-image.png';
        }

        // ORM = Object Relational Model
        // Query ORM dibawah mirip dengan query insert
        // INSERT INTO posts (title, description, image, user_id)
        // VALUES ()
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Post success create!');
    }
}
