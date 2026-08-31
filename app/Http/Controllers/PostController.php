<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('tools.create', compact('categories'));
    }

    public function createPost(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',

            'category_id' => 'required|exists:categories,id',

            'condition' => 'required|string',
            'location' => 'required|string',

            'first_day_price' => 'nullable|numeric|min:0',
            'extra_day_price' => 'nullable|numeric|min:0',

            'available_from' => 'nullable|date',
            'available_untill' => 'nullable|date|after_or_equal:available_from',
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // dd($data);

        $images = $request->file('images');

        unset($data['images']);

        // Use validated data when creating the post
        $post = Post::create(array_merge($data, [
            'user_id' => Auth::id(),
        ]));

        // dd("done");

        foreach ($images as $index => $image) {

            $path = $image->store('posts', 'public');

            $post->images()->create([
                'path' => $path,
                'sort_order' => $index,
                'is_cover' => $index === 0,
            ]);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Post created successfully.');
    }
}
