@extends('layouts.app')

@section('title', __('messages.Unsubscribe Successful') . ' - People Dev')

@section('content')
<section class="unsubscribe-page">
    <div class="container">
        <div class="unsubscribe-content">
            <div class="unsubscribe-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <h1>{{ __('messages.Unsubscribe Successful') }}</h1>
            <p>{{ __('messages.You have been successfully unsubscribed from our newsletter.') }}</p>
            <p>{{ __('messages.We are sorry to see you go.') }}</p>
            <a href="{{ route('home') }}" class="btn btn-primary">
                {{ __('messages.Return to Homepage') }}
            </a>
        </div>
    </div>
</section>

<style>
.unsubscribe-page {
    padding: 100px 0;
    text-align: center;
}

.unsubscribe-content {
    max-width: 500px;
    margin: 0 auto;
}

.unsubscribe-icon {
    font-size: 4rem;
    color: var(--accent-orange);
    margin-bottom: 30px;
}

.unsubscribe-content h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: var(--primary-blue);
}

.unsubscribe-content p {
    font-size: 1.1rem;
    margin-bottom: 15px;
    color: #666;
}
</style>
@endsection
