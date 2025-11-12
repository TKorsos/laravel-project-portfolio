<meta itemprop="mainEntityOfPage" content="{{ route('blog.show', $post->slug) }}"/>
<meta itemprop="headline" content="{{ $post->title }}"/>
<meta itemprop="datePublished" content="{{ $post->published_at ? Carbon\Carbon::parse($post->published_at)->toIso8601String() : 'Dátum nem elérhető' }}"/>
<meta itemprop="dateModified" content="{{ $post->updated_at ? Carbon\Carbon::parse($post->updated_at)->toIso8601String() : 'Nem frissítették' }}"/>
<meta itemprop="author" content="{{ $post->user ? $post->user->name : 'Ismeretlen Szerző' }}"/>
<meta itemprop="publisher" content="{{ config('app.name') }}"/>