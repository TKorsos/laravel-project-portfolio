<meta itemprop="mainEntityOfPage" content="{{ route('blog.show', $post->slug) }}"/>
<meta itemprop="headline" content="{{ $post->title }}"/>
<meta itemprop="datePublished" content="{{ $post->published_at ? Carbon\Carbon::parse($post->published_at)->toIso8601String() : __("date_unavailable") }}"/>
<meta itemprop="dateModified" content="{{ $post->updated_at ? Carbon\Carbon::parse($post->updated_at)->toIso8601String() : __("not_updated") }}"/>
<meta itemprop="author" content="{{ $post->user ? $post->user->name : __("unknown_author") }}"/>
<meta itemprop="publisher" content="{{ config('app.name') }}"/>