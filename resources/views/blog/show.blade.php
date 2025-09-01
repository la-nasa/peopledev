@extends('layouts.app')

@section('title', $post->title . ' - People Dev')
@section('meta_title', $post->title . ' - People Dev')
@section('meta_description', $post->excerpt)

@section('content')
<section class="blog-detail">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ $post->title }}</h1>
            <div class="blog-meta-header" data-aos="fade-down" data-aos-delay="200">
                <span class="blog-date">
                    <i class="fas fa-calendar"></i>
                    {{ $post->publish_date->format('d M Y') }}
                </span>
                <span class="blog-author">
                    <i class="fas fa-user"></i>
                    {{ $post->author }}
                </span>
                <span class="blog-reading-time">
                    <i class="fas fa-clock"></i>
                    {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read
                </span>
            </div>
        </div>
    </div>

    <div class="blog-content-detail">
        <div class="container">
            @if($post->image)
            <div class="blog-featured-image" data-aos="fade-up">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" loading="lazy">
            </div>
            @endif

            <article class="blog-article" data-aos="fade-up" data-aos-delay="200">
                <div class="article-content">
                    {!! $post->content !!}
                </div>
            </article>

            <div class="blog-share" data-aos="fade-up">
                <h3>{{ __('messages.Share this article') }}</h3>
                <div class="share-buttons">
                    <a href="#" class="share-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="share-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="share-btn linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="share-btn whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="related-posts">
        <div class="container">
            <h2 data-aos="fade-up">{{ __('messages.Related articles') }}</h2>
            <div class="related-grid">
                @foreach($recentPosts as $recentPost)
                <article class="related-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($recentPost->image)
                    <div class="related-image">
                        <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" loading="lazy">
                    </div>
                    @endif
                    <div class="related-content">
                        <h3 class="related-title">
                            <a href="{{ route('blog.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                        </h3>
                        <p class="related-excerpt">{{ Str::limit($recentPost->excerpt, 100) }}</p>
                        <a href="{{ route('blog.show', $recentPost->slug) }}" class="related-read-more">
                            {{ __('messages.Read more') }}
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
