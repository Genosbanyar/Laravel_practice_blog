<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Mail\StoreMail;
use App\Events\PostCreatedEvent;
use App\Mail\PostCreated;
use App\Notifications\PostCreatedNotification;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::find(1);
        // $user->notify(new PostCreatedNotification());
        $posts = Post::orderBy('id','desc')->where('user_id',Auth::id())->get();
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        PostCreatedEvent::dispatch($post);
        return redirect('posts')->with('status', config('aprogrammer.message.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view', $post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('view', $post);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect('posts')->with('status',config('aprogrammer.message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts')->with('status',config('aprogrammer.message.delete'));
    }
}
