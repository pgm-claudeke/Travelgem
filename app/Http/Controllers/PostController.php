<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($id) {
        $post = Post::find($id);

        $postUser = User::where('id', $post->user_id)->first();

        $user = Auth::user();

        $saved = Save::where('user_id', $user->id)->where('post_id', $id)->first();

        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->get(['comments.*','users.username'])
        ;

        return view('post.detail', [ 
            'post_id' => $id,
            'post' => $post,
            'user' => $user,
            'postUser' => $postUser,
            'comments' => $comments,
            'saved' => $saved
        ]);
    }

    public function storeComment(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $postId = $request->input('post_id');

        $comment = new Comment();

        $comment->user_id = $userId;
        $comment->post_id = $request->input('post_id');
        $comment->comment = $request->input('comment');

        $comment->save();

        return redirect('/post/' . $postId);
    }

    public function savePost(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $postId = $request->input('post_id');

        $saved = new Save();

        $saved->user_id = $userId;
        $saved->post_id = $postId;

        $saved->save();

        return redirect('/post/' . $postId);
    }

    public function editPage($id) {
        $post = Post::find($id);

        $postUser = User::where('id', $post->user_id)->first();

        $user = Auth::user();

        $saves = Save::all();

        echo $post;
        echo $saves;

        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->get(['comments.*','users.username'])
        ;

        return view('post.edit', [ 
            'post_id' => $id,
            'post' => $post,
            'user' => $user,
            'postUser' => $postUser,
            'comments' => $comments
        ]);
    }

    public function editPost(Request $request) {
        $postId = $request->input('id');
        $post = Post::find($postId);

        $post->country = $request->input('country');
        $post->city = $request->input('city');
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->save();

        return redirect('/post/' . $postId);
    }

    public function deletePost($id){
        Post::find($id)->delete();
        echo ($id);

        return redirect('/home');
    }
} 