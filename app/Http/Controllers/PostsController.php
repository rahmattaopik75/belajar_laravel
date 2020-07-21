<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::all();
        return view('admin.posts.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $posts = Post::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        $posts->tags()->attach($request->tags);

        $gambar->move('public/uploads/posts/', $new_gambar);
        return redirect('/posts')->with('success', 'Data Postingan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $posts = Post::findorfail($post->id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $posts_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uploads/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul),
            ];
        }
        else{
            $posts_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
            ];
        }


        $posts->tags()->sync($request->tags);
        $posts->update($posts_data);

        return redirect('/posts')->with('success', 'Data Postingan berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/posts')->with('success', 'Data Postingan berhasil di dihapus (Silahkan cek di trash hapus)');
    }

    public function tampil_hapus()
    {   $posts = Post::onlyTrashed()->paginate(10);
        return view('admin.posts.hapus', compact('posts'));
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        return redirect()->back()->with('success', 'Data Postingan berhasil di direstore (Silahkan cek di List Post)');
    }

    public function forcedelete($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forcedelete();
        return redirect()->back()->with('success', 'Data Postingan berhasil di hapus secara permanen');
    }
}