@extends('admin.layout')

@section('title', 'Créer un Article - Admin')
@section('page-title', 'Créer un Article')

@section('content')
<div class="admin-blog-create">
    <div class="card">
        <div class="card-header">
            <h3>Nouvel Article</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="slug">Slug (URL)</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" placeholder="Laissez vide pour générer automatiquement">
                    @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="excerpt">Extrait *</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" rows="3" required>{{ old('excerpt') }}</textarea>
                    <small>Court résumé qui sera affiché dans les listes d'articles</small>
                    @error('excerpt')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="content">Contenu *</label>
                    <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="author">Auteur *</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="publish_date">Date de publication *</label>
                    <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ old('publish_date', now()->format('Y-m-d')) }}" required>
                    @error('publish_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="is_published">Statut</label>
                    <select name="is_published" id="is_published" class="form-control">
                        <option value="1" {{ old('is_published', 1) ? 'selected' : '' }}>Publié</option>
                        <option value="0" {{ !old('is_published', 1) ? 'selected' : '' }}>Brouillon</option>
                    </select>
                    @error('is_published')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Créer l'Article</button>
                    <a href="{{ route('admin.blog') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Génération automatique du slug
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slugInput = document.getElementById('slug');
    
    if (!slugInput.value) {
        slugInput.value = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/-+/g, '-'); // Replace multiple - with single -
    }
});
</script>
@endsection