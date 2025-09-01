@extends('layouts.app')

@section('title', __('messages.Unsubscribe Error') . ' - People Dev')

@section('content')
<section class="unsubscribe-page">
    <div class="container">
        <div class="unsubscribe-content">
            <div class="unsubscribe-icon error">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h1>{{ __('messages.Unsubscribe Error') }}</h1>
            <p>{{ __('messages.We could not find your email in our newsletter list.') }}</p>
            <p>{{ __('messages.You may have already been unsubscribed or the email address was incorrect.') }}</p>
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
    margin-bottom: 30px;
}

.unsubscribe-icon.error {
    color: #dc3545;
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
