@extends('admin.layout')

@section('title', 'Créer un Projet - Admin')
@section('page-title', 'Créer un Projet')

@section('content')
<div class="admin-project-create">
    <div class="card">
        <div class="card-header">
            <h3>Nouveau Projet</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
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
                    <label for="category">Catégorie *</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="Développement Web" {{ old('category') == 'Développement Web' ? 'selected' : '' }}>Développement Web</option>
                        <option value="Application Mobile" {{ old('category') == 'Application Mobile' ? 'selected' : '' }}>Application Mobile</option>
                        <option value="Design UI/UX" {{ old('category') == 'Design UI/UX' ? 'selected' : '' }}>Design UI/UX</option>
                        <option value="E-commerce" {{ old('category') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                        <option value="Marketing Digital" {{ old('category') == 'Marketing Digital' ? 'selected' : '' }}>Marketing Digital</option>
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="client">Client</label>
                    <input type="text" name="client" id="client" class="form-control" value="{{ old('client') }}">
                    @error('client')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="project_date">Date du projet *</label>
                    <input type="date" name="project_date" id="project_date" class="form-control" value="{{ old('project_date') }}" required>
                    @error('project_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="project_url">URL du projet</label>
                    <input type="url" name="project_url" id="project_url" class="form-control" value="{{ old('project_url') }}" placeholder="https://example.com">
                    @error('project_url')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
                            @error('order')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Statut</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !old('is_active', 1) ? 'selected' : '' }}>Inactif</option>
                            </select>
                            @error('is_active')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Créer le Projet</button>
                    <a href="{{ route('admin.projects') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection