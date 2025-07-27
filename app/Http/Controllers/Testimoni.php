<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testimoni extends Controller
{
    //
    public function index()
    {
        $topTestimonials = [
            [
                'name' => 'Jack',
                'handle' => '@jack',
                'message' => "I've never seen anything like this before. It's amazing. I love it.",
                'avatar_bg' => 'bg-gradient-to-r from-green-400 to-blue-500'
            ],
            [
                'name' => 'Jill',
                'handle' => '@jill',
                'message' => "I don't know what to say. I'm speechless. This is amazing.",
                'avatar_bg' => 'bg-gradient-to-r from-purple-500 to-pink-500'
            ],
            [
                'name' => 'John',
                'handle' => '@john',
                'message' => "I'm at a loss for words. This is amazing. I love it.",
                'avatar_bg' => 'bg-gradient-to-r from-yellow-400 to-green-500'
            ]
        ];

        $bottomTestimonials = [
            [
                'name' => 'Jenny',
                'handle' => '@jenny',
                'message' => "I'm at a loss for words. This is amazing. I love it.",
                'avatar_bg' => 'bg-gradient-to-r from-orange-400 to-red-500'
            ],
            [
                'name' => 'James',
                'handle' => '@james',
                'message' => "I'm at a loss for words. This is amazing. I love it.",
                'avatar_bg' => 'bg-gradient-to-r from-blue-500 to-green-500'
            ]
        ];

        return view('home', compact('topTestimonials', 'bottomTestimonials'));
    }
}
