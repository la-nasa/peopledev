@extends('admin.layout')

@section('title', 'Créer une Statistique - Admin')
@section('page-title', 'Créer une Statistique')

@section('content')
<div class="admin-statistic-create">
    <div class="card">
        <div class="card-header">
            <h3>Nouvelle Statistique</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.statistics.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="value">Valeur *</label>
                    <input type="number" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
                    @error('value')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="icon">Icône FontAwesome</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon') }}" placeholder="fas fa-chart-bar">
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
                    <button type="submit" class="btn btn-primary">Créer la Statistique</button>
                    <a href="{{ route('admin.statistics') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection