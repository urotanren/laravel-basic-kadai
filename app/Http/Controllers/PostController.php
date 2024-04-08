<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\posts;

class PostController extends Controller
{
    public function index(){
        // return view('posts.index');
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $posts = posts::find($id);

        return view('posts.show',compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        // バリデーションを設定する
        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required|max:200'
        ]);

        $post = new Posts();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // リダイレクトさせる
        return redirect('/posts');

    }
}
