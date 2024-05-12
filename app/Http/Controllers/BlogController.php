<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    public function login(){
        return view('pages.Login');
    }

    public function create(){
        return view('pages.Insription');
    }
    public function store(Request $request){
        $user=$request->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email|unique:users',
            'password'=>'required|confirmed|min:3|max:16',
        ]);

        $user['password'] = Hash::make($user['password']);

        User::create($user);

        return redirect('/');
    }


    public function index(){
        return view('pages.Home');
    }

    public function blog(){
        $posts = Post::all();
        // $id = $posts->user_id;

        // $user = User::find($id);

        return view('pages.Blog' , compact('posts') );
    }
    public function blogStore(Request $request){
        $posts = $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);

        Post::create($posts);

        return redirect('/blog');
    }

    public function blogCreate(){
        return view('pages.blogCreiation');
    }


}
