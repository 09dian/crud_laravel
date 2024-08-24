<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view('data.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'ttl' => 'required|date',
            'alamat' => 'required|max:255',
        ]);

        Post::create($validate);

        return redirect()->route('posts.index')->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'ttl' => 'required|date',
            'alamat' => 'required|max:255',
        ]);

        $post->update($validate);

        return redirect()->route('posts.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Data berhasil dihapus!');
    }
}
