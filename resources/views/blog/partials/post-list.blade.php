@foreach ($posts as $post)
    <div class="blog col mx-auto" itemscope itemtype="https://schema.org/BlogPosting">
        @include('includes.blog-meta')
        <div class="card h-100 shadow-sm">
            @if($post->image_url)
                <img src="{{ asset($post->image_url) }}" alt="{{ $post->title }}" class="card-img-top" loading="lazy" itemprop="image">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title" itemprop="name">{{ $post->title }}</h5>
                <p class="card-text text-truncate" style="max-height: 6em;" itemprop="description">
                    {!! Str::limit(strip_tags($post->excerpt ?? $post->content), 150) !!}
                </p>
                <a href="{{ route('blog.show', $post->slug) }}" class="mt-auto btn btn-dark align-self-start" itemprop="url">{{__("read_more")}}</a>
            </div>
        </div>
    </div>
@endforeach