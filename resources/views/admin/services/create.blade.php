@extends('admin.layout')

@section('title', 'Créer un Service - Admin')
@section('page-title', 'Créer un Service')

@section('content')
<div class="admin-service-create">
    <div class="card">
        <div class="card-header">
            <h3>Nouveau Service</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST">
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
                    <label for="icon">Icône FontAwesome</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon') }}" placeholder="fas fa-cog">
                    @error('icon')
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
                    <button type="submit" class="btn btn-primary">Créer le Service</button>
                    <a href="{{ route('admin.services') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection