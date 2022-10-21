<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($id) {
        $post = Post::find($id);

        $postUser = User::where('id', $post->user_id)->first();

        $user = Auth::user();

        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->get(['comments.*','users.username'])
        ;

        return view('post.detail', [ 
            'post_id' => $id,
            'post' => $post,
            'user' => $user,
            'postUser' => $postUser,
            'comments' => $comments
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

} 