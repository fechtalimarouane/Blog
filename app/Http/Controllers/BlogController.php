<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    public function index(){
        return view('pages.Home');
    }

    public function blog(){
        $posts = Post::all();

        return view('pages.Blog' , compact('posts') );
    }
    
    public function blogCreate(){
        return view('pages.blogCreiation');
    }

    public function blogStore(Request $request){
        $posts = $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);

        $posts['user_id']=auth()->user()->id;

        Post::create($posts);

        return redirect('/blog');
    }
   

    public function blogedit($id){

        $post=Post::find($id);

        return view('pages.Editblog' ,compact('post'));
    }
    public function blogupdat(Request $request , $id){
        $post=Post::find($id);
        $poste=$request->all();
        $post->fill($poste);
        $post->update();
        return redirect('/blog/myposts');
    }
    public function blogshowe($id){
        $post=Post::find($id);
        return view('pages.ShowProfile' , compact('post'));
    }
    public function destroy($id){

        $post=Post::find($id);

        $post->delete();

        return redirect('/blog/myposts');
    }
      





    public function login(){
        return view('pages.Login');
    }

    public function userlogin(Request $request){
      
        $info= $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($info)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'login' => 'Your email or password is incorrect !',
        ])->onlyInput('email');
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

        return redirect('/login');
    }

    public function logout(){
        Session::flush();

        Auth::logout();
    
        return redirect('/login');
    }
    function userblogs() {
        $posts = Post::where('user_id' , auth()->id())->get();
        
        return view('pages.Posts' , compact('posts'));
    }


}
