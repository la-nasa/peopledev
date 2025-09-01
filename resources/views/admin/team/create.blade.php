@extends('admin.layout')

@section('title', 'Créer un Membre - Admin')
@section('page-title', 'Créer un Membre')

@section('content')
<div class="admin-team-create">
    <div class="card">
        <div class="card-header">
            <h3>Nouveau Membre</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nom *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="position">Poste *</label>
                    <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}" required>
                    @error('position')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="bio">Biographie</label>
                    <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
                    @error('bio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    @error('photo')
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
                    <button type="submit" class="btn btn-primary">Créer le Membre</button>
                    <a href="{{ route('admin.team') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection