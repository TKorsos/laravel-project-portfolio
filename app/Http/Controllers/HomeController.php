<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    function index() {
        $posts = Post::with('user')->latest('published_at')->take(6)->get();

        $itemListElements = $posts->map(function($post, $index) {
            $publishedAt = $post->published_at ? Carbon::parse($post->published_at) : null;
            $updatedAt = $post->updated_at ? Carbon::parse($post->updated_at) : null;

            $element = [
                '@type' => 'BlogPosting',
                'position' => $index + 1,
                'url' => route('blog.show', $post->slug),
                'headline' => $post->title,
                'image' => asset($post->image_url),
                'author' => [
                    '@type' => 'Person',
                    'name' => $post->user ? $post->user->name : 'Szerző ismeretlen',
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                ],
            ];

            if ($publishedAt !== null) {
                $element['datePublished'] = $publishedAt->toIso8601String();
            }
            if ($updatedAt !== null) {
                $element['dateModified'] = $updatedAt->toIso8601String();
            }

            return $element;
        })->toArray();

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => $itemListElements,
        ];

        return view('index', compact('posts', 'jsonLd'));
    }

}
