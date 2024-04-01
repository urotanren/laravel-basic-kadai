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
}
