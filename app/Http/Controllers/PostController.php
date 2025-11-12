<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    // construct?

    public function index(Request $request)
    {

        $posts = Post::with('user')->orderBy('published_at', 'desc')->paginate(12);

        $itemListElements = $posts->getCollection()->map(function($post, $index) {
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
                    'name' => $post->user ? $post->user->name : 'Ismeretlen Szerző',
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                ],
            ];

            if ($publishedAt) {
                $element['datePublished'] = $publishedAt->toIso8601String();
            }
            if ($updatedAt) {
                $element['dateModified'] = $updatedAt->toIso8601String();
            }

            return $element;
        })->toArray();

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => $itemListElements,
        ];

        // Ajax kérés esetén csak a részleges HTML-t vagy JSON-t adunk vissza
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'posts' => view('blog.partials.post-list', compact('posts'))->render(),
                'next_page_url' => $posts->nextPageUrl(),
            ]);
        }

        return view('blog.index', compact('posts', 'jsonLd'));
    }

    function show($slug) {
        $post = Post::with('user')->where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }

}
