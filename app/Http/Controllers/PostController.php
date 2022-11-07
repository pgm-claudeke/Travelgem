<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Save;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post($id) {
        //current Uuser
        $user = Auth::user();

        $post = Post::find($id);

        $tags = Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
        ->where('post_tag.post_id', $id)
        ->get('tags.*')
        ;

        $postUser = User::where('id', $post->user_id)->first();

        $saved = Save::where('user_id', $user->id)->where('post_id', $id)->first();

        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->get(['comments.*','users.username', 'users.user_img'])
        ;

        return view('post.detail', [ 
            'user' => $user,
            'post_id' => $id,
            'post' => $post,
            'postUser' => $postUser,
            'comments' => $comments,
            'saved' => $saved,
            'tags' => $tags
        ]); 
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

    public function unsavePost($id) {
        $user = Auth::user();

        Save::where('user_id', '=', $user->id)->where('post_id', '=', $id)->delete();

        return redirect('/post/' . $id);
    }

    public function postComment(Request $request){
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

    public function editPostPage($id) {
        $post = Post::find($id);

        $postUser = User::where('id', $post->user_id)->first();

        $user = Auth::user();

        $saves = Save::all();

        $tags = Tag::all();

        $currentTags = Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
        ->where('post_tag.post_id', $id)
        ->get('tags.id')
        ;

        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('post_id', $id)
            ->get(['comments.*','users.username', 'users.user_img'])
        ;

        return view('post.edit', [ 
            'post_id' => $id,
            'post' => $post,
            'user' => $user,
            'postUser' => $postUser,
            'comments' => $comments,
            'tags' => $tags,
            'currentTags' => $currentTags
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
        $post->tags()->sync($request->input('tags'));

        return redirect('/post/' . $postId);
    }

    public function deletePost($id){
        Post::find($id)->delete();
        Comment::where('post_id', '=', $id)->delete('*');
        Save::where('post_id', '=', $id)->delete('*');
        Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')->where('post_id', '=', $id)->delete('*');

        return redirect('/home');
    }
} 