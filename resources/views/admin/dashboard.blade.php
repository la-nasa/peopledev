@extends('admin.layout')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="admin-dashboard">
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['services'] }}</h3>
                    <p>Services</p>
                </div>
                <a href="{{ route('admin.services') }}" class="stat-link">Voir tous</a>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['projects'] }}</h3>
                    <p>Projets</p>
                </div>
                <a href="{{ route('admin.projects') }}" class="stat-link">Voir tous</a>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-blog"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['blog_posts'] }}</h3>
                    <p>Articles</p>
                </div>
                <a href="{{ route('admin.blog') }}" class="stat-link">Voir tous</a>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['unread_messages'] }}</h3>
                    <p>Messages non lus</p>
                </div>
                <a href="{{ route('admin.contact') }}" class="stat-link">Voir tous</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Activité récente</h3>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p>Nouveau projet ajouté</p>
                                <span class="activity-time">Il y a 2 minutes</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="activity-content">
                                <p>Service modifié</p>
                                <span class="activity-time">Il y a 15 minutes</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="activity-content">
                                <p>Nouveau témoignage reçu</p>
                                <span class="activity-time">Il y a 1 heure</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Actions rapides</h3>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <a href="{{ route('admin.services.create') }}" class="action-btn">
                            <i class="fas fa-plus"></i>
                            <span>Nouveau service</span>
                        </a>
                        <a href="{{ route('admin.projects.create') }}" class="action-btn">
                            <i class="fas fa-briefcase"></i>
                            <span>Nouveau projet</span>
                        </a>
                        <a href="{{ route('admin.blog.create') }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                            <span>Nouvel article</span>
                        </a>
                        <a href="{{ route('admin.contact') }}" class="action-btn">
                            <i class="fas fa-envelope"></i>
                            <span>Voir messages</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection