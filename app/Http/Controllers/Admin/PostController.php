<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol=="Administrador") $posts = Post::latest('id')->paginate();
        else $posts = Post::where('user_id', Auth::id())->paginate(10);
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->orderBy('name','asc')->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $post_data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            // dd($image);
            $imageName = $image->getClientOriginalName();
            // dd($imageName);
            $post_data['image'] = $request->file('image')->storeAs('uploads/posts/images', $imageName, 'public');
        }

        $post = Post::create($post_data);
        
        return redirect()->route('posts.edit', $post)->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = DB::table('categories')->orderBy('name','asc')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post_data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            Storage::delete('public/'.$post->image);
            $post_data['image'] = $request->file('image')->storeAs('uploads/posts/images', $imageName, 'public');
        }

        $post->update($post_data);

        return redirect()->route('posts.edit', $post)->with('success', 'Post actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Storage::delete('public/'.$post->image)){
            $post->delete();
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente');
    }

    public function category(Category $category)
    {
        // Inicia - Menú de navegación
        $categories = Category::all();
        // Fin Menú de navegación

        $posts = Post::where('category_id', $category->id)
                        ->where('status', 'Yes')
                        ->latest('created_at')
                        ->paginate(5);

        return view('blog.post-category', compact('posts','category','categories'));

    }
}
