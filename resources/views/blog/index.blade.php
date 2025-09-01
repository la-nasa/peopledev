@extends('layouts.app')

@section('title', __('messages.Blog') . ' - People Dev')
@section('meta_title', __('messages.Blog') . ' - People Dev')
@section('meta_description', __('messages.Read our latest articles and news'))

@section('content')
<section class="blog-page">
    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">{{ __('messages.Blog') }}</h1>
            <p data-aos="fade-down" data-aos-delay="200">{{ __('messages.Read our latest articles and news') }}</p>
        </div>
    </div>

    <div class="blog-content">
        <div class="container">
            <div class="blog-grid">
                @foreach($posts as $post)
                <article class="blog-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($post->image)
                    <div class="blog-image">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" loading="lazy">
                    </div>
                    @endif
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date">
                                <i class="fas fa-calendar"></i>
                                {{ $post->publish_date->format('d M Y') }}
                            </span>
                            <span class="blog-author">
                                <i class="fas fa-user"></i>
                                {{ $post->author }}
                            </span>
                        </div>
                        <h2 class="blog-title">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="blog-excerpt">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-more">
                            {{ __('messages.Read more') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
            <div class="blog-pagination" data-aos="fade-up">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
