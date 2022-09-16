<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $comments = Comment::with('users')->get();
        // dd($comments);
        return view('home', get_defined_vars());
    }

    public function uploadData(Request $request)
    {
        $json = File::get($request->file);
        $data = json_decode($json);
        foreach ($data->comments as $item) {
            User::updateOrCreate(
                [
                    'id'         => $item->user->id,
                ],
                [
                    'username'   => $item->user->username,
                ]
            );
            Comment::updateOrCreate(
                [
                    'id'         => $item->id,
                ],
                [
                    'body'         => $item->body,
                    'postId'         => $item->postId,
                    'user_id'          => $item->user->id,
                ]
            );
        }
        return redirect()->back()->with('message', 'File uploaded successfully!');
    }
}