<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['user_id'] = auth()->id();
        post::create($incomingFields);

        return redirect('/');
    }
}
