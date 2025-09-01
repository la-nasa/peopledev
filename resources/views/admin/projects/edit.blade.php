@extends('admin.layout')

@section('title', 'Modifier le Projet - Admin')
@section('page-title', 'Modifier le Projet')

@section('content')
<div class="admin-project-edit">
    <div class="card">
        <div class="card-header">
            <h3>Modifier le Projet</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    @if($project->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" width="100" style="border-radius: 5px;">
                    </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="category">Catégorie *</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="Développement Web" {{ old('category', $project->category) == 'Développement Web' ? 'selected' : '' }}>Développement Web</option>
                        <option value="Application Mobile" {{ old('category', $project->category) == 'Application Mobile' ? 'selected' : '' }}>Application Mobile</option>
                        <option value="Design UI/UX" {{ old('category', $project->category) == 'Design UI/UX' ? 'selected' : '' }}>Design UI/UX</option>
                        <option value="E-commerce" {{ old('category', $project->category) == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                        <option value="Marketing Digital" {{ old('category', $project->category) == 'Marketing Digital' ? 'selected' : '' }}>Marketing Digital</option>
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="client">Client</label>
                    <input type="text" name="client" id="client" class="form-control" value="{{ old('client', $project->client) }}">
                    @error('client')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="project_date">Date du projet *</label>
                    <input type="date" name="project_date" id="project_date" class="form-control" value="{{ old('project_date', $project->project_date->format('Y-m-d')) }}" required>
                    @error('project_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="project_url">URL du projet</label>
                    <input type="url" name="project_url" id="project_url" class="form-control" value="{{ old('project_url', $project->project_url) }}" placeholder="https://example.com">
                    @error('project_url')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $project->order) }}">
                            @error('order')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Statut</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $project->is_active) ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !old('is_active', $project->is_active) ? 'selected' : '' }}>Inactif</option>
                            </select>
                            @error('is_active')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('admin.projects') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection