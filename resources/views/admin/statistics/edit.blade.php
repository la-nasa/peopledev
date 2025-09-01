@extends('admin.layout')

@section('title', 'Modifier la Statistique - Admin')
@section('page-title', 'Modifier la Statistique')

@section('content')
<div class="admin-statistic-edit">
    <div class="card">
        <div class="card-header">
            <h3>Modifier la Statistique</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.statistics.update', $statistic->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Titre *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $statistic->title) }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="value">Valeur *</label>
                    <input type="number" name="value" id="value" class="form-control" value="{{ old('value', $statistic->value) }}" required>
                    @error('value')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="icon">Icône FontAwesome</label>
                    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $statistic->icon) }}" placeholder="fas fa-chart-bar">
                    @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $statistic->order) }}">
                            @error('order')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Statut</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $statistic->is_active) ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !old('is_active', $statistic->is_active) ? 'selected' : '' }}>Inactif</option>
                            </select>
                            @error('is_active')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('admin.statistics') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection