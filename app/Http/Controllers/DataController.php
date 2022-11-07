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
 
class DataController extends Controller
{
    public function index() {
        $user = Auth::user();
        $users = User::all()->sortBy('id');

        return view('admin.users', [
            'user' => $user,
            'users' => $users        
        ]);
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        Post::where('user_id', '=', $id)->delete('*');
        Comment::where('user_id', '=', $id)->delete('*');
        Save::where('user_id', '=', $id)->delete('*');

        return redirect('/admin');
    }

    public function posts() {
        $user = Auth::user();
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->get(['posts.*', 'users.username'])
        ->sortBy('id');

        return view('admin.posts', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function deletePost($id) {
        Post::find($id)->delete();
        Comment::where('post_id', '=', $id)->delete('*');
        Save::where('post_id', '=', $id)->delete('*');
        Tag::join('post_tag', 'tags.id', '=', 'post_tag.tag_id')->where('post_id', '=', $id)->delete('*');

        return redirect('/admin/posts');
    }

    public function tags() {
        $user = Auth::user();
        $tags = Tag::all()->sortBy('id');

        return view('admin.tags', [
            'user' => $user,
            'tags' => $tags
        ]);
    }

    public function postTag(Request $request, $id = null) {
        $tag = ($id) ? Tag::findOrFail($id) : new Tag();

        $tag->name = $request->input('name');
        $tag->save();

        return redirect('/admin/tags');
    }

    public function editTag(Request $request) {
        $tag = Tag::find($request->input('id'));
        $tag->name = $request->input('name');
        $tag->save();
        
        return redirect('/admin/tags');
    }

    public function deleteTag($id) {
        Tag::find($id)->delete();
        return redirect('/admin/tags');
    }
}